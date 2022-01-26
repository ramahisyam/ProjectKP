<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\CustomerRequest;
use App\Models\BackroomStatus;
use Faker\Factory as Faker;

class CustomerRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i <11 ; $i++) { 
            $customerRequest = CustomerRequest::create([
                'name' => $faker->name,
                'phoneNumber' => '08' . strval($faker->numerify('##########')),
                'latitude' => strval($faker->numberBetween(0,99)) . '.' . strval($faker->randomNumber()),
                'longitude' => strval($faker->numberBetween(0,99)) . '.' . strval($faker->randomNumber()),
                'address' => $faker->address,
                'service_id' => $faker->numberBetween(1,2),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
    
            $customers = $customerRequest->service->backrooms;
    
            foreach ($customers as $customer) {
                BackroomStatus::create([
                    'customer_request_id' => $customerRequest->id,
                    'backroom_id' => $customer->id,
                    'status' => 'Waiting to Process',
                    'information' => 'No info'
                ]);
            }
        }
    }
}
