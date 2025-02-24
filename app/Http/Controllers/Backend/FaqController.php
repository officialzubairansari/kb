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

class FaqController extends Controller
{
    public function __construct()
    {

    }
    public function list()
    {
        $title = 'List Faqs';
        $faqs = Faq::paginate();

        return view('backend/faqs/list', compact('title', 'faqs'));
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required|string|max:65535',
            'answer' => 'required|string|max:65535',
        ]);

        $faq = Faq::create([
            'question' => $validatedData['question'],
            'answer' => $validatedData['answer'],
        ]);

        if ($faq) {
            return redirect()->route('faqs.list')->with(
                'success',
                'New faq has been added.'
            );
        } else {
            return redirect()->route('faqs.list')->with(
                'warning',
                'Failed to add a new faq.'
            );
        }
    }
    public function delete(Request $request)
    {
        Faq::where('id', $request->faq_id)
            ->delete();

        return redirect()->route('faqs.list')->with(
            'success',
            'Faq has been deleted.'
        );
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required|string|max:65535',
            'answer' => 'required|string|max:65535',
        ]);

        $faq = Faq::where('id', $request->faq_id)
            ->update($validatedData);

        if ($faq) {
            return redirect()->route('faqs.list')->with(
                'success',
                'Faq has been updated.'
            );
        } else {
            return redirect()->route('faqs.list')->with(
                'warning',
                'Failed to update faq.'
            );
        }
    }
}
