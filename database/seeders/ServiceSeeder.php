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
            [
                'name' => 'Astinet',
                'witel1_id' => 2,
                'mso_id' => 1,
                'sigma_id' => 1
            ],
            [
                'name' => 'NeucentrIX',
                'witel10_id' => 1,
                'rno_id' => 2,
                'dss_id' => 1
            ]

        ];

        foreach ($services as $service) {
            DB::table('services')->insert($service);
        }
    }
}
