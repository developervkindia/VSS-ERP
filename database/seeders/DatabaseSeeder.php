<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        // Create 20 users
        $users = User::factory(20)->create();

        // Assign roles
        $users[0]->assignRole('Super Admin');
        $users[1]->assignRole('Admin');
        $users[2]->assignRole('HR');

        // Assign 'Employee' role to the remaining users
        for ($i = 3; $i < count($users); $i++) {
            $users[$i]->assignRole('Employee');
        }


    }
}
