<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->truncate();
        DB::table('settings')->insert([
            [
                'type' => 'boolean',
                'slug' => 'custom_project',
                'name' => 'Custom Project',
                'value' => '0',
                'status' => 0,
                'category' => '',
                'order_by' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'boolean',
                'slug' => 'reservation_request',
                'name' => 'Reservation Request',
                'value' => '1',
                'status' => 1,
                'category' => 'general',
                'order_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'boolean',
                'slug' => 'show_vehicle_categories_on_header_menu',
                'name' => 'Show vehicle categories on header menu',
                'value' => '1',
                'status' => 1,
                'category' => 'general',
                'order_by' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'boolean',
                'slug' => 'show_vehicle_categories_on_footer_menu',
                'name' => 'Show vehicle categories on footer menu',
                'value' => '1',
                'status' => 1,
                'category' => 'general',
                'order_by' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'boolean',
                'slug' => 'reservation_received_email',
                'name' => 'Send reservation received email',
                'value' => '0',
                'status' => 1,
                'category' => 'general',
                'order_by' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'boolean',
                'slug' => 'reservation_confirmed_email',
                'name' => 'Send reservation confirmed email',
                'value' => '0',
                'status' => 1,
                'category' => 'general',
                'order_by' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'boolean',
                'slug' => 'reservation_completed_email',
                'name' => 'Send reservation completed email',
                'value' => '0',
                'status' => 1,
                'category' => 'general',
                'order_by' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'boolean',
                'slug' => 'reservation_cancelled_email',
                'name' => 'Send reservation cancelled email',
                'value' => '0',
                'status' => 1,
                'category' => 'general',
                'order_by' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'text',
                'slug' => 'reservation_received_whatsapp_template',
                'name' => 'Reservation received (WhatsApp template)',
                'value' => 'Dear {{customer_name}},
                
                We have received reservation request.
                Details of the reservation are below:
                Route: {{route}}
                Vehicle: {{vehicle}}
                Pickup location and time: {{pickup_location}}, {{pickup_date_time}}
                Fare: {{fare}} USD
                
                Thank you soo much',
                'status' => 1,
                'category' => 'whatsapp_template',
                'order_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'text',
                'slug' => 'reservation_confirmed_whatsapp_template',
                'name' => 'Reservation confirmed (WhatsApp template)',
                'value' => 'Dear {{customer_name}},
                
                We have received reservation request.
                Details of the reservation are below:
                Route: {{route}}
                Vehicle: {{vehicle}}
                Pickup location and time: {{pickup_location}}, {{pickup_date_time}}
                Fare: {{fare}} USD
                
                Thank you soo much',
                'status' => 1,
                'category' => 'whatsapp_template',
                'order_by' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'text',
                'slug' => 'reservation_completed_whatsapp_template',
                'name' => 'Reservation completed (WhatsApp template)',
                'value' => 'Dear {{customer_name}},
                
                We have received reservation request.
                Details of the reservation are below:
                Route: {{route}}
                Vehicle: {{vehicle}}
                Pickup location and time: {{pickup_location}}, {{pickup_date_time}}
                Fare: {{fare}} USD
                
                Thank you soo much',
                'status' => 1,
                'category' => 'whatsapp_template',
                'order_by' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'text',
                'slug' => 'reservation_cancelled_whatsapp_template',
                'name' => 'Reservation cancelled (WhatsApp template)',
                'value' => 'Dear {{customer_name}},
                
                We have received reservation request.
                Details of the reservation are below:
                Route: {{route}}
                Vehicle: {{vehicle}}
                Pickup location and time: {{pickup_location}}, {{pickup_date_time}}
                Fare: {{fare}} USD
                
                Thank you soo much',
                'status' => 1,
                'category' => 'whatsapp_template',
                'order_by' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'text',
                'slug' => 'primary',
                'name' => 'Primary',
                'value' => '#665e40',
                'status' => 1,
                'category' => 'site_colors',
                'order_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'text',
                'slug' => 'primary_light',
                'name' => 'Primary Light',
                'value' => '#7c7453',
                'status' => 1,
                'category' => 'site_colors',
                'order_by' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'text',
                'slug' => 'primary_btn',
                'name' => 'Primary Button',
                'value' => '#',
                'status' => 0,
                'category' => 'site_colors',
                'order_by' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'text',
                'slug' => 'secondary',
                'name' => 'Secondary',
                'value' => '#21252e',
                'status' => 1,
                'category' => 'site_colors',
                'order_by' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'text',
                'slug' => 'secondary_light',
                'name' => 'Secondary Light',
                'value' => '#2f3440',
                'status' => 1,
                'category' => 'site_colors',
                'order_by' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'text',
                'slug' => 'secondary_btn',
                'name' => 'Secondary Button',
                'value' => '#',
                'status' => 0,
                'category' => 'site_colors',
                'order_by' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'text',
                'slug' => 'reservation_received_email_template',
                'name' => 'Reservation received (Email template)',
                'value' => 'Dear {{customer_name}},
                
                We have received reservation request.
                Details of the reservation are below:
                Route: {{route}}
                Vehicle: {{vehicle}}
                Pickup location and time: {{pickup_location}}, {{pickup_date_time}}
                Fare: {{fare}} USD
                
                Thank you soo much',
                'status' => 1,
                'category' => 'email_template',
                'order_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'text',
                'slug' => 'reservation_confirmed_email_template',
                'name' => 'Reservation confirmed (Email template)',
                'value' => 'Dear {{customer_name}},
                
                We have received reservation request.
                Details of the reservation are below:
                Route: {{route}}
                Vehicle: {{vehicle}}
                Pickup location and time: {{pickup_location}}, {{pickup_date_time}}
                Fare: {{fare}} USD
                
                Thank you soo much',
                'status' => 1,
                'category' => 'email_template',
                'order_by' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'text',
                'slug' => 'reservation_completed_email_template',
                'name' => 'Reservation completed (Email template)',
                'value' => 'Dear {{customer_name}},
                
                We have received reservation request.
                Details of the reservation are below:
                Route: {{route}}
                Vehicle: {{vehicle}}
                Pickup location and time: {{pickup_location}}, {{pickup_date_time}}
                Fare: {{fare}} USD
                
                Thank you soo much',
                'status' => 1,
                'category' => 'email_template',
                'order_by' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'text',
                'slug' => 'reservation_cancelled_email_template',
                'name' => 'Reservation cancelled (Email template)',
                'value' => 'Dear {{customer_name}},
                
                We have received reservation request.
                Details of the reservation are below:
                Route: {{route}}
                Vehicle: {{vehicle}}
                Pickup location and time: {{pickup_location}}, {{pickup_date_time}}
                Fare: {{fare}} USD
                
                Thank you soo much',
                'status' => 1,
                'category' => 'email_template',
                'order_by' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'boolean',
                'slug' => 'top_bar_in_header',
                'name' => 'Top Bar in Header',
                'value' => '1',
                'status' => 1,
                'category' => 'frontend',
                'order_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'boolean',
                'slug' => 'campaign_bar_in_header',
                'name' => 'Campaign Bar in Header',
                'value' => '1',
                'status' => 1,
                'category' => 'frontend',
                'order_by' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'type' => 'boolean',
                'slug' => 'slider_type',
                'name' => 'Slider Type',
                'value' => 'default',
                'status' => 0,
                'category' => 'frontend',
                'order_by' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);
    }
}
