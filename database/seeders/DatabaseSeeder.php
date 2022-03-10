<?php

namespace Database\Seeders;

use App\Models\CustomerRequest;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            BackroomSeeder::class,
            ServiceSeeder::class
            // CustomerRequestSeeder::class
            // BackroomServiceSeeder::class
        ]);
    }
}
