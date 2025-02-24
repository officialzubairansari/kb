<?php

namespace App\Http\Controllers\Backend;

use App\Models\Author;
use App\Models\Country;
use App\Models\Customers;
use App\Models\Drivers;
use App\Models\Employee;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    public function __construct()
    {

    }

    public function list()
    {
        $title = 'List Authors';
        $authors = Author::paginate();

        return view('backend/authors/list', compact('title', 'authors'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = Author::create($validatedData);

        if ($author) {
            return redirect()->route('authors.list')->with(
                'success',
                'New author has been added.'
            );
        } else {
            return redirect()->route('authors.list')->with(
                'warning',
                'Failed to add a new author.'
            );
        }

    }
    public function delete(Request $request)
    {
        Author::where('id', $request->author_id)
            ->update(['is_deleted' => 1]);

        return redirect()->route('authors.list')->with(
            'success',
            'Author has been deleted.'
        );
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = Author::where('id', $request->author_id)
            ->update($validatedData);

        if ($author) {
            return redirect()->route('authors.list')->with(
                'success',
                'Author has been updated.'
            );
        } else {
            return redirect()->route('authors.list')->with(
                'warning',
                'Failed to update author.'
            );
        }
    }

}
