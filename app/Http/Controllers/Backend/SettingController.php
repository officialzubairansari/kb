<?php

namespace App\Http\Controllers\Backend;

use App\Models\Country;
use App\Models\Customers;
use App\Models\Drivers;
use App\Models\Employee;
use App\Models\Reservations;
use App\Models\Routes;
use App\Models\Setting;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list settings', ['only' => ['list']]);
    }

    public function listGeneralSettings()
    {
        $title = 'General Settings';
        $settings = Setting::where('status', 1)->where('category', 'general')->get();

        return view('backend/settings/general_settings', compact('title', 'settings'));
    }
    public function updateGeneralSettings(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            $setting = Setting::where('slug', $key)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }

        return redirect()->route('general.settings.list')->with(
            'success',
            'Settings has been updated.'
        );
    }

    public function listSiteColors()
    {
        $title = 'Site Colors';
        $settings = Setting::where('status', 1)->where('category', 'site_colors')->get();

        return view('backend/settings/site_colors', compact('title', 'settings'));
    }
    public function updateSiteColors(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            $setting = Setting::where('slug', $key)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }

        return redirect()->route('site.colors.list')->with(
            'success',
            'Site colors has been updated.'
        );
    }

    public function listWhatsAppTemplates()
    {
        $title = 'Whatsapp Templates';
        $settings = Setting::where('status', 1)->where('category', 'whatsapp_template')->get();

        return view('backend/settings/whatsapp_templates', compact('title', 'settings'));
    }
    public function updateWhatsAppTemplates(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            $setting = Setting::where('slug', $key)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }

        return redirect()->route('whatsapp.templates.list')->with(
            'success',
            'Whatsapp templates are updated.'
        );
    }

    public function listEmailTemplates()
    {
        $title = 'Email Templates';
        $settings = Setting::where('status', 1)->where('category', 'email_template')->get();

        return view('backend/settings/email_templates', compact('title', 'settings'));
    }
    public function updateEmailTemplates(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            $setting = Setting::where('slug', $key)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }

        return redirect()->route('email.templates.list')->with(
            'success',
            'Email templates are updated.'
        );
    }

    public function listFrontEndSettings()
    {
        $title = 'Frontend Settings';
        $settings = Setting::where('status', 1)->where('category', 'frontend')->get();

        return view('backend/settings/frontend_settings', compact('title', 'settings'));
    }
    public function updateFrontEndSettings(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            $setting = Setting::where('slug', $key)->first();
            if ($setting) {
                $setting->value = $value;
                $setting->save();
            }
        }

        return redirect()->route('frontend.settings.list')->with(
            'success',
            'Frontend settings are updated.'
        );
    }


}
