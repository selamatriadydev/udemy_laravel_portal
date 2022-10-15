<?php

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

Route::get('/dashboard_user', [websiteController::class, 'dashboard_user'])->name('dashboard_user')->middleware('auth');

Route::get('/dashboard_admin', [websiteController::class, 'dashboard_admin'])->name('dashboard_admin')->middleware('admin');

Route::get('/settings', [websiteController::class, 'settings'])->name('settings')->middleware('admin');

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
