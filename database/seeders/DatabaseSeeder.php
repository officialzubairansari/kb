<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            AuthorsTableSeeder::class,
            BlogsTableSeeder::class,
            BlogCategoriesTableSeeder::class,
            CompaniesTableSeeder::class,
            CountriesTableSeeder::class,
            FaqsTableSeeder::class,
            HighlightsTableSeeder::class,
            PagesTableSeeder::class,
            PageSectionsTableSeeder::class,
            SectionsTableSeeder::class,
            SettingsTableSeeder::class,
            SlidersTableSeeder::class,
            TestimonialsTableSeeder::class,
            UsersTableSeeder::class,
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            ModelHasRolesSeeder::class,
            RoleHasPermissionsTableSeeder::class,
        ]);
    }
}
