<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use App\Models\Country;
use App\Models\Customers;
use App\Models\Drivers;
use App\Models\Employee;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list vehicles', ['only' => ['list']]);
    }

    public function list()
    {
        $title = 'List Vehicles';
        $vehicles = Vehicle::with('vehicleCategory')->paginate();
        $vehicle_categories = VehicleCategory::all();

        return view('backend/vehicles/list', compact('title', 'vehicles', 'vehicle_categories'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_4' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'long_description' => 'required|string',
            'model' => 'required|string|max:255',
            'vehicle_category_id' => 'required|exists:vehicle_categories,id',
            'company' => 'required|string|max:255',
            'stars' => 'integer',
            'passengers' => 'integer',
            'luggage' => 'integer',
            'status' => 'integer',
        ]);

        $images = [
            'featured_image',
            'image_1',
            'image_2',
            'image_3',
            'image_4',
        ];

        $filenames = [];

        foreach ($images as $image) {
            $file = $request->file($image);
            $extension = $file->getClientOriginalExtension();
            $filename = 'vehicle_' . Str::random(8) . '.' . $extension;
            $file->move(public_path('images/vehicles'), $filename);
            $filenames[$image] = $filename;
        }

        $vehicle = Vehicle::create([
            'featured_image' => $filenames['featured_image'],
            'image_1' => $filenames['image_1'],
            'image_2' => $filenames['image_2'],
            'image_3' => $filenames['image_3'],
            'image_4' => $filenames['image_4'],
            'title' => $validatedData['title'],
            'short_description' => $validatedData['short_description'],
            'long_description' => $validatedData['long_description'],
            'model' => $validatedData['model'],
            'vehicle_category_id' => $validatedData['vehicle_category_id'],
            'company' => $validatedData['company'],
            'stars' => $validatedData['stars'],
            'passengers' => $validatedData['passengers'],
            'luggage' => $validatedData['luggage'],
            'status' => $validatedData['status'],
        ]);

        if ($vehicle) {
            return redirect()->route('vehicles.list')->with(
                'success',
                'New vehicle has been added.'
            );
        } else {
            return redirect()->route('vehicles.list')->with(
                'warning',
                'Failed to add a new vehicle.'
            );
        }
    }


    public function delete(Request $request)
    {
        Vehicle::where('id', $request->vehicle_id)
            ->update(['is_deleted' => 1]);

        return redirect()->route('vehicles.list')->with(
            'success',
            'Vehicle has been deleted.'
        );
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_1' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_2' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_3' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_4' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'long_description' => 'required|string',
            'model' => 'required|string|max:255',
            'vehicle_category_id' => 'required|exists:vehicle_categories,id',
            'company' => 'required|string|max:255',
            'stars' => 'integer',
            'passengers' => 'integer',
            'luggage' => 'integer',
            'status' => 'integer',
        ]);

        $vehicle = Vehicle::findOrFail($request->vehicle_id);

        $images = [
            'featured_image',
            'image_1',
            'image_2',
            'image_3',
            'image_4',
        ];

        foreach ($images as $image) {
            if ($request->hasFile($image)) {
                $file = $request->file($image);
                $extension = $file->getClientOriginalExtension();
                $filename = 'vehicle_' . Str::random(8) . '.' . $extension;
                $file->move(public_path('images/vehicles'), $filename);
                $vehicle->$image = $filename;
            }
        }

        $vehicle->title = $validatedData['title'];
        $vehicle->short_description = $validatedData['short_description'];
        $vehicle->long_description = $validatedData['long_description'];
        $vehicle->model = $validatedData['model'];
        $vehicle->vehicle_category_id = $validatedData['vehicle_category_id'];
        $vehicle->company = $validatedData['company'];
        $vehicle->stars = $validatedData['stars'];
        $vehicle->passengers = $validatedData['passengers'];
        $vehicle->luggage = $validatedData['luggage'];
        $vehicle->status = $validatedData['status'];

        if ($vehicle->save()) {
            return redirect()->route('vehicles.list')->with(
                'success',
                'Vehicle has been updated.'
            );
        } else {
            return redirect()->route('vehicles.list')->with(
                'warning',
                'Failed to update the vehicle.'
            );
        }
    }


}
