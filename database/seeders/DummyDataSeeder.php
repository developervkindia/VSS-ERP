<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use App\Models\LeaveRequest;
use App\Models\PayrollDetail;
use App\Models\PerformanceEvaluation;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
          // Create a super admin user
        $admin = User::updateOrCreate(
          ['email' => 'admin@vsserp.com'],
           [
            'name' => 'Super Admin',
            'password' => Hash::make('password'),
            'phone' => '1234567890',
             'is_active' => true,
           ]
        );
        $adminRole = Role::updateOrCreate(['name' => 'super-admin']);
         $allPermissions = Permission::all();
         $adminRole->syncPermissions($allPermissions);
         $admin->assignRole($adminRole);


        $department = Department::updateOrCreate(
            ['name' => 'Technology'],
             [
              'description' => 'Responsible for IT and technology aspects of company.',
            ]
        );


         $employee = Employee::updateOrCreate(
           ['user_id' => $admin->id],
             [
               'job_title' => 'Super Admin',
               'hire_date' => now(),
                'department_id' => $department->id,
               'is_active' => true,
           ]
         );


          Address::updateOrCreate(
              ['user_id' => $employee->id],
               [
                 'street_address' => '123 Main St',
                  'city' => 'Anytown',
                  'state' => 'CA',
                  'postal_code' => '12345',
                 'country' => 'USA',
             ]
          );


        // Create Users with roles
        $hrRole = Role::updateOrCreate(['name' => 'hr']);
        $managerRole = Role::updateOrCreate(['name' => 'manager']);
        $employeeRole = Role::updateOrCreate(['name' => 'employee']);



         User::factory(10)->create()->each(function ($user) use ($hrRole, $managerRole, $employeeRole) {
           $employee = Employee::factory()->create([
                'user_id' => $user->id,
                'department_id' => Department::all()->random()->id,
             ]);
            Address::updateOrCreate(
                  ['user_id' => $employee->id],
                   [
                      'street_address' => '123 Main St',
                       'city' => 'Anytown',
                      'state' => 'CA',
                       'postal_code' => '12345',
                       'country' => 'USA',
                   ]
                );
             $randomRole =  collect([$hrRole, $managerRole, $employeeRole])->random();
             $user->assignRole($randomRole);
         });



        Department::factory(5)->create();

         $users = User::all();
         Project::factory(20)->create()->each(function ($project) use ($users) {
            $project->user_id = $users->random()->id;
            $project->save();
        });


         $projects = Project::all();
        Task::factory(50)->create()->each(function ($task) use ($projects, $users) {
            $task->project_id = $projects->random()->id;
             $task->assigned_to = $users->random()->id;
            $task->save();
        });


        PerformanceEvaluation::factory(30)->create()->each(function ($evaluation) use ($users) {
              $evaluation->user_id = $users->random()->id;
             $evaluation->save();
        });

        LeaveRequest::factory(40)->create()->each(function ($leaveRequest) use ($users) {
             $leaveRequest->user_id = $users->random()->id;
              if(rand(0,1) === 1) {
                $leaveRequest->approved_by = $users->random()->id;
              }
              $leaveRequest->save();
         });

         PayrollDetail::factory(50)->create()->each(function ($payrollDetail) use ($users) {
               $payrollDetail->user_id = $users->random()->id;
                $payrollDetail->save();
        });


         $permissions = [
           'view-users',
           'create-users',
            'edit-users',
             'delete-users',
             'view-roles',
              'create-roles',
            'edit-roles',
            'delete-roles',
             'view-permissions',
             'create-permissions',
              'edit-permissions',
            'delete-permissions',
              'view-projects',
            'create-projects',
            'edit-projects',
            'delete-projects',
             'view-tasks',
            'create-tasks',
             'edit-tasks',
            'delete-tasks',
             'view-departments',
             'create-departments',
             'edit-departments',
            'delete-departments',
            'view-performance-evaluations',
            'create-performance-evaluations',
            'edit-performance-evaluations',
           'delete-performance-evaluations',
            'view-leave-requests',
             'create-leave-requests',
            'edit-leave-requests',
            'delete-leave-requests',
             'view-payroll-details',
             'create-payroll-details',
             'edit-payroll-details',
            'delete-payroll-details'
        ];

         foreach ($permissions as $permission) {
             Permission::updateOrCreate(['name' => $permission]);
        }

          $superAdminRole = Role::where('name', 'super-admin')->first();
         $allPermissions = Permission::all();
         $superAdminRole->syncPermissions($allPermissions);


          $hrPermissions = [
               'view-users',
                 'edit-users',
               'view-departments',
               'view-performance-evaluations',
              'create-performance-evaluations',
               'edit-performance-evaluations',
                'delete-performance-evaluations',
                'view-leave-requests',
                'create-leave-requests',
              'edit-leave-requests',
                 'delete-leave-requests'
         ];
        $hrRole = Role::where('name', 'hr')->first();
       $hrPermissions = Permission::whereIn('name', $hrPermissions)->get();
       $hrRole->syncPermissions($hrPermissions);

       $managerPermissions = [
            'view-projects',
            'create-projects',
            'edit-projects',
            'delete-projects',
             'view-tasks',
             'create-tasks',
             'edit-tasks',
            'delete-tasks',
           'view-leave-requests'
       ];

        $managerRole = Role::where('name', 'manager')->first();
       $managerPermissions = Permission::whereIn('name', $managerPermissions)->get();
        $managerRole->syncPermissions($managerPermissions);

       $employeePermissions = [
              'view-tasks',
               'create-leave-requests',
                 'view-leave-requests',
        ];

        $employeeRole = Role::where('name', 'employee')->first();
       $employeePermissions = Permission::whereIn('name', $employeePermissions)->get();
        $employeeRole->syncPermissions($employeePermissions);
    }
}
