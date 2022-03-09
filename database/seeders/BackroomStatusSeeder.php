<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\BackroomStatus;

class BackroomStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($j=0; $j <2 ; $j++) { 
            for ($i=1; $i <=5 ; $i++) { 
                BackroomStatus::create([
                    'customer_request_id' => $i,
                    'backroom_id' => $faker->numberBetween(1,18),
                    'name' => 'Waiting to Process',
                ]);
            }
        }
    }
}
