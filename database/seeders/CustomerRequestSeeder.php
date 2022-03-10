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
        for ($i=1; $i <=5 ; $i++) { 
            $customerRequest = CustomerRequest::create([
                'business_key' => 'OLO/' . random_int(100000, 999999),
                'name' => $faker->name,
                'phoneNumber' => '08' . strval($faker->numerify('##########')),
                'latlong' => strval($faker->numberBetween(0,99)) . '.' . strval($faker->randomNumber() . ', ' 
                . $faker->numberBetween(0,99)) . '.' . strval($faker->randomNumber()),
                'address' => $faker->address,
                'bandwidth' => strval($faker->numberBetween(0,999)) . ' GB',
                'service_id' => $faker->numberBetween(1,2),
                'user_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);

            $customers = $customerRequest->service->backrooms;
    
            foreach ($customers as $customer) {
                BackroomStatus::create([
                    'customer_request_id' => $customerRequest->id,
                    'backroom_id' => $customer->id,
                    'name' => 'Waiting to Process',
                ]);
            }
        }
    }
}
