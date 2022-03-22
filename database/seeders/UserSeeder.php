<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $mso = User::create([
            'name' => 'MSO',
            'email' => 'mso.telkom@telkom.co.id',
            'phoneNumber' => '08' . strval($faker->numerify('##########')),
            'password' => bcrypt('123456789'),
        ]);

        $mso->assignRole('MSO');
        $mso->givePermissionTo('backroom');

        $witel2 = User::create([
            'name' => 'Witel SBS',
            'email' => 'witel.sbs@telkom.co.id',
            'phoneNumber' => '08' . strval($faker->numerify('##########')),
            'password' => bcrypt('123456789'),
        ]);

        $witel2->assignRole('Witel SBS');
        $witel2->givePermissionTo('backroom');

        $am = User::create([
            'name' => 'Account Manager',
            'email' => 'am.telkom@telkom.co.id',
            'phoneNumber' => '08' . strval($faker->numerify('##########')),
            'password' => bcrypt('123456789'),
        ]);

        $am->assignRole('AM');
        $am->givePermissionTo('accountManager');
        // $am->givePermissionTo('customer');

        $superAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin.telkom@telkom.co.id',
            'phoneNumber' => '08' . strval($faker->numerify('##########')),
            'password' => bcrypt('123456789'),
        ]);
        $superAdmin->assignRole('superAdmin');
    }
}
