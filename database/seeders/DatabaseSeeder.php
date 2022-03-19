<?php

namespace Database\Seeders;

use App\Models\BackroomStatus;
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
            ServiceSeeder::class,
            BackroomServiceSeeder::class,
            CustomerRequestSeeder::class,
            BackroomStatusSeeder::class,
            CustomerSeeder::class
        ]);
    }
}
