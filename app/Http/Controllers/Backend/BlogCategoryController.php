<?php

namespace App\Http\Controllers\Backend;

use App\Models\Author;
use App\Models\BlogCategory;
use App\Models\Country;
use App\Models\Customers;
use App\Models\Drivers;
use App\Models\Employee;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogCategoryController extends Controller
{
    public function __construct()
    {

    }

    public function list()
    {
        $title = 'List Blog Categories';
        $blog_categories = BlogCategory::paginate();

        return view('backend/blog_categories/list', compact('title', 'blog_categories'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $blog_category = BlogCategory::create($validatedData);

        if ($blog_category) {
            return redirect()->route('blog.categories.list')->with(
                'success',
                'New category has been added.'
            );
        } else {
            return redirect()->route('blog.categories.list')->with(
                'warning',
                'Failed to add a new category.'
            );
        }

    }
    public function delete(Request $request)
    {
        BlogCategory::where('id', $request->category_id)
            ->update(['is_deleted' => 1]);

        return redirect()->route('blog.categories.list')->with(
            'success',
            'Category has been deleted.'
        );
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $blog_category = BlogCategory::where('id', $request->category_id)
            ->update($validatedData);

        if ($blog_category) {
            return redirect()->route('blog.categories.list')->with(
                'success',
                'Category has been updated.'
            );
        } else {
            return redirect()->route('blog.categories.list')->with(
                'warning',
                'Failed to update category.'
            );
        }
    }

}
