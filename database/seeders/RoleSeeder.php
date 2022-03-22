<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'AM',
                'guard_name' => 'web'
            ],
            [
                'name' => 'DSO',
                'guard_name' => 'web'
            ],
            [
                'name' => 'MSO',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel SBU',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel SBS',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel SDA',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel KDR',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel JBR',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel PSN',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel MLG',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel MDR',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel MDN',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel DPS',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel SGR',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel KPG',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel MTR',
                'guard_name' => 'web'
            ],
            [
                'name' => 'RNO',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Sigma',
                'guard_name' => 'web'
            ],
            [
                'name' => 'superAdmin',
                'guard_name' => 'web'
            ]
        ];
        
        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
