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
            ],
            [
                'name' => 'PT XL Axiata Tbk',
                'phoneNumber' => '02157959817',
                'latitude' => '-6.232139760912662',
                'longitude' => '106.83177895479285',
                'address' => 'JL. H. R. Rasuna Said X5 Kav. 11-12 Kuningan Timur, Setiabudi, Jakarta Selatan 12950 - Indonesia',
                'service_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'PT Indosat Tbk',
                'phoneNumber' => '02130003000',
                'latitude' => '-7.316531046661041',
                'longitude' => '112.74862983068682',
                'address' => 'PLASA MARINA SURABAYA, HP - A3, Jl. Margorejo Indah No.97 - 99, Sidosermo, Kec. Wonocolo, Kota SBY, Jawa Timur 60237',
                'service_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'PT Centrin Online Prima',
                'phoneNumber' => '0315471025',
                'latitude' => '-7.273228095143528',
                'longitude' => '112.74285971534343',
                'address' => 'Jl. Panglima Sudirman No.101, Embong Kaliasin, Kec. Genteng, Kota SBY, Jawa Timur 60271',
                'service_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'PT MNC Kabel Mediacom',
                'phoneNumber' => '1500121',
                'latitude' => '-7.3560640717723675',
                'longitude' => '112.76704183663308',
                'address' => 'Ruko Fortune Business & Industrial Park A-17, Jl. Tambak Sawah No.10, Tambakrejo, Kec. Waru, Kabupaten Sidoarjo, Jawa Timur 61256',
                'service_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'PT EKA MAS REPUBLIK',
                'phoneNumber' => '1500818',
                'latitude' => '-7.321261611796309',
                'longitude' => '112.74482093516913',
                'address' => 'Jl. Raya Jemursari No.101A, Jemur Wonosari, Kec. Wonocolo, Kota SBY, Jawa Timur 60237',
                'service_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'PT Cemerlang Multimedia',
                'phoneNumber' => '02286017999',
                'latitude' => '-6.885705814529882',
                'longitude' => '107.595166',
                'address' => 'Jl. Karang Tinggal No.27, Cipedes, Kec. Sukajadi, Kota Bandung, Jawa Barat 40162',
                'service_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'PT Supra Primatama Nusantara',
                'phoneNumber' => '02157981788',
                'latitude' => '-7.367850653207801',
                'longitude' => '112.728638054049',
                'address' => 'Ruko Gateway, Jl. Raya Waru Blk. E No.21, Dusun Sawo, Sawotratap, Kec. Gedangan, Kabupaten Sidoarjo, Jawa Timur 61254',
                'service_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'PT Cyberindo Aditama',
                'phoneNumber' => '085233441234',
                'latitude' => '-7.2706488554222535',
                'longitude' => '112.744497',
                'address' => 'Ruko Embong Kemiri Square, Jl. Embong Cerme No.2G, Embong Kaliasin, Kec. Genteng, Kota SBY, Jawa Timur 60271',
                'service_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'PT Link Net Tbk',
                'phoneNumber' => '0312950777',
                'latitude' => '-7.270242601201227',
                'longitude' => '112.750987454961',
                'address' => 'Gedung Graha S.A Lantai 2, Jl Raya Gubeng no 19-21, Kel. Gubeng, Kec. Gubeng, Surabaya 60281 ',
                'service_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ];

        foreach ($customerRequests as $customerRequest) {
            DB::table('customer_requests')->insert($customerRequest);
        }
    }
}
