<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('testimonials')->truncate();
        DB::table('testimonials')->insert([
            [
                'name' => 'Sarah M',
                'country' => 'Egypt',
                'message' => "YourCompany made our family vacation seamless and stress-free. The vehicle was immaculate and spacious, accommodating all our luggage effortlessly. The driver was courteous and punctual, ensuring we reached our destination comfortably. We will definitely use YourCompany for all our future travel needs!",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Roshah',
                'country' => 'Unites State',
                'message' => "As a frequent business traveler, I rely on efficient and reliable transportation. YourCompany exceeded my expectations with their professional drivers and top-notch vehicles. Booking was a breeze, and the service was impeccable from start to finish. Highly recommended!",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Emily ',
                'country' => 'UAE',
                'message' => "I recently used YourCompany for an airport transfer, and I couldn't be happier with the service. The driver arrived early, helped with my bags, and ensured a smooth ride to the airport.",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
