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
                'backroom_id' => 2
            ],
            [
                'service_id' => 1,
                'backroom_id' => 5
            ],
            [
                'service_id' => 1,
                'backroom_id' => 8
            ],
            [
                'service_id' => 1,
                'backroom_id' => 12
            ],
            [
                'service_id' => 1,
                'backroom_id' => 17
            ],
            //NeucentrIX
            [
                'service_id' => 2,
                'backroom_id' => 4
            ],
            [
                'service_id' => 2,
                'backroom_id' => 7
            ],
            [
                'service_id' => 2,
                'backroom_id' => 10
            ],
            [
                'service_id' => 2,
                'backroom_id' => 13
            ],
            [
                'service_id' => 2,
                'backroom_id' => 15
            ],
        ];

        foreach ($backroomServices as $backroomService) {
            DB::table('backroom_service')->insert($backroomService);
        }
    }
}
