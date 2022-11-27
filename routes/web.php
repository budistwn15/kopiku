<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Back\Permissions\AssignPermissionController;
use App\Http\Controllers\Back\Permissions\PermissionController;
use App\Http\Controllers\Back\Permissions\RoleController;
use App\Http\Controllers\Back\UserController as BackUserController;
use App\Http\Controllers\Front\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentication
Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/register',[RegisterController::class,'showRegistrationForm'])->name('register');
Route::post('/register',[RegisterController::class,'register']);

// Socialite
Route::get('sign-in-google',[UserController::class,'google'])->name('user.login');
Route::get('auth/google/callback',[UserController::class,'handleProviderCallback'])
->name('user.google.callback');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::prefix('kopimin')->group(function(){
   Route::get('/dashboard', function(){
        return view('back.dashboard');
   });

   // Users
   Route::resource('users', BackUserController::class)
   ->only('index','create','store','destroy');

   //roles
   Route::prefix('role-and-permission')->group(function(){
        Route::prefix('roles')->group(function(){
            Route::get('/', [RoleController::class, 'index'])->name('roles.index');
            Route::post('/', [RoleController::class, 'store'])->name('roles.store');
            Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
            Route::put('/{role}/update', [RoleController::class, 'update'])->name('roles.update');
            Route::delete('/{role}/delete', [RoleController::class, 'destroy'])->name('roles.destroy');
        });
        Route::prefix('permissions')->group(function(){
            Route::get('/', [PermissionController::class, 'index'])->name('permissions.index');
            Route::post('/', [PermissionController::class, 'store'])->name('permissions.store');
            Route::get('/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
            Route::put('/{permission}/update', [PermissionController::class, 'update'])->name('permissions.update');
            Route::delete('/{permission}/delete', [PermissionController::class, 'destroy'])->name('permissions.destroy');
        });
        Route::prefix('assign-permissions')->group(function(){
            Route::get('/', [AssignPermissionController::class, 'index'])->name('assign-permissions.index');
        });
   });

})->middleware('has.role');
