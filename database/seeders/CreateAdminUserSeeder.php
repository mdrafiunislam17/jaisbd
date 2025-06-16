<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    public function run()
    {
        $roleName = 'superadmin';

        // রোল তৈরি বা পাওয়া
        $role = Role::firstOrCreate(['name' => $roleName]);

        // প্রথম ইউজার
        $user = User::create([
            'name' => 'Alamgir Kabir Roni',
            'email' => 'rafiun@gmail.com',
            'password' => bcrypt('111Ron35177@'),
        ]);
        $user->assignRole($roleName);

        // দ্বিতীয় ইউজার
        $user2 = User::create([
            'name' => 'G.M. Zesan',
            'email' => 'zesan.bitscol7767@gmail.com',
            'password' => bcrypt('12345678aA'),
        ]);
        $user2->assignRole($roleName);

        // রোলকে সব পারমিশন অ্যাসাইন করা
        $permissions = Permission::all();
        $role->syncPermissions($permissions);
    }
}
