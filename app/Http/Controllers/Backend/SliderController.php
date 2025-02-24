<?php

namespace App\Http\Controllers\Backend;

use App\Models\Author;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Country;
use App\Models\Customers;
use App\Models\Drivers;
use App\Models\Employee;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\Slider;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function __construct()
    {

    }

    public function list()
    {
        $title = 'List Sliders';
        $sliders = Slider::paginate();

        return view('backend/sliders/list', compact('title', 'sliders'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'heading' => 'required|string|max:255',
            'paragraph' => 'required|string',
            'button_link' => 'required|string|max:255',
        ]);

        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension();
        $filename = 'slider_' . Str::random(8) . '.' . $extension;
        $image->move(public_path('images/sliders'), $filename);

        $slider = Slider::create([
            'image' => $filename,
            'heading' => $validatedData['heading'],
            'paragraph' => $validatedData['paragraph'],
            'button_link' => $validatedData['button_link'],
        ]);

        if ($slider) {
            return redirect()->route('sliders.list')->with(
                'success',
                'New slider has been added.'
            );
        } else {
            return redirect()->route('sliders.list')->with(
                'warning',
                'Failed to add a new slider.'
            );
        }
    }
    public function delete(Request $request)
    {
        Slider::where('id', $request->slider_id)
            ->delete();

        return redirect()->route('sliders.list')->with(
            'success',
            'Slider has been deleted.'
        );
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'heading' => 'required|string|max:255',
            'paragraph' => 'required|string',
            'button_link' => 'required|string|max:255',
        ]);

        $slider = Slider::findOrFail($request->slider_id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->getClientOriginalExtension();
            $filename = 'slider_' . Str::random(8) . '.' . $extension;
            $image->move(public_path('images/sliders'), $filename);

            $slider->image = $filename;
        }

        $slider->heading = $validatedData['heading'];
        $slider->paragraph = $validatedData['paragraph'];
        $slider->button_link = $validatedData['button_link'];

        if ($slider->save()) {
            return redirect()->route('sliders.list')->with(
                'success',
                'Slider has been updated successfully.'
            );
        } else {
            return redirect()->route('sliders.list')->with(
                'warning',
                'Failed to update the slider.'
            );
        }
    }


}
