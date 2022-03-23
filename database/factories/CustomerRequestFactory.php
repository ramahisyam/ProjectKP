<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use Carbon\Carbon;

class CustomerRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('id_ID');
        return [
            'business_key' => 'OLO/' . random_int(100000, 999999),
            'name' => $faker->company,
            'phoneNumber' => '08' . strval($faker->numerify('##########')),
            'latlong' => strval($faker->numberBetween(0,99)) . '.' . strval($faker->randomNumber() . ', ' 
            . $faker->numberBetween(0,99)) . '.' . strval($faker->randomNumber()),
            'address' => $faker->address,
            'capacity' => strval($faker->numberBetween(0,999)) . ' Mbps',
            'service_id' => $faker->numberBetween(1,2),
            'user_id' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];
    }
}
