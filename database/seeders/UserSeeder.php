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
        $am = User::create([
            'name' => 'Rama',
            'email' => 'ramahisyam1@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        $am->assignRole('backroom');

        $am = User::create([
            'name' => 'Hisyam',
            'email' => 'ramahisyam002@gmail.com',
            'password' => bcrypt('123456789'),
        ]);

        $am->assignRole('AM');
    }
}
