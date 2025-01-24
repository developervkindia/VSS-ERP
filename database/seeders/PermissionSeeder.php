<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'manage-projects',
            'view-projects',
            'edit-projects'
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(['name' => $permission]);
        }

        // Assign permissions to roles
        $superAdmin = Role::findByName('Super Admin');
        $admin = Role::findByName('Admin');
        $hr = Role::findByName('HR');
        $employee = Role::findByName('Employee');

        $superAdmin->givePermissionTo(Permission::all());
        $admin->givePermissionTo('manage-projects');
        $hr->givePermissionTo('view-projects');
        $employee->givePermissionTo('edit-projects');
    }
}
