<?php

namespace App\Http\Controllers\Backend;

use App\Models\Author;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Country;
use App\Models\Customers;
use App\Models\Drivers;
use App\Models\Employee;
use App\Models\Faq;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\Testimonial;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    public function __construct()
    {

    }

    public function list()
    {
        $title = 'List Testimonials';
        $testimonials = Testimonial::paginate();

        return view('backend/testimonials/list', compact('title',  'testimonials'));
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'message' => 'required|string|max:65535',
        ]);

        $testimonial = Testimonial::create([
            'name' => $validatedData['name'],
            'country' => $validatedData['country'],
            'message' => $validatedData['message'],
        ]);

        if ($testimonial) {
            return redirect()->route('testimonials.list')->with(
                'success',
                'New Testimonial has been added.'
            );
        } else {
            return redirect()->route('testimonials.list')->with(
                'warning',
                'Failed to add a new testimonial.'
            );
        }
    }
    public function delete(Request $request)
    {
        Testimonial::where('id', $request->testimonial_id)
            ->delete();

        return redirect()->route('testimonials.list')->with(
            'success',
            'Testimonial has been deleted.'
        );
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'message' => 'required|string|max:65535',
        ]);

        $testimonial = Testimonial::where('id', $request->testimonial_id)
            ->update($validatedData);

        if ($testimonial) {
            return redirect()->route('testimonials.list')->with(
                'success',
                'Testimonial has been updated.'
            );
        } else {
            return redirect()->route('testimonials.list')->with(
                'warning',
                'Failed to update testimonial.'
            );
        }
    }


}
