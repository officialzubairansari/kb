<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use App\Models\Companies;
use App\Models\Country;
use App\Models\Customers;
use App\Models\Drivers;
use App\Models\Employee;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\Setting;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function __construct()
    {

    }

    public function list()
    {
        $title = 'Company Information';
        $company_information = Companies::first();

        return view('backend/settings/company_information', compact('title', 'company_information'));
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'logo_dark' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'logo_light' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'nullable|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'long_description' => 'nullable|string',
            'website' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'currency' => 'nullable|string|max:255',
            'google_map' => 'nullable|string',
        ]);

        $company = Companies::first();

        if ($request->hasFile('logo_dark')) {
            $image = $request->file('logo_dark');
            $extension = $image->getClientOriginalExtension();
            $filename = 'logo_' . Str::random(8) . '.' . $extension;
            $image->move(public_path('logo'), $filename);

            $company->logo_dark = $filename;
        }

        if ($request->hasFile('logo_light')) {
            $image = $request->file('logo_light');
            $extension = $image->getClientOriginalExtension();
            $filename = 'logo_' . Str::random(8) . '.' . $extension;
            $image->move(public_path('logo'), $filename);

            $company->logo_light = $filename;
        }

        $company->name = $validatedData['name'];
        $company->short_description = $validatedData['short_description'];
        $company->long_description = $validatedData['long_description'];
        $company->website = $validatedData['website'];
        $company->email = $validatedData['email'];
        $company->contact = $validatedData['contact'];
        $company->address = $validatedData['address'];
        $company->facebook = $validatedData['facebook'];
        $company->twitter = $validatedData['twitter'];
        $company->youtube = $validatedData['youtube'];
        $company->instagram = $validatedData['instagram'];
        $company->currency = $validatedData['currency'];
        $company->google_map = $validatedData['google_map'];

        if ($company->save()) {
            return redirect()->route('companies.list')->with(
                'success',
                'Company information has been updated successfully.'
            );
        } else {
            return redirect()->route('companies.list')->with(
                'warning',
                'Failed to update the company information.'
            );
        }
    }




}
