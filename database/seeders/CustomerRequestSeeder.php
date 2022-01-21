<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomerRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customerRequests = [
            [
                'name' => 'Rama Hisyam',
                'phoneNumber' => '083808380838',
                'latitude' => '104.087245',
                'longitude' => '-44.387412',
                'address' => 'Jl. Kenjeran',
                'service_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'Hisyam Alchoiri',
                'phoneNumber' => '083808420838',
                'latitude' => '104.089485',
                'longitude' => '34.387412',
                'address' => 'Jl. Suramadu',
                'service_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        foreach ($customerRequests as $customerRequest) {
            DB::table('customer_requests')->insert($customerRequest);
        }
    }
}
