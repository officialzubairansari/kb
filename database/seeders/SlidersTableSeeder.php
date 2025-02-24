<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sliders')->truncate();
        DB::table('sliders')->insert([
            [
                'heading' => 'Toyota Camry',
                'paragraph' => 'The Toyota Camry is a midsize sedan known for its reliability, comfort, and fuel efficiency.',
                'button_link' => '#',
                'image' => 'slider_Lv1v3abv.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'heading' => 'GMC XL 2023',
                'paragraph' => 'The GMC XL 2023 is a midsize sedan known for its reliability, comfort, and fuel efficiency.',
                'button_link' => '#',
                'image' => 'slider_9oKv3abt.png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
