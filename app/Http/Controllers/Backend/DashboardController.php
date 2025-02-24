<?php

namespace App\Http\Controllers\Backend;

use App\Models\Drivers;
use App\Models\ReservationRequest;
use App\Models\Reservations;

class DashboardController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $title = 'Dashboard';



        return view('backend/dashboard', compact('title'));
    }

}
