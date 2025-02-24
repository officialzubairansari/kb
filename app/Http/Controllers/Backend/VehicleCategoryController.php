<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use App\Models\Customers;
use App\Models\Drivers;
use App\Models\Employee;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Http\Request;

class VehicleCategoryController extends Controller
{
    public function __construct()
    {

    }

    public function list()
    {
        $title = 'List Vehicles Categories';
        $vehicle_categories = VehicleCategory::paginate();

        return view('backend/vehicle_categories/list', compact('title', 'vehicle_categories'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'slug' => 'required|string|max:255',
            'name' => 'required|string|max:255',
        ]);

        $vehicle_category = VehicleCategory::create($validatedData);

        if ($vehicle_category) {
            return redirect()->route('vehicle.categories.list')->with(
                'success',
                'New category has been added.'
            );
        } else {
            return redirect()->route('vehicle.categories.list')->with(
                'warning',
                'Failed to add a new category.'
            );
        }

    }

    public function delete(Request $request)
    {
        VehicleCategory::where('id', $request->vehicle_category_id)
            ->update(['is_deleted' => 1]);

        return redirect()->route('vehicle.categories.list')->with(
            'success',
            'Category has been deleted.'
        );
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
        ]);

        $vehicle_category = VehicleCategory::where('id', $request->vehicle_category_id)
            ->update($validatedData);

        if ($vehicle_category) {
            return redirect()->route('vehicle.categories.list')->with(
                'success',
                'Category has been updated.'
            );
        } else {
            return redirect()->route('vehicle.categories.list')->with(
                'warning',
                'Failed to update category.'
            );
        }
    }


}
