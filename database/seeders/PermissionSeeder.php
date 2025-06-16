<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'project-categories-list',
            'project-categories-create',
            'project-categories-edit',
            'project-categories-delete',
            'project-list',
            'project-create',
            'project-edit',
            'project-delete',
            'work-process-list',
            'work-process-create',
            'work-process-edit',
            'work-process-delete',
            'project-info-list',
            'project-info-create',
            'project-info-edit',
            'project-info-delete',
            'team-member-list',
            'team-member-create',
            'team-member-edit',
            'team-member-delete',
            'slider-list',
            'slider-create',
            'slider-edit',
            'slider-delete',
            'service-list',
            'service-create',
            'service-edit',
            'service-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'management-list',
            'management-create',
            'management-edit',
            'management-delete',
            'event-list',
            'event-create',
            'event-edit',
            'event-delete',
            'designation-list',
            'designation-create',
            'designation-edit',
            'designation-delete',
            'client-list',
            'client-create',
            'client-edit',
            'client-delete',
            'career-list',
            'career-create',
            'career-edit',
            'career-delete',
            'career-application-list',
            'career-application-create',
            'career-application-edit',
            'career-application-delete',
            'blog-list',
            'blog-create',
            'blog-edit',
            'blog-delete',
            'assign-role-list',
            'assign-role-create',
            'assign-role-edit',
            'assign-role-delete',
            'achievement-list',
            'achievement-create',
            'achievement-edit',
            'achievement-delete',
            'about-list',
            'about-create',
            'about-edit',
            'about-delete',

        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(
                ['name' => $permission],
                ['guard_name' => 'web', 'display_name' => ucwords(str_replace('-', ' ', $permission))]
            );
        }
    }
}
