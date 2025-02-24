<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->truncate();
        DB::table('companies')->insert([
            [
                'name' => 'YourCompany',
                'short_description' => '#1 Transport Service Company in USA',
                'long_description' => 'YourCompany is the #1 transport service company in the USA, pioneering the fleet booking and car rental industry. We pride ourselves on offering premium and updated vehicles, polite and professional drivers, ample luggage capacity, and safe, secure transportation. With a commitment to exceptional service and customer satisfaction, YourCompany sets the standard for excellence in the transportation sector.',
                'logo_light' => 'logo_0GMVAxMU.png',
                'logo_dark' => 'logo_91N5Hknp.png',
                'website' => 'https://yourcompany.com',
                'email' => 'info@yourcompany.com',
                'contact' => '(00) 123 456789',
                'address' => '85 Great Portland Street, London, England, W1W 7LT',
                'facebook' => '#',
                'twitter' => '#',
                'youtube' => '#',
                'instagram' => '#',
                'currency' => 'USD',
                'google_map' => '#',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
