<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ListMemberJsonController;
use App\Http\Controllers\Admin\ManageMemberController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Auth::routes();

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout.store');



Route::middleware(['auth', 'user-access:user'])->group(function () {
    // Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::group(['prefix' => '/user', 'as' => 'user.'], function () {
        Route::get('dashboard', [DashboardController::class, 'dashUser'])->name('dashboard');
        Route::resource('manage-member', ManageMemberController::class);
        Route::get('list-member', [ListMemberJsonController::class, 'index'])->name('list.member');
    });
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
    // Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
        Route::get('dashboard', [DashboardController::class, 'dashAdmin'])->name('dashboard');
        Route::resource('manage-member', ManageMemberController::class);
        Route::get('list-member', [ListMemberJsonController::class, 'index'])->name('list.member');
    });
});
