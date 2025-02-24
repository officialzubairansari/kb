<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Country;
use App\Models\Page;
use App\Models\RouteVehicle;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct()
    {
        $site_data = getSiteData();


        view()->share('testimonials', $site_data['testimonials']);
        view()->share('highlights', $site_data['highlights']);
        view()->share('faqs', $site_data['faqs']);
        view()->share('latest_blogs', $site_data['latest_blogs']);
        view()->share('sliders', $site_data['sliders']);
        view()->share('blogs', $site_data['blogs']);
    }

    public function home()
    {
        $title = 'Home';
//        $page = Page::where('slug', 'home')->first();
//        $sections = $page->sections->pluck('slug');
        $sections = [];

        return view('website/home', compact('title', 'sections'));

    }

    public function aboutUs()
    {
        $title = 'About Us';
        $page = Page::where('slug', 'about_us')->first();
        $sections = $page->sections->pluck('slug');

        return view('website/page', compact('title', 'sections'));
    }

    public function contactUs()
    {
        $title = 'Contact Us';
        $page = Page::where('slug', 'contact_us')->first();
        $sections = $page->sections->pluck('slug');

        return view('website/page', compact('title', 'sections'));
    }

    public function faqs()
    {
        $title = 'FAQs';
        $page = Page::where('slug', 'faqs')->first();
        $sections = $page->sections->pluck('slug');

        return view('website/page', compact('title', 'sections'));
    }

    public function fareList()
    {
        $title = 'Fare List';
        $page = Page::where('slug', 'fare_list')->first();
        $sections = $page->sections->pluck('slug');

        return view('website/page', compact('title', 'sections'));
    }

    public function blogs()
    {
        $title = 'Blogs';
        $page = Page::where('slug', 'blogs')->first();
        $sections = $page->sections->pluck('slug');

        return view('website/page', compact('title', 'sections'));
    }

    public function blog(Blog $blog)
    {
        $title = implode(' ', array_slice(explode(' ', $blog->title), 0, 5)) . (str_word_count($blog->title) > 5 ? '...' : '');

        return view('website/single_blog', compact('title', 'blog'));
    }

    public function getCountryCode(Request $request)
    {

        $country_id = $request->country_id;
        $country = Country::where('id', $country_id)->first();

        return response()->json(['country_code' => $country->phonecode]);
    }

    public function getFare(Request $request)
    {
            $fare = RouteVehicle::where('route_id', $request->route_id)->where('vehicle_id', $request->vehicle_id)->first();

        return response()->json(['fare' => $fare->fare]);
    }

    public function mailSample()
    {
        return view('mails/reservation');
    }
}
