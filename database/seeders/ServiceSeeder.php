<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            ['name' => 'Astinet'],
            ['name' => 'neuCentrIX']

        ];

        foreach ($services as $service) {
            DB::table('services')->insert($service);
        }
    }
}
