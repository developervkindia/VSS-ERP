<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JobPositionController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\NotificationController;
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
})->name('home');


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
Route::resource('jobs', JobPositionController::class);
  //Add on Web
  Route::get('job-openings',[JobPositionController::class, 'jobOpenings'])->name('job_openings_page'); //front list route for job-openings using method

  //route specific job using slug if selected by users... this action controller has type hinted value for Model record from available entry based on database id look up... using slug.
  Route::get('job-openings/{job:slug}',[JobPositionController::class, 'jobDetails'])->name('job_details_page');
  // added Job:slug mapping and if exists or throws 404 , as well correct single record retrieval on controllers. (can also perform using ID on url also )
   //added above routes (front facing URLs and other application data) from standard routes related resources management of Admin controllers with `/jobs`. If all goes well, your application can start serving requests without conflicting on URLs, on different parts or functionality..
   Route::get('/job-apply/{job:slug}', [JobPositionController::class, 'showApplicationForm'])->name('job.apply.form');
   Route::post('/job-apply/{job:slug}', [JobPositionController::class, 'submitApplication'])->name('job.apply.submit');
//    Route::middleware(['auth', 'role:hr'])->group(function () { // Use appropriate middleware for HR access
    Route::get('/candidates', [CandidateController::class, 'index'])->name('candidates.index');
    Route::post('/candidates/{candidate}/update-status', [CandidateController::class, 'updateStatus'])->name('candidates.updateStatus');
    Route::post('/candidates/{candidate}/add-note', [CandidateController::class, 'addNote'])->name('candidates.addNote');
    Route::post('/candidates/{candidate}/update-rating', [CandidateController::class, 'updateRating'])->name('candidates.updateRating');
// });
Route::post('/notifications/{notification}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
Route::get('/notifications/clear-all', [NotificationController::class, 'clearAll'])->name('notifications.clearAll');
