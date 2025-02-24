<?php

namespace App\Http\Controllers\Backend;

use App\Jobs\SendReservationCancelled;
use App\Jobs\SendReservationCompleted;
use App\Jobs\SendReservationConfirmed;
use App\Jobs\SendReservationReceived;
use App\Models\Companies;
use App\Models\Country;
use App\Models\Customers;
use App\Models\Drivers;
use App\Models\ReservationRequest;
use App\Models\ReservationRoute;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\RouteVehicle;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Barryvdh\DomPDF\Facade\Pdf;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list reservations', ['only' => ['list']]);
    }

    public function __invoke()
    {
        return redirect()->route('pending.reservations')->with(
            'warning',
            'You can not access to this area. (Action Prohibited)'
        );

    }

    public function create(Request $request)
    {
        $reservation = vehicle_reservation($request);
        if ($reservation){
            if(checkSettings('reservation_received_email')){
                $reservation = Reservations::with('customer', 'reservationRoute', 'reservationRoute.routeVehicle', 'reservationRoute.routeVehicle.routeDetails', 'reservationRoute.routeVehicle.vehicleDetails')->where('id', $reservation->id)->first();
                SendReservationReceived::dispatch($reservation);
            }
            return redirect()->route('reservations.pending')->with(
                'success',
                'New reservation has been recorded.'
            );
        }
        else {
            return redirect()->route('reservations.pending')->with(
                'warning',
                'Booking can not be reserved at this moment. (Data Error)'
            );
        }
    }

    public function pending()
    {
        $title = 'List Pending Reservations';
        $reservations_type = 'pending';
        $reservations = Reservations::with(['company', 'customer', 'customer.country', 'reservationRoute', 'reservationRoute.routeVehicle', 'reservationRoute.routeVehicle.routeDetails', 'reservationRoute.routeVehicle.vehicleDetails'])->where('is_reserved', 0)->where('is_cancelled', 0)->orderBy('created_at', 'desc')->paginate();

        $countries = Country::all();
        $drivers = Drivers::get();
        $routes = Routes::where('is_requested', 0)->get();
        $vehicles = Vehicle::get();
        $companies = Companies::get();

        return view('backend/reservations/list', compact('title', 'reservations', 'drivers', 'routes', 'vehicles', 'countries', 'reservations_type', 'companies'));
    }

    public function confirmed()
    {
        $title = 'List Confirmed Reservations';
        $reservations_type = 'confirmed';
        $reservations = Reservations::with(['customer', 'reservationRoute', 'reservationRoute.routeVehicle', 'reservationRoute.routeVehicle.routeDetails', 'reservationRoute.routeVehicle.vehicleDetails'])->where('is_reserved', 1)->where('is_completed', 0)->where('is_cancelled', 0)->orderBy('created_at', 'desc')->paginate();
        $countries = Country::all();
        $drivers = Drivers::get();
        $routes = Routes::where('is_requested', 0)->get();
        $vehicles = Vehicle::get();
        $companies = Companies::get();


        return view('backend/reservations/list', compact('title', 'reservations', 'drivers', 'routes', 'vehicles', 'countries', 'reservations_type', 'companies'));
    }

    public function completed()
    {
        $title = 'List Completed Reservations';
        $reservations_type = 'completed';
        $reservations = Reservations::with(['customer', 'reservationRoute', 'reservationRoute.routeVehicle', 'reservationRoute.routeVehicle.routeDetails', 'reservationRoute.routeVehicle.vehicleDetails'])->where('is_reserved', 1)->where('is_completed', 1)->where('is_cancelled', 0)->orderBy('created_at', 'desc')->paginate();
        $countries = Country::all();
        $drivers = Drivers::get();
        $routes = Routes::where('is_requested', 0)->get();
        $vehicles = Vehicle::get();
        $companies = Companies::get();


        return view('backend/reservations/list', compact('title', 'reservations', 'drivers', 'routes', 'vehicles', 'countries', 'reservations_type', 'companies'));

    }

    public function cancelled()
    {
        $title = 'List Cancelled Reservations';
        $reservations_type = 'cancelled';
        $reservations = Reservations::with(['customer', 'reservationRoute', 'reservationRoute.routeVehicle', 'reservationRoute.routeVehicle.routeDetails', 'reservationRoute.routeVehicle.vehicleDetails'])->where('is_cancelled', 1)->orderBy('created_at', 'desc')->paginate();
        $countries = Country::all();
        $drivers = Drivers::get();
        $routes = Routes::where('is_requested', 0)->get();
        $vehicles = Vehicle::get();
        $companies = Companies::get();


        return view('backend/reservations/list', compact('title', 'reservations', 'drivers', 'routes', 'vehicles', 'countries', 'reservations_type', 'companies'));

    }

    public function downloadInvoice($reservation)
    {
        $reservation = Reservations::with('company', 'reservationRoute', 'customer', 'customer.country', 'driver')->where('id', $reservation)->first();
        if ($reservation->is_reserved == 0 && $reservation->is_cancelled == 0) {
            $reservation_type = 'pending';
        }
        elseif ($reservation->is_reserved == 1 && $reservation->is_completed == 0){
            $reservation_type = 'confirmed';
        }
        elseif ($reservation->is_reserved == 1 && $reservation->is_completed == 1){
            $reservation_type = 'completed';
        }
        elseif ($reservation->is_cancelled == 1){
            $reservation_type = 'cancelled';
        }


        $pdf = Pdf::loadView('backend/reservations/invoice', [
            'reservation' => $reservation,
            'reservation_type' => $reservation_type
        ]);

        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true
        ]);
        return $pdf->download('reservation_invoice_'.$reservation->id.'.pdf');
