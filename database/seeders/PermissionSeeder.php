<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'input customer request',
                'guard_name' => 'web'
            ],
            [
                'name' => 'backroom',
                'guard_name' => 'web'
            ],
            [
                'name' => 'customer',
                'guard_name' => 'web'
            ]
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
