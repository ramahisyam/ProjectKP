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
            //NeucentrIX
            [
                'service_id' => 2,
                'backroom_id' => 17
            ],
        ];

        foreach ($backroomServices as $backroomService) {
            DB::table('backroom_service')->insert($backroomService);
        }
    }
}
