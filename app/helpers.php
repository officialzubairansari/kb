<?php

use App\Models\Companies;
use App\Models\Customers;
use App\Models\ReservationRoute;
use App\Models\Reservations;
use App\Models\RouteVehicle;
use App\Models\ReservationRequest;
use App\Models\Routes;
use App\Models\Setting;
use App\Models\VehicleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Vehicle;
use App\Models\Faq;
use App\Models\Highlight;
use App\Models\Blog;

/**
 * Child Route For Menu
 */
function checkChildRoute($submenu) {
    foreach ($submenu as $subItem) {
        if (Route::currentRouteName() == $subItem['route']) {
            return true;
        }

        if (isset($subItem['submenu'])) {
            if (checkChildRoute($subItem['submenu'])) {
                return true;
            }
        }
    }
    return false;
}

/**
 * Pre reservation/reservation request
 * This function is creating a request of reservation, it is not creating a actual reservation, reservation request can be a proper reservation if admin accept.
 */
function reservation_request(Request $request)
{
    try {
        DB::beginTransaction();

        $customer = createCustomer($request);
        $requested_route = createRequestedRoute($request);
        $reservation_request = createReservationRequest($request, $customer->id, $requested_route->id);

        DB::commit();

        return $reservation_request;

    } catch (\Exception $e) {
        DB::rollback();
        return false;
    }
}

/**
 * Accepting and marking as confirmed reservation of Requested Reservation
 * It will mark the requested reservation (custom route reservation) as confirmed and also marked as accepted reservation
 */
function acceptAndConfirmRequestedReservation(Request $request)
{
    try {
        DB::beginTransaction();

        $customer_id = ReservationRequest::where('id', $request->reservation_request_id_accept)->value('customer_id');
        $reservation = createReservation($request, $customer_id, true);
        $reservation_route = createReservationRoute($request, $reservation->id, true);
        $mark_as_accepted = ReservationRequest::where('id', $request->reservation_request_id_accept)->update(['is_accepted' => 1]);

        DB::commit();

        return $reservation;

    } catch (\Exception $e) {
        DB::rollback();
        return false;
    }
}

/**
 * Reservation of vehicle for both, frontend and backend
 * It will redirect to frontend if the request from frontend, and it will redirect to backend if the request from backend
 */
function vehicle_reservation(Request $request)
{
    try {
        DB::beginTransaction();

        $customer = createCustomer($request);
        $reservation = createReservation($request, $customer->id);
        $reservation_route = createReservationRoute($request, $reservation->id);

        DB::commit();

        return $reservation;

    } catch (\Exception $e) {
        DB::rollback();
        return false;
    }
}

/**
 * Creating customer record
 */
function createCustomer(Request $request)
{
    $validatedData = $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'contact' => 'required|string|max:255',
        'whatsapp' => 'required|string|max:255',
        'country_id' => 'required|exists:countries,id',
    ]);

    return Customers::create($validatedData);
}

/**
 * Creating requested route
 */
function createRequestedRoute(Request $request)
{
    $validatedData = $request->validate([
        'from' => 'required|string|max:255',
        'to' => 'required|string|max:255',
    ]);

    $routeName = $validatedData['from'] . ' To ' . $validatedData['to'];

    return Routes::create(['route' => $routeName,'is_requested' => 1]);
}

/**
 * Creating proper reservation
 */
function createReservation(Request $request, $customer_id, $is_requested_reservation = false)
{
    $reservationData = [
        'customer_id' => $customer_id,
        'invoice_no' => rand(11111, 99999)
    ];

    //if the request has company_id it will insert company_id else it will insert 1 as default company_id.
    if ($request->has('company_id')) {
        $reservationData['company_id'] = $request->company_id;
    }

    //if it is an acceptance of personalized requested reservation
    if ($is_requested_reservation) {
        $reservationData['is_reserved'] = 1;
        $reservationData['driver_id'] = $request->reservation_request_driver_id;
    }

    return Reservations::create($reservationData);
}

/**
 * Creating reservation request
 */
function createReservationRequest(Request $request, $customer_id, $route_id)
{
    $validatedData = $request->validate([
        'vehicle_id' => 'required|exists:vehicles,id',
        'pick_location' => 'required|string|max:255',
        'pick_date_time' => 'required',
    ]);

    $reservationRequestData = [
        'customer_id' => $customer_id,
        'route_id' => $route_id,
        'vehicle_id' => $validatedData['vehicle_id'],
        'pick_location' => $validatedData['pick_location'],
        'pick_date_time' => $validatedData['pick_date_time'],
    ];

    return ReservationRequest::create($reservationRequestData);
}

