<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
        PermissionSeeder::class,

         CreateAdminUserSeeder::class,
         RoleSeeder::class,
    ]);

    // $adminRole = Role::create(['name' => 'admin']);
    // $customerRole = Role::create(['name' => 'customer']);

    // $user = User::find(1);
    // $user->assignRole('admin');

    // Permission::create(['name' => 'edit posts']);
    // Permission::create(['name' => 'delete users']);

    // $role = Role::findByName('admin');
    // $role->givePermissionTo(['edit posts', 'delete users']);

    }
}
