<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\PayrollDetailController;
use App\Http\Controllers\PerformanceEvaluationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProjectController;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\PerformanceEvaluation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::impersonate();
Route::resource('users', UserController::class);

Route::get('/', function () {
    return view('welcome');
});


// Route::middleware('auth')->group(function () {
//     Route::group(['middleware' => ['role:Admin']], function () {
//         // dd('Admin');

//         Route::resource('projects', ProjectController::class);
//         Route::resource('roles', RoleController::class);
//         Route::resource('permissions', PermissionController::class);
//     });
//     Route::group(['middleware' => ['role:HR']], function () {
//         // dd('HR');
//         Route::resource('users', UserController::class);
//     });
//     Route::group(['middleware' => ['role:Manager']], function () {
//         Route::resource('projects', ProjectController::class);
//         Route::resource('users', UserController::class);
//     });
//     Route::group(['middleware' => ['role:Employee']], function () {
//         Route::resource('projects', ProjectController::class);
//     });
//     // Route::resource('projects', ProjectController::class);
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// });
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__ . '/auth.php';

Route::resource('projects', ProjectController::class);
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('users', UserController::class);
Route::resource('tasks', TaskController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('performance_evaluations', PerformanceEvaluationController::class);
Route::resource('leave_requests', LeaveRequestController::class);
Route::resource('payroll_details', PayrollDetailController::class);
Route::get('/payroll_details/export/excel', [PayrollDetailController::class, 'exportToExcel'])->name('payroll_details.exportToExcel');
Route::get('/payroll_details/{payrollDetail}/export/pdf', [PayrollDetailController::class, 'exportToPdf'])->name('payroll_details.exportToPdf');
Route::get('/dashboard/admin', [DashboardController::class, 'adminDashboard'])->name('dashboard.admin');
Route::get('/dashboard/hr', [DashboardController::class, 'hrDashboard'])->name('dashboard.hr');
Route::get('/dashboard/manager', [DashboardController::class, 'managerDashboard'])->name('dashboard.manager');
Route::get('/dashboard/employee', [DashboardController::class, 'employeeDashboard'])->name('dashboard.employee');