/**
 * Creating reservation route
 */
function createReservationRoute(Request $request, $reservation_id, $is_requested_reservation = false)
{
    if ($is_requested_reservation){
        $reservation_request_details = ReservationRequest::where('id', $request->reservation_request_id_accept)->first();
        $route_vehicle = RouteVehicle::create([
            'route_id' => $reservation_request_details->route_id,
            'vehicle_id' => $reservation_request_details->vehicle_id,
            'fare' => $request->reservation_request_fare,
            'is_requested' => 1,
        ]);

        return ReservationRoute::create([
            'reservation_id' => $reservation_id,
            'route_vehicle_id' => $route_vehicle->id,
            'fare' => $route_vehicle->fare,
            'pick_location' => $reservation_request_details->pick_location,
            'pick_date_time' => $reservation_request_details->pick_date_time,
        ]);

    }

    $validatedData = $request->validate([
        'route_id' => 'required|exists:routes,id',
        'vehicle_id' => 'required|exists:vehicles,id',
        'fare' => 'required|numeric',
        'pick_location' => 'required|string|max:255',
        'pick_date_time' => 'required',
    ]);


    $route_vehicle_id = RouteVehicle::where('route_id', $validatedData['route_id'])
        ->where('vehicle_id', $validatedData['vehicle_id'])
        ->firstOrFail();

    return ReservationRoute::create([
        'reservation_id' => $reservation_id,
        'route_vehicle_id' => $route_vehicle_id->id,
        'fare' => $validatedData['fare'],
        'pick_location' => $validatedData['pick_location'],
        'pick_date_time' => $validatedData['pick_date_time'],
    ]);
}

/**
 * Check for setting's status
 */
function checkSettings($slug): bool
{
    $value = Setting::where('slug', $slug)->value('value');

    return $value == 1; // compare the value to 1 to return a true otherwise it will return false
}

/**
 * Getting Cached Data - If not availble, it will cache the data
 */
function getCacheData(): array
{
    $data = [];
    if (checkDatabaseConnections()) {
        // Frontend Settings
        $cache_key = 'frontend_settings';
        $data['frontend_settings'] = Cache::get($cache_key);
        if (! $data['frontend_settings']) {
            $data['frontend_settings'] = Setting::where('category', 'frontend')
                ->get();
            Cache::put($cache_key, $data['frontend_settings']);
        }

        // General Settings
        $cache_key = 'general_settings';
        $data['general_settings'] = Cache::get($cache_key);
        if (! $data['general_settings']) {
            $data['general_settings'] = Setting::where('status', 1)
                ->where('category', 'general')
                ->get();
            Cache::put($cache_key, $data['general_settings']);
        }


        // Company Details
        $cache_key = 'company_details';
        $data['company_details'] = Cache::get($cache_key);
        if (! $data['company_details']) {
            $data['company_details'] = Companies::first();
            Cache::put($cache_key, $data['company_details']);
        }

        // Site Colors
        $cache_key = 'site_colors';
        $data['site_colors'] = Cache::get($cache_key);
        if (! $data['site_colors']) {
            $data['site_colors'] = Setting::where('status', 1)->where('category', 'site_colors')->get();
            Cache::put($cache_key, $data['site_colors']);
        }
    } else {
        $data['frontend_settings'] = null;
        $data['general_settings'] = null;
        $data['company_details'] = null;
        $data['site_colors'] = null;
    }

    return $data;
}

/**
 * Getting Site or frontend Data
 */
function getSiteData(): array
{
    $data = [];
    if (checkDatabaseConnections()) {
        $data['testimonials'] = Testimonial::all();
        $data['highlights'] = Highlight::all();
        $data['faqs'] = Faq::all();
        $data['sliders'] = Slider::where('id', 1)->get();
        $data['latest_blogs'] = Blog::with('nameAuthor', 'nameBlogCategory')->orderBy('created_at', 'desc')->take(3)->get();
        $data['blogs'] = Blog::with('nameAuthor', 'nameBlogCategory')->get();
    } else {
        $data['testimonials'] = collect();
        $data['highlights'] = collect();
        $data['faqs'] = collect();
        $data['sliders'] = collect();
        $data['latest_blogs'] = collect();
        $data['blogs'] = collect();
    }

    return $data;
}

/**
 * Checking the database connection
 */
function checkDatabaseConnections(): bool
{
    // Check if the database connection is available
    try {
        DB::connection()->getPdo();
        return true;
    } catch (\Exception $e) {
        return false;
    }
}
