<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BackroomServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $backroomServices = [
            //Astinet
            [
                'service_id' => 1,
                'backroom_id' => 2,
                'customer_request_id' => 3
            ],
            [
                'service_id' => 1,
                'backroom_id' => 5,
                'customer_request_id' => 3
            ],
            [
                'service_id' => 1,
                'backroom_id' => 8,
                'customer_request_id' => 3
            ],
            [
                'service_id' => 1,
                'backroom_id' => 12,
                'customer_request_id' => 3
            ],
            [
                'service_id' => 1,
                'backroom_id' => 17,
                'customer_request_id' => 3
            ],
            //NeucentrIX
            [
                'service_id' => 2,
                'backroom_id' => 4,
                'customer_request_id' => 1
            ],
            [
                'service_id' => 2,
                'backroom_id' => 7,
                'customer_request_id' => 1
            ],
            [
                'service_id' => 2,
                'backroom_id' => 10,
                'customer_request_id' => 1
            ],
            [
                'service_id' => 2,
                'backroom_id' => 13,
                'customer_request_id' => 1
            ],
            [
                'service_id' => 2,
                'backroom_id' => 15,
                'customer_request_id' => 1
            ],
        ];

        foreach ($backroomServices as $backroomService) {
            DB::table('backroom_service')->insert($backroomService);
        }
    }
}
