<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminRole = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'edit articles']);

        $user = User::find(1);
        if ($user) {
            $user->assignRole($adminRole);
            $user->givePermissionTo($permission);
        }
    }
}
