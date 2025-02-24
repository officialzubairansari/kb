<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HighlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('highlights')->truncate();
        DB::table('highlights')->insert([
            [
                'text' => 'Premium & Updated Vehicle',
                'icon' => 'ri-car-line',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'text' => 'Polite & Professional Drivers',
                'icon' => 'ri-user-2-fill',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'text' => 'Enough Luggage Capacity',
                'icon' => 'ri-luggage-cart-fill',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'text' => 'Safe & Secured Transportation',
                'icon' => 'ri-shield-check-fill',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