//        return view('backend/reservations/invoice', compact('reservation'));
//
    }

    public function markConfirmed(Request $request)
    {
        $reservation = Reservations::where('id', $request->reservation_id)
            ->update(['is_reserved' => 1, 'driver_id' => $request->driver_id]);

        if ($reservation){
            if(checkSettings('reservation_confirmed_email')){
                $reservation = Reservations::with('customer', 'reservationRoute', 'reservationRoute.routeVehicle', 'reservationRoute.routeVehicle.routeDetails', 'reservationRoute.routeVehicle.vehicleDetails')->where('id', $request->reservation_id)->first();
                SendReservationConfirmed::dispatch($reservation);
            }
            return redirect()->route('reservations.pending')->with(
                'success',
                'Booking has been reserved successfully.'
            );
        }
        else {
            return redirect()->route('reservations.pending')->with(
                'warning',
                'Booking can not be reserved at this moment.'
            );
        }

    }

    public function markCancelled(Request $request)
    {
        $reservation = Reservations::where('id', $request->reservation_id)
            ->update(['is_cancelled' => 1, 'cancellation_reason' => $request->cancellation_reason]);

        if ($reservation){
            if(checkSettings('reservation_cancelled_email')){
                $reservation = Reservations::with('customer', 'reservationRoute', 'reservationRoute.routeVehicle', 'reservationRoute.routeVehicle.routeDetails', 'reservationRoute.routeVehicle.vehicleDetails')->where('id', $request->reservation_id)->first();
                SendReservationCancelled::dispatch($reservation);
            }
            return redirect()->route('reservations.pending')->with(
                'danger',
                'Booking has been cancelled successfully.'
            );
        }
        else {
            return redirect()->route('reservations.pending')->with(
                'warning',
                'Booking can not be cancelled at this moment.'
            );
        }
    }

    public function markCompleted(Request $request)
    {
        $reservation = Reservations::where('id', $request->reservation_id)
            ->update(['is_completed' => 1]);

        if ($reservation){
            if(checkSettings('reservation_completed_email')){
                $reservation = Reservations::with('customer', 'reservationRoute', 'reservationRoute.routeVehicle', 'reservationRoute.routeVehicle.routeDetails', 'reservationRoute.routeVehicle.vehicleDetails')->where('id', $request->reservation_id)->first();
                SendReservationCompleted::dispatch($reservation);
            }
            return redirect()->route('reservations.pending')->with(
                'success',
                'Booking has been completed successfully.'
            );
        }
        else {
            return redirect()->route('reservations.pending')->with(
                'warning',
                'Booking can not be complete at this moment.'
            );
        }
    }

    public function markReversed(Request $request)
    {
        Reservations::where('id', $request->reservation_id)
            ->update(['is_reserved' => 0, 'is_completed' => 0, 'is_paid' => 0, 'is_cancelled' => 0, 'cancellation_reason' => null]);

        return redirect()->route('reservations.cancelled')->with(
            'success',
            'Reservation has been reversed.'
        );
    }

    public function getFare(Request $request)
    {
        $fare = RouteVehicle::where('route_id', $request->route_id)->where('vehicle_id', $request->vehicle_id)->first();

        return response()->json(['fare' => $fare->fare]);
    }

    public function getCountryCode(Request $request)
    {

        $country_id = $request->country_id;
        $country = Country::where('id', $country_id)->first();

        return response()->json(['country_code' => $country->phonecode]);
    }

    public function acceptReservationRequest(Request $request)
    {
        $accept_reservation = acceptAndConfirmRequestedReservation($request);
        if ($accept_reservation){
            return redirect()->route('dashboard.index')->with(
                'success',
                'Reservation has been accepted and confirmed.'
            );
        }
        else {
            return redirect()->route('dashboard.index')->with(
                'warning',
                'Reservation can not be accepted. (Data Error)'
            );
        }
    }

    public function deleteReservationRequest(Request $request)
    {
        ReservationRequest::where('id', $request->reservation_request_id_delete)
            ->update(['is_cancelled' => 1]);

        return redirect()->route('dashboard.index')->with(
            'danger',
            'Reservation request has been cancelled.'
        );
    }
}
