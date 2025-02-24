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

class IconController extends Controller
{
    public function __construct()
    {

    }
    public function list()
    {
        $title = 'List Icons';

        return view('backend/icons/list', compact('title'));
    }
}
