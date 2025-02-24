<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use App\Models\Customers;
use App\Models\Drivers;
use App\Models\Employee;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list routes', ['only' => ['list']]);

    }

    public function list()
    {
        $title = 'List Routes';
        $routes = Routes::where('is_requested', 0)->paginate();

        return view('backend/routes/list', compact('title', 'routes'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'route' => 'required|string|max:255',
        ]);

        $route = Routes::create($validatedData);

        if ($route) {
            return redirect()->route('routes.list')->with(
                'success',
                'New route has been added.'
            );
        } else {
            return redirect()->route('routes.list')->with(
                'warning',
                'Failed to add a new route.'
            );
        }

    }
    public function delete(Request $request)
    {
        Routes::where('id', $request->route_id)
            ->update(['is_deleted' => 1]);

        return redirect()->route('routes.list')->with(
            'success',
            'route has been deleted.'
        );
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'route' => 'required|string|max:255',
        ]);

        $route = Routes::where('id', $request->route_id)
            ->update($validatedData);

        if ($route) {
            return redirect()->route('routes.list')->with(
                'success',
                'Route has been updated.'
            );
        } else {
            return redirect()->route('routes.list')->with(
                'warning',
                'Failed to update route.'
            );
        }
    }

}
