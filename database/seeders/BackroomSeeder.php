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

        DB::table('backrooms')->insert([
            ['name' => 'DSO'],
            ['name' => 'MSO'],
            ['name' => 'Witel 1'],
            ['name' => 'Witel 2'],
            ['name' => 'Witel 3'],
            ['name' => 'Witel 4'],
            ['name' => 'Witel 5'],
            ['name' => 'Witel 6'],
            ['name' => 'Witel 7'],
            ['name' => 'Witel 8'],
            ['name' => 'Witel 9'],
            ['name' => 'Witel 10'],
            ['name' => 'Witel 11'],
            ['name' => 'Witel 12'],
            ['name' => 'Witel 13'],
            ['name' => 'RNO'],
            ['name' => 'Sigma'],
        ]);
    }
}
