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
use App\Models\Highlight;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\Testimonial;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HighlightController extends Controller
{
    public function __construct()
    {

    }
    public function list()
    {
        $title = 'List Highlights';
        $highlights = Highlight::paginate();

        return view('backend/highlights/list', compact('title', 'highlights'));
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);

        $highlight = Highlight::create([
            'text' => $validatedData['text'],
            'icon' => $validatedData['icon'],
        ]);

        if ($highlight) {
            return redirect()->route('highlights.list')->with(
                'success',
                'New highlight has been added.'
            );
        } else {
            return redirect()->route('highlights.list')->with(
                'warning',
                'Failed to add a new highlight.'
            );
        }
    }
    public function delete(Request $request)
    {
        Highlight::where('id', $request->highlight_id)
            ->delete();

        return redirect()->route('highlights.list')->with(
            'success',
            'Highlight has been deleted.'
        );
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|string|max:255',
            'icon' => 'required|string|max:255',
        ]);

        $highlight = Highlight::where('id', $request->highlight_id)
            ->update($validatedData);

        if ($highlight) {
            return redirect()->route('highlights.list')->with(
                'success',
                'Highlight has been updated.'
            );
        } else {
            return redirect()->route('highlights.list')->with(
                'warning',
                'Failed to update highlight.'
            );
        }
    }
}
