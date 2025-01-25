<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'view users',
            'manage users',
            'view projects',
            'manage projects',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $admin = Role::create(['name' => 'Admin']);
        $admin->givePermissionTo(Permission::all()); // All permissions

        $hr = Role::create(['name' => 'HR']);
        $hr->givePermissionTo(['view users', 'manage users']); // Permissions related to users

        $manager = Role::create(['name' => 'Manager']);
        $manager->givePermissionTo(['view users', 'view projects', 'manage projects']); // Full projects access, view users

        $employee = Role::create(['name' => 'Employee']);
        $employee->givePermissionTo(['view projects']); // Only view projects

        // Create users and assign roles
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@vss.com',
            'password' => bcrypt('password'), // Default password
        ])->assignRole($admin);

        User::factory()->create([
            'name' => 'HR User',
            'email' => 'hr@vss.com',
            'password' => bcrypt('password'), // Default password
        ])->assignRole($hr);

        User::factory()->create([
            'name' => 'Manager User',
            'email' => 'manager@vss.com',
            'password' => bcrypt('password'), // Default password
        ])->assignRole($manager);

        User::factory()->create([
            'name' => 'Employee User',
            'email' => 'employee@vss.com',
            'password' => bcrypt('password'), // Default password
        ])->assignRole($employee);

    }
}

