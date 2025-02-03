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
            // User permissions
            'show-users',       // show a single user
            'create-users',     // Create new users
            'update-users',     // Update existing users
            'destroy-users',    // Delete users

            // Project permissions
            'show-projects',    // show a single project
            'create-projects',  // Create new projects
            'update-projects',  // Update existing projects
            'destroy-projects', // Delete projects
        ];


        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission]);
        }

        // Create roles and assign permissions
        $admin = Role::updateOrCreate(['name' => 'Admin']);
        $admin->givePermissionTo(Permission::all()); // All permissions

        $hr = Role::updateOrCreate(['name' => 'HR']);
        $hr->givePermissionTo([
            'show-users', 'create-users', 'update-users', 'destroy-users'
        ]); // Full user management permissions

        $manager = Role::updateOrCreate(['name' => 'Manager']);
        $manager->givePermissionTo([
            'show-users',
            'show-projects', 'create-projects', 'update-projects', 'destroy-projects'
        ]); // Full project management, limited user access

        $employee = Role::updateOrCreate(['name' => 'Employee']);
        $employee->givePermissionTo(['show-projects']); // View projects access

        // Create users and assign roles
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@vss.com',
            'phone' => '1234567891',
            'password' => bcrypt('password'), // Default password
        ])->assignRole($admin);

        User::factory()->create([
            'name' => 'HR User',
            'email' => 'hr@vss.com',
            'phone' => '1234567892',
            'password' => bcrypt('password'), // Default password
        ])->assignRole($hr);

        User::factory()->create([
            'name' => 'Manager User',
            'email' => 'manager@vss.com',
            'phone' => '1234567893',
            'password' => bcrypt('password'), // Default password
        ])->assignRole($manager);

        User::factory()->create([
            'name' => 'Employee User',
            'email' => 'employee@vss.com',
            'phone' => '1234567894',
            'password' => bcrypt('password'), // Default password
        ])->assignRole($employee);

    }
}
