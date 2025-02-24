<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use App\Models\Customers;
use App\Models\Drivers;
use App\Models\ReservationRoute;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\RouteVehicle;
use App\Models\Setting;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WhatsappController extends Controller
{
    public function __construct()
    {
    }


    public function sendWhatsapp($reservation)
    {
        $reservation = Reservations::with(['customer', 'driver', 'customer.country', 'reservationRoute', 'reservationRoute.routeVehicle', 'reservationRoute.routeVehicle.routeDetails', 'reservationRoute.routeVehicle.vehicleDetails'])
            ->find($reservation);

        $reservation_received = Setting::where('slug', 'reservation_received_whatsapp_template')->value('value');
        $reservation_confirmed = Setting::where('slug', 'reservation_confirmed_whatsapp_template')->value('value');
        $reservation_completed = Setting::where('slug', 'reservation_completed_whatsapp_template')->value('value');
        $reservation_cancelled = Setting::where('slug', 'reservation_cancelled_whatsapp_template')->value('value');

        $reservation_information = [
            'customer_name' => $reservation->customer->full_name,
            'customer_contact' => $reservation->customer->whatsapp,
            'customer_phonecode' => $reservation->customer->country->phonecode,
            'customer_whatsapp' => $reservation->customer->country->phonecode.$reservation->customer->whatsapp,
            'route' => $reservation->reservationRoute->routeVehicle->routeDetails->route,
            'vehicle' => $reservation->reservationRoute->routeVehicle->vehicleDetails->title,
            'fare' => $reservation->reservationRoute->fare,
            'pickup_location' => $reservation->reservationRoute->pick_location,
            'pickup_date_time' => $reservation->reservationRoute->pick_date_time,
            'driver_name' => $reservation->driver->full_name ?? 'N/A',
            'driver_contact' => $reservation->driver->contact ?? 'N/A',
        ];


        if($reservation->is_reserved == 0 && $reservation->is_cancelled == 0) {
            $message = preg_replace_callback('/{{(.*?)}}/', function($matches) use ($reservation_information) {
                return $reservation_information[$matches[1]] ?? $matches[0];
            }, $reservation_received);
        }
        elseif ($reservation->is_reserved == 1 && $reservation->is_completed == 0){
            $message = preg_replace_callback('/{{(.*?)}}/', function($matches) use ($reservation_information) {
                return $reservation_information[$matches[1]] ?? $matches[0];
            }, $reservation_confirmed);
        }
        elseif ($reservation->is_reserved == 1 && $reservation->is_completed == 1){
            $message = preg_replace_callback('/{{(.*?)}}/', function($matches) use ($reservation_information) {
                return $reservation_information[$matches[1]] ?? $matches[0];
            }, $reservation_completed);
        }
        elseif ($reservation->is_cancelled == 1){
            $message = preg_replace_callback('/{{(.*?)}}/', function($matches) use ($reservation_information) {
                return $reservation_information[$matches[1]] ?? $matches[0];
            }, $reservation_cancelled);
        }

        // Encode the message for URL
        $encodedMessage = urlencode($message);

        // Generate the WhatsApp link
        //https://web.whatsapp.com/
        //https://api.whatsapp.com/
        $whatsappLink = "https://api.whatsapp.com/send/?text={$encodedMessage}&phone={$reservation_information['customer_whatsapp']}";

        // Redirect to the WhatsApp link
        return redirect()->away($whatsappLink);

    }

}

