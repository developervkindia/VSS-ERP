<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProjectController;


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::impersonate();
Route::resource('users', UserController::class);

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('auth')->group(function () {
    Route::group(['middleware' => ['role:Admin']], function () {
        // dd('Admin');

        Route::resource('projects', ProjectController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
    });
    Route::group(['middleware' => ['role:HR']], function () {
        // dd('HR');
        Route::resource('users', UserController::class);
    });
    Route::group(['middleware' => ['role:Manager']], function () {
        Route::resource('projects', ProjectController::class);
        Route::resource('users', UserController::class);
    });
    Route::group(['middleware' => ['role:Employee']], function () {
        Route::resource('projects', ProjectController::class);
    });
    // Route::resource('projects', ProjectController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';



Route::get('/debug-auth', function () {
    logger(Auth::user());
    return Auth::user();
});
