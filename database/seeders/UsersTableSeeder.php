<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => 'Super Admin',
                'user_name' => 'superadmin',
                'company' => 'YourCompany',
                'website' => 'https://demo.arcoticsolutions.com/sastafleet',
                'contact_no' => null,
                'user_type' => 'superadmin',
                'email' => 'sastafleet@arcoticsolutions.com',
                'employee_code' => null,
                'cnic_no' => null,
                'password' => '$2y$10$q9gV6YWXZlNiGJGcKQspDuswOAdNb8I0Cg5nLn0Ztd3p2KGzmHCiy',
                'is_active' => 1,
                'profile' => 'profile/no-image.png',
                'remember_token' => Str::random(60),
                'is_deleted' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
            'name' => 'General User',
            'user_name' => 'general_user',
            'company' => 'YourCompany',
            'website' => 'https://demo.arcoticsolutions.com/sastafleet',
            'contact_no' => null,
            'user_type' => 'general_user',
            'email' => 'sastafleet@arcoticsolutions.com',
            'employee_code' => null,
            'cnic_no' => null,
            'password' => '$2y$10$q9gV6YWXZlNiGJGcKQspDuswOAdNb8I0Cg5nLn0Ztd3p2KGzmHCiy',
            'is_active' => 1,
            'profile' => 'profile/no-image.png',
            'remember_token' => Str::random(60),
            'is_deleted' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]
        ]);
    }
}
