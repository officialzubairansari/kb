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

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list customers', ['only' => ['list']]);

    }

    public function list()
    {
        $title = 'List Customers';
        $customers = Customers::with('country')->orderBy('created_at', 'desc')->paginate();
        $countries = Country::get();

        return view('backend/customers/list', compact('title', 'customers', 'countries'));
    }

    public function delete(Request $request)
    {
        Customers::where('id', $request->customer_id)
            ->update(['is_deleted' => 1]);

        return redirect()->route('customers.list')->with(
            'success',
            'Customer record has been deleted.'
        );
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email',
            'contact' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
            'country_id' => 'required|integer',
        ]);

        $customer = Customers::where('id', $request->customer_id)
            ->update($validatedData);

        if ($customer) {
            return redirect()->route('customers.list')->with(
                'success',
                'Customer record has been updated.'
            );
        } else {
            return redirect()->route('customers.list')->with(
                'warning',
                'Failed to update customer record.'
            );
        }
    }


}
