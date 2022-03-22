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
            ['name' => 'Witel SBU'],
            ['name' => 'Witel SBS'],
            ['name' => 'Witel SDA'],
            ['name' => 'Witel KDR'],
            ['name' => 'Witel JBR'],
            ['name' => 'Witel PSN'],
            ['name' => 'Witel MLG'],
            ['name' => 'Witel MDR'],
            ['name' => 'Witel MDN'],
            ['name' => 'Witel DPS'],
            ['name' => 'Witel SGR'],
            ['name' => 'Witel KPG'],
            ['name' => 'Witel MTR'],
            ['name' => 'RNO'],
            ['name' => 'Sigma'],
        ]);
    }
}
