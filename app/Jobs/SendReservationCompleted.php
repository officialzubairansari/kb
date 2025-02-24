<?php

namespace App\Jobs;

use App\Mail\ReservationCancelled;
use App\Mail\ReservationCompleted;
use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendReservationCompleted implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $reservation;
    protected $template;
    protected $userEmail;
    protected $content;

    /**
     * Create a new job instance.
     */
    public function __construct($reservation)
    {
        $this->template = Setting::where('slug', 'reservation_completed_email_template')->value('value');

        $this->reservation = [
            'customer_name' => $reservation->customer->full_name,
            'customer_contact' => $reservation->customer->whatsapp,
            'customer_email' => $reservation->customer->email,
            'customer_phonecode' => $reservation->customer->country->phonecode,
            'customer_whatsapp' => $reservation->customer->country->phonecode.$reservation->customer->whatsapp,
            'route' => $reservation->reservationRoute->routeVehicle->routeDetails->route,
            'vehicle' => $reservation->reservationRoute->routeVehicle->vehicleDetails->title,
            'fare' => $reservation->reservationRoute->fare,
            'pickup_location' => $reservation->reservationRoute->pick_location,
            'pickup_date_time' => $reservation->reservationRoute->pick_date_time,
            'driver_name' => $reservation->driver->full_name ?? 'N/A',
            'driver_contact' => $reservation->driver->contact ?? 'N/A',
        ];

        $this->userEmail = $this->reservation['customer_email'];

        $this->content = preg_replace_callback('/{{(.*?)}}/', function($matches) {
            return $this->reservation[$matches[1]] ?? $matches[0];
        }, $this->template);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->userEmail)->send(new ReservationCompleted($this->content));
    }
}
