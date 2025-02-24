<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            ['id' => 1, 'name' => 'list users', 'guard_name' => 'web', 'module_id' => 1, 'created_at' => '2023-10-15 09:56:30', 'updated_at' => '2023-10-15 09:56:30'],
            ['id' => 2, 'name' => 'list reservations', 'guard_name' => 'web', 'module_id' => 1, 'created_at' => '2023-10-15 09:56:31', 'updated_at' => '2023-10-15 09:56:31'],
            ['id' => 3, 'name' => 'list customers', 'guard_name' => 'web', 'module_id' => 1, 'created_at' => '2023-10-15 09:56:31', 'updated_at' => '2023-10-15 09:56:31'],
            ['id' => 4, 'name' => 'list fares', 'guard_name' => 'web', 'module_id' => 1, 'created_at' => '2023-10-15 09:56:31', 'updated_at' => '2023-10-15 09:56:31'],
            ['id' => 5, 'name' => 'list drivers', 'guard_name' => 'web', 'module_id' => 1, 'created_at' => '2023-10-15 09:56:31', 'updated_at' => '2023-10-15 09:56:31'],
            ['id' => 6, 'name' => 'list vehicles', 'guard_name' => 'web', 'module_id' => 1, 'created_at' => '2024-08-29 06:45:08', 'updated_at' => '2024-08-29 06:45:12'],
            ['id' => 7, 'name' => 'list routes', 'guard_name' => 'web', 'module_id' => 1, 'created_at' => '2024-08-29 06:45:08', 'updated_at' => '2024-08-29 06:45:12'],
            ['id' => 8, 'name' => 'list messages', 'guard_name' => 'web', 'module_id' => 1, 'created_at' => '2024-08-29 06:45:08', 'updated_at' => '2024-08-29 06:45:12'],
            ['id' => 9, 'name' => 'list settings', 'guard_name' => 'web', 'module_id' => 1, 'created_at' => '2024-08-29 06:45:08', 'updated_at' => '2024-08-29 06:45:12'],
            ['id' => 10, 'name' => 'list website settings', 'guard_name' => 'web', 'module_id' => 1, 'created_at' => '2024-08-29 06:45:08', 'updated_at' => '2024-08-29 06:45:12'],
        ]);
    }
}
