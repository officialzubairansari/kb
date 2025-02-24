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
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function __construct()
    {

    }

    public function list()
    {
        $title = 'List Blogs';
        $authors = Author::all();
        $categories = BlogCategory::all();
        $blogs = Blog::with('nameAuthor', 'nameBlogCategory')->paginate();

        return view('backend/blogs/list', compact('title', 'blogs', 'authors', 'categories'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $image = $request->file('featured_image');
        $extension = $image->getClientOriginalExtension();
        $filename = 'blog_' . Str::random(8) . '.' . $extension;
        $image->move(public_path('images/blog'), $filename);

        $blog = Blog::create([
            'featured_image' => $filename,
            'author_id' => $validatedData['author_id'],
            'category_id' => $validatedData['category_id'],
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
        ]);

        if ($blog) {
            return redirect()->route('blogs.list')->with(
                'success',
                'New blog has been added.'
            );
        } else {
            return redirect()->route('blogs.list')->with(
                'warning',
                'Failed to add a new blog.'
            );
        }
    }
    public function delete(Request $request)
    {
        Blog::where('id', $request->blog_id)
            ->update(['is_deleted' => 1]);

        return redirect()->route('blogs.list')->with(
            'success',
            'Blog has been deleted.'
        );
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'featured_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:blog_categories,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blog = Blog::findOrFail($validatedData['blog_id']);

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $extension = $image->getClientOriginalExtension();
            $filename = 'blog_' . Str::random(8) . '.' . $extension;
            $image->move(public_path('images/blog'), $filename);

            $blog->featured_image = $filename;
        }

        $blog->author_id = $validatedData['author_id'];
        $blog->category_id = $validatedData['category_id'];
        $blog->title = $validatedData['title'];
        $blog->content = $validatedData['content'];

        if ($blog->save()) {
            return redirect()->route('blogs.list')->with(
                'success',
                'Blog has been updated successfully.'
            );
        } else {
            return redirect()->route('blogs.list')->with(
                'warning',
                'Failed to update the blog.'
            );
        }
    }


}
