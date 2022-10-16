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

Route::get('/', [AdminLoginController::class, 'index']);

//admin
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('/admin/recover-password/{token}/{email}', [AdminLoginController::class, 'recover_password'])->name('admin_recover_password');
Route::post('/admin/recover-password-submit', [AdminLoginController::class, 'recover_password_submit'])->name('admin_recover_password_submit');

Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout')->middleware('admin:admin');
Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home')->middleware('admin:admin');