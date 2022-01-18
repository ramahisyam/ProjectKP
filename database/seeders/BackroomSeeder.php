<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BackroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $backrooms = [
            [
                'name' => 'Lorem',
                'status' => 'Ready',
                'information' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                Veritatis esse, quas dolore necessitatibus odit laudantium praesentium dolor quo corrupti quod, 
                tempore, quia at nam quis excepturi atque ab quasi nostrum.'
            ],
            [
                'name' => 'Lorem',
                'status' => 'Not Ready',
                'information' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
                Veritatis esse, quas dolore necessitatibus odit laudantium praesentium dolor quo corrupti quod, 
                tempore, quia at nam quis excepturi atque ab quasi nostrum.'
            ]

        ];
        foreach ($backrooms as $backroom) {
            DB::table('d_s_o_s')->insert($backroom);
            DB::table('m_s_o_s')->insert($backroom);
            DB::table('witel1s')->insert($backroom);
            DB::table('witel2s')->insert($backroom);
            DB::table('witel3s')->insert($backroom);
            DB::table('witel4s')->insert($backroom);
            DB::table('witel5s')->insert($backroom);
            DB::table('witel6s')->insert($backroom);
            DB::table('witel7s')->insert($backroom);
            DB::table('witel8s')->insert($backroom);
            DB::table('witel9s')->insert($backroom);
            DB::table('witel10s')->insert($backroom);
            DB::table('witel11s')->insert($backroom);
            DB::table('witel12s')->insert($backroom);
            DB::table('witel13s')->insert($backroom);
            DB::table('r_n_o_s')->insert($backroom);
            DB::table('sigmas')->insert($backroom);
            DB::table('d_s_s')->insert($backroom);
        }
    }
}
