<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Super Admin', 'guard_name' => 'web', 'created_at' => '2023-10-15 09:56:30', 'updated_at' => '2023-10-15 09:56:30'],
            ['id' => 2, 'name' => 'General User', 'guard_name' => 'web', 'created_at' => '2023-10-15 10:20:13', 'updated_at' => '2023-10-15 10:20:13'],
        ]);
    }
}
