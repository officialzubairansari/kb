<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use App\Models\Customers;
use App\Models\Drivers;
use App\Models\Employee;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list drivers', ['only' => ['list']]);
    }

    public function list()
    {
        $title = 'List Drivers';
        $drivers = Drivers::paginate();

        return view('backend/drivers/list', compact('title', 'drivers'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:255',
        ]);

        $driver = Drivers::create($validatedData);

        if ($driver) {
            return redirect()->route('drivers.list')->with(
                'success',
                'New driver has been added.'
            );
        } else {
            return redirect()->route('drivers.list')->with(
                'warning',
                'Failed to add a new driver.'
            );
        }

    }
    public function delete(Request $request)
    {
        Drivers::where('id', $request->driver_id)
            ->update(['is_deleted' => 1]);

        return redirect()->route('drivers.list')->with(
            'success',
            'Driver has been deleted.'
        );
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
        ]);

        $driver = Drivers::where('id', $request->driver_id)
            ->update($validatedData);

        if ($driver) {
            return redirect()->route('drivers.list')->with(
                'success',
                'New driver has been updated.'
            );
        } else {
            return redirect()->route('drivers.list')->with(
                'warning',
                'Failed to update driver.'
            );
        }
    }


}
