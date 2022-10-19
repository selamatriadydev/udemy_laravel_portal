<?php

use App\Http\Controllers\Admin\AdminAdvertisementController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Front\FrontAboutController;
use App\Http\Controllers\Front\FrontHomeController;
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
// front 
Route::get('/', [FrontHomeController::class, 'index'])->name('home');
Route::get('/about', [FrontAboutController::class, 'index'])->name('about');
Route::get('/category', [FrontHomeController::class, 'category_view'])->name('category');
Route::get('/post/detail', [FrontHomeController::class, 'post_detail'])->name('post');

//admin
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('/admin/recover-password/{token}/{email}', [AdminLoginController::class, 'recover_password'])->name('admin_recover_password');
Route::post('/admin/recover-password-submit', [AdminLoginController::class, 'recover_password_submit'])->name('admin_recover_password_submit');

Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout')->middleware('admin:admin');
Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home')->middleware('admin:admin');

//admin > Profile
Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin_profile')->middleware('admin:admin');
Route::post('/admin/profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit')->middleware('admin:admin');

//admin > Advertisement
Route::get('/admin/advertisement', [AdminAdvertisementController::class, 'index'])->name('admin_ad')->middleware('admin:admin');
Route::get('/admin/advertisement/home-top', [AdminAdvertisementController::class, 'home_ad_show_top'])->name('admin_home_ad')->middleware('admin:admin');
Route::post('/admin/advertisement/home/update-top', [AdminAdvertisementController::class, 'home_ad_top_update'])->name('admin_home_ad_top_update')->middleware('admin:admin');
Route::get('/admin/advertisement/home-bottom', [AdminAdvertisementController::class, 'home_ad_show_bottom'])->name('admin_home_ad_bottom')->middleware('admin:admin');
Route::post('/admin/advertisement/home/update-bottom', [AdminAdvertisementController::class, 'home_ad_bottom_update'])->name('admin_home_ad_bottom_update')->middleware('admin:admin');
Route::get('/admin/advertisement/header', [AdminAdvertisementController::class, 'home_ad_show_header'])->name('admin_home_ad_header')->middleware('admin:admin');
Route::post('/admin/advertisement/update-header', [AdminAdvertisementController::class, 'home_ad_header_update'])->name('admin_home_ad_header_update')->middleware('admin:admin');
Route::get('/admin/advertisement/sidebar', [AdminAdvertisementController::class, 'home_ad_show_sidebar'])->name('admin_home_ad_sidebar')->middleware('admin:admin');
Route::post('/admin/advertisement/update-sidebar', [AdminAdvertisementController::class, 'home_ad_sidebar_update'])->name('admin_home_ad_sidebar_update')->middleware('admin:admin');

//admin > Category
Route::get('/admin/category', [AdminCategoryController::class, 'index'])->name('admin_category')->middleware('admin:admin');
Route::get('/admin/category/add', [AdminCategoryController::class, 'create'])->name('admin_category_add')->middleware('admin:admin');
Route::post('/admin/category/add-submit', [AdminCategoryController::class, 'create_submit'])->name('admin_category_add_submit')->middleware('admin:admin');
Route::get('/admin/category/{id}/edit', [AdminCategoryController::class, 'edit'])->name('admin_category_edit')->middleware('admin:admin');
Route::post('/admin/category/{id}/edit-submit', [AdminCategoryController::class, 'edit_submit'])->name('admin_category_edit_submit')->middleware('admin:admin');
Route::get('/admin/category/{id}/delete', [AdminCategoryController::class, 'delete'])->name('admin_category_delete')->middleware('admin:admin');

//admin >Sub Category
Route::get('/admin/sub-category', [AdminSubCategoryController::class, 'index'])->name('admin_sub_category')->middleware('admin:admin');
Route::get('/admin/sub-category/add', [AdminSubCategoryController::class, 'create'])->name('admin_sub_category_add')->middleware('admin:admin');
Route::post('/admin/sub-category/add-submit', [AdminSubCategoryController::class, 'create_submit'])->name('admin_sub_category_add_submit')->middleware('admin:admin');
Route::get('/admin/sub-category/{id}/edit', [AdminSubCategoryController::class, 'edit'])->name('admin_sub_category_edit')->middleware('admin:admin');
Route::post('/admin/sub-category/{id}/edit-submit', [AdminSubCategoryController::class, 'edit_submit'])->name('admin_sub_category_edit_submit')->middleware('admin:admin');
Route::get('/admin/sub-category/{id}/delete', [AdminSubCategoryController::class, 'delete'])->name('admin_sub_category_delete')->middleware('admin:admin');

//admin >Post
Route::get('/admin/post', [AdminPostController::class, 'index'])->name('admin_post')->middleware('admin:admin');
Route::get('/admin/post/add', [AdminPostController::class, 'create'])->name('admin_post_add')->middleware('admin:admin');
Route::post('/admin/post/add-submit', [AdminPostController::class, 'create_submit'])->name('admin_post_add_submit')->middleware('admin:admin');
Route::get('/admin/post/{id}/edit', [AdminPostController::class, 'edit'])->name('admin_post_edit')->middleware('admin:admin');
Route::post('/admin/post/{id}/edit-submit', [AdminPostController::class, 'edit_submit'])->name('admin_post_edit_submit')->middleware('admin:admin');
Route::get('/admin/post/{post_id}/tag/{tag_id}/delete', [AdminPostController::class, 'delete_tag'])->name('admin_post_delete_tag')->middleware('admin:admin');
Route::get('/admin/post/{id}/delete', [AdminPostController::class, 'delete'])->name('admin_post_delete')->middleware('admin:admin');