<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faqs')->truncate();
        DB::table('faqs')->insert([
            [
                'question' => 'How do I book a vehicle with YourCompany?',
                'answer' => 'Booking a vehicle with YourCompany is easy! Simply visit our website, select your desired vehicle, choose your pickup and drop-off locations, and provide the required details. You can also book through our mobile app for added convenience.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question' => 'What payment methods do you accept?',
                'answer' => 'We accept various payment methods, including major credit cards (Visa, MasterCard, American Express), debit cards, and online payment platforms such as PayPal. All transactions are secure and encrypted for your safety.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'question' => 'Can I cancel or modify my booking?',
                'answer' => 'Yes, you can cancel or modify your booking through our website or mobile app. Please refer to our cancellation policy for specific details regarding any fees or deadlines. We strive to be as flexible as possible to accommodate your needs.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
