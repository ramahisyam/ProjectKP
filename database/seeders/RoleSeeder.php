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
                'name' => 'Witel 1',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel 2',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel 3',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel 4',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel 5',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel 6',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel 7',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel 8',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel 9',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel 10',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel 11',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel 12',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Witel 13',
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
                'name' => 'DSS',
                'guard_name' => 'web'
            ]
        ];
        
        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
