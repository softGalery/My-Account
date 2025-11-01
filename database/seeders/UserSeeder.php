<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create example permissions if not exist
        $permissionNames = ['view users', 'create users', 'edit users', 'delete users'];
        foreach ($permissionNames as $name) {
            Permission::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
        }

        // Create roles
        $role = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        // Assign all permissions to role
        $permissions = Permission::pluck('name')->all();
        $role->syncPermissions($permissions);

        // Create users
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@gmail.com'],
            ['name' => 'Super Admin', 'password' => Hash::make('password')]
        );

        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            ['name' => 'Admin', 'password' => Hash::make('password')]
        );

        // Assign roles
        $superAdmin->assignRole($role);
        $admin->assignRole($role);
    }
}
