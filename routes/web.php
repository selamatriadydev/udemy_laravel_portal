<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\websiteController;
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

Route::get('/', [websiteController::class, 'index'])->name('home');

//user
Route::get('/dashboard', [websiteController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/register', [websiteController::class, 'register'])->name('register');
Route::post('/register_submit', [websiteController::class, 'register_submit'])->name('register_submit');
Route::get('/register/verify/{token}/{email}', [websiteController::class, 'register_verify'])->name('register_verify');


Route::get('/login', [websiteController::class, 'login'])->name('login');
Route::post('/login_submit', [websiteController::class, 'login_submit'])->name('login_submit');

Route::get('/forget_password', [websiteController::class, 'forget_password'])->name('forget_password');
Route::post('/forget_password_submit', [websiteController::class, 'forget_password_submit'])->name('forget_password_submit');
Route::get('/reset-password/{token}/{email}', [websiteController::class, 'reset_password'])->name('reset_password');
Route::post('/reset_password_submit', [websiteController::class, 'reset_password_submit'])->name('reset_password_submit');

Route::get('/logout', [websiteController::class, 'logout'])->name('logout');

//admin
// Route::get('/admin/login', [AdminController::class, 'login'])->name('admin_login');
// Route::post('/admin/login_submit', [AdminController::class, 'login_submit'])->name('admin_login_submit');
// Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard_admin')->middleware('admin:admin');

// Route::get('/admin/settings', [AdminController::class, 'settings'])->name('settings_admin')->middleware('admin:admin');
// Route::get('/admin/logout', [AdminController::class, 'logout'])->name('logout_admin');


// home 
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home');