<?php

namespace App\Http\Controllers\Backend;

use App\Mail\quotationEmail;
use App\Models\Email;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:list customers', ['only' => ['list']]);

    }

    public function quotationEmail()
    {
        $title = 'Quotation Email';
        $emails = Email::where('type', 'quotation')->paginate();
        $vehicles = Vehicle::with([
            'vehicleCategory',
            'minFare',
            'routeVehicles' => function ($query) {
                $query->where('is_deleted', 0)
                    ->where('is_requested', 0)
                    ->with(['route' => function ($query) {
                        $query->where('is_deleted', 0)
                            ->where('is_requested', 0);
                    }]);
            }
        ])->get();
        $body = 'Dear [Client\'s Name],

Thank you for considering Umrah Transport Service for your transportation needs during your Umrah or Hajj pilgrimage. We are pleased to assist you with reliable and comfortable transport throughout the holy cities of Saudi Arabia.

As requested, please find attached the fare list for our transport services across various routes, including popular destinations such as Makkah, Madinah, Jeddah, and other key locations. We offer a range of vehicles to suit your preferences, including economy, premium, and luxury options, ensuring a safe and pleasant journey for all pilgrims.

[Fare Here]

________________________________________________
Muhammad Abdullah
Website: https://umrah-transport.com
Email: booking@umrah-transport.com
Contact Now (WhatsApp/Call 24/7): +966595004191';

        return view('backend/emails/quotation', compact('title', 'emails', 'vehicles', 'body'));
    }

    public function sendMail(Request $request)
    {
        $validatedData = $request->validate([
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $email = Email::create([
            'to' => $validatedData['to'],
            'subject' => $validatedData['subject'],
            'type' => 'quotation',
            'body' => $validatedData['body'],
        ]);
        if ($email){
            Mail::to($email->to)->send(new quotationEmail($email->subject, $email->body));

            return back()->with('success', 'Email sent successfully and message saved.');
        } else {
            return back()->with('danger', 'Email sending failed.');
        }

    }



}
