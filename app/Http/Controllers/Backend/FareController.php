<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use App\Models\Customers;
use App\Models\Drivers;
use App\Models\Employee;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\RouteVehicle;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class FareController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list fares', ['only' => ['list']]);

    }

    public function list()
    {
        $title = 'List Fares';
        $routes = Routes::where('is_requested', 0)->get();
        $vehicles = Vehicle::all();

        $fares = RouteVehicle::with('routeDetails','vehicleDetails')->paginate();


        return view('backend/fares/list', compact('title', 'fares', 'routes', 'vehicles'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'route_id' => 'required|integer',
            'vehicle_id' => 'required|integer',
            'fare' => 'required|integer',
        ]);


        $fare = RouteVehicle::create($validatedData);

        if ($fare) {
            return redirect()->route('fares.list')->with(
                'success',
                'New fare has been added.'
            );
        } else {
            return redirect()->route('fares.list')->with(
                'warning',
                'Failed to add a new fare.'
            );
        }

    }
    public function delete(Request $request)
    {
        RouteVehicle::where('id', $request->fare_id)
            ->update(['is_deleted' => 1]);

        return redirect()->route('fares.list')->with(
            'success',
            'Fare has been deleted.'
        );
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'route_id' => 'required|integer',
            'vehicle_id' => 'required|integer',
            'fare' => 'required|integer',
        ]);

        $route = RouteVehicle::where('id', $request->fare_id)
            ->update($validatedData);

        if ($route) {
            return redirect()->route('fares.list')->with(
                'success',
                'Fare has been updated.'
            );
        } else {
            return redirect()->route('fares.list')->with(
                'warning',
                'Failed to update fare.'
            );
        }
    }


}
