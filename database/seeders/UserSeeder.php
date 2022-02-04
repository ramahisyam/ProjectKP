<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mso = User::create([
            'name' => 'Rama',
            'email' => 'mso.telkom@telkom.co.id',
            'password' => bcrypt('123456789'),
        ]);

        $mso->assignRole('MSO');
        $mso->givePermissionTo('backroom');

        $witel2 = User::create([
            'name' => 'Rama Hisyam',
            'email' => 'witel2.telkom@telkom.co.id',
            'password' => bcrypt('123456789'),
        ]);

        $witel2->assignRole('Witel 2');
        $witel2->givePermissionTo('backroom');

        $am = User::create([
            'name' => 'Account Manager',
            'email' => 'am.telkom@telkom.co.id',
            'password' => bcrypt('123456789'),
        ]);

        $am->assignRole('AM');
        $am->givePermissionTo('input customer request');
        $am->givePermissionTo('customer');
    }
}
