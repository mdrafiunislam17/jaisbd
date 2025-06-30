<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'slider-list',
            'slider-create',
            'slider-edit',
            'slider-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'assign-role-list',
            'assign-role-create',
            'assign-role-edit',
            'assign-role-delete',

            'tour-categorics-list',
            'tour-categorics-create',
            'tour-categorics-edit',
            'tour-categorics-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission],
                ['guard_name' => 'web']
            );
        }
    }
}
