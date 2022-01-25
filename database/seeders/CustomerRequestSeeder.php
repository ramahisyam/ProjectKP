<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\CustomerRequest;
use App\Models\Service;
use App\Models\BackroomStatus;

class CustomerRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customerRequest = CustomerRequest::create([
            'name' => 'Rama',
            'phoneNumber' => '083808380225',
            'latitude' => '34.246425',
            'longitude' => '-24.365335',
            'address' => 'Jl. Kenjeran',
            'service_id' => 2
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
