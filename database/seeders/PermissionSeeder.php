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


            'tour-list',
            'tour-create',
            'tour-edit',
            'tour-delete',


            'visa-categories-list',
            'visa-categories-create',
            'visa-categories-edit',
            'visa-categories-delete',


            'visa-list',
            'visa-create',
            'visa-edit',
            'visa-delete',

            'study-abroad-categories-list',
            'study-abroad-categories-create',
            'study-abroad-categories-edit',
            'study-abroad-categories-delete',


            'study-abroad-list',
            'study-abroad-create',
            'study-abroad-edit',
            'study-abroad-delete',


            'consultancy-medicine-categories-list',
            'consultancy-medicine-categories-create',
            'consultancy-medicine-categories-edit',
            'consultancy-medicine-categories-delete',

            'consultancy-medicine-list',
            'consultancy-medicine-create',
            'consultancy-medicine-edit',
            'consultancy-medicine-delete',


            'about-list',
            'about-create',
            'about-edit',
            'about-delete',


            'management-list',
            'management-create',
            'management-edit',
            'management-delete',

            'designation-list',
            'designation-create',
            'designation-edit',
            'designation-delete',

            'team-member-list',
            'team-member-create',
            'team-member-edit',
            'team-member-delete',

            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',

            'contact-list',
            'contact-create',
            'contact-edit',
            'contact-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission],
                ['guard_name' => 'web']
            );
        }
    }
}
