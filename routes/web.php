<?php

use App\Http\Controllers\Admin\AdminAdvertisementController;
use App\Http\Controllers\Admin\AdminAuthorcontroller;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminFagController;
use App\Http\Controllers\Admin\AdminFrontSettingController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminLiveChannelController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminOnlinePollController;
use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminSocialItemcontroller;
use App\Http\Controllers\Admin\AdminSubCategoryController;
use App\Http\Controllers\Admin\AdminSubscriberController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Author\AuthorHomeController;
use App\Http\Controllers\Author\AuthorProfileController;
use App\Http\Controllers\Front\FrontAboutController;
use App\Http\Controllers\Front\FrontArchiveController;
use App\Http\Controllers\Front\FrontContactController;
use App\Http\Controllers\Front\FrontDisclaimerController;
use App\Http\Controllers\Front\FrontFaqController;
use App\Http\Controllers\Front\FrontHomeController;
use App\Http\Controllers\Front\FrontLoginController;
use App\Http\Controllers\Front\FrontOnlinePollController;
use App\Http\Controllers\Front\FrontPhotoController;
use App\Http\Controllers\Front\FrontPostCategoryController;
use App\Http\Controllers\Front\FrontPostController;
use App\Http\Controllers\Front\FrontPostTagController;
use App\Http\Controllers\Front\FrontPrivacyController;
use App\Http\Controllers\Front\FrontSubscriberController;
use App\Http\Controllers\Front\FrontTermsController;
use App\Http\Controllers\Front\FrontVideoController;
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
Route::post('/search/result', [FrontHomeController::class, 'search'])->name('search_result');

Route::get('/about', [FrontAboutController::class, 'index'])->name('about');
Route::get('/contact', [FrontContactController::class, 'index'])->name('contact');
Route::post('/contact/send-email', [FrontContactController::class, 'send_email'])->name('contact_form_submit');
Route::get('/faq', [FrontFaqController::class, 'index'])->name('faq');
Route::get('/terms-and-condition', [FrontTermsController::class, 'index'])->name('terms');
Route::get('/privacy-policy', [FrontPrivacyController::class, 'index'])->name('privacy');
Route::get('/disclaimer', [FrontDisclaimerController::class, 'index'])->name('disclaimer');
Route::get('/category', [FrontPostCategoryController::class, 'index'])->name('news_category');
Route::get('/category/detail/{id}', [FrontPostCategoryController::class, 'detail'])->name('news_category_detail');
Route::get('/news/detail/{id}', [FrontPostController::class, 'detail'])->name('news_detail');
Route::get('/tag/{tag_name}', [FrontPostTagController::class, 'index'])->name('news_tag');
Route::get('/galery/photo', [FrontPhotoController::class, 'index'])->name('news_galery_photo');
Route::get('/galery/video', [FrontVideoController::class, 'index'])->name('news_galery_video');
Route::post('/subscriber', [FrontSubscriberController::class, 'index'])->name('subscriber');
Route::get('/subscriber/verify/{token}/{email}', [FrontSubscriberController::class, 'subscriber_verify'])->name('subscriber_verify');
Route::get('/online-poll-previous', [FrontOnlinePollController::class, 'poll_previous'])->name('poll_previous');
Route::post('/online-poll-submit', [FrontOnlinePollController::class, 'poll_submit'])->name('poll_submit');
route::post('/archive/show', [FrontArchiveController::class, 'index'])->name('archive');
route::get('/archive/{tahun}/{month}', [FrontArchiveController::class, 'detail'])->name('archive_detail');

// =======================================================================================

// author 
// author > login 
Route::get('/login', [FrontLoginController::class, 'index'])->name('login');
Route::post('/login/submit', [FrontLoginController::class, 'login_submit'])->name('author_login_submit');
Route::get('/logout', [FrontLoginController::class, 'logout'])->name('author_logout')->middleware('author:author');

// author > home 
Route::get('/author/home', [AuthorHomeController::class, 'index'])->name('author_home')->middleware('author:author');

//author > Profile
Route::get('/author/profile', [AuthorProfileController::class, 'index'])->name('author_profile')->middleware('author:author');
Route::post('/author/profile-submit', [AuthorProfileController::class, 'profile_submit'])->name('author_profile_submit')->middleware('author:author');

// =======================================================================================

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

//admin >Setting
Route::get('/admin/setting/front/tranding', [AdminFrontSettingController::class, 'tranding'])->name('admin_setting_front_tranding')->middleware('admin:admin');
Route::post('/admin/setting/front/tranding-update', [AdminFrontSettingController::class, 'tranding_submit'])->name('admin_setting_front_tranding_submit')->middleware('admin:admin');

//admin >Photo Galery
Route::get('/admin/galery/photo', [AdminPhotoController::class, 'index'])->name('admin_photo')->middleware('admin:admin');
Route::get('/admin/galery/photo/add', [AdminPhotoController::class, 'create'])->name('admin_photo_add')->middleware('admin:admin');
Route::post('/admin/galery/photo/add-submit', [AdminPhotoController::class, 'create_submit'])->name('admin_photo_add_submit')->middleware('admin:admin');
Route::get('/admin/galery/photo/{id}/edit', [AdminPhotoController::class, 'edit'])->name('admin_photo_edit')->middleware('admin:admin');
Route::post('/admin/galery/photo/{id}/edit-submit', [AdminPhotoController::class, 'edit_submit'])->name('admin_photo_edit_submit')->middleware('admin:admin');
Route::get('/admin/galery/photo/{id}/delete', [AdminPhotoController::class, 'delete'])->name('admin_photo_delete')->middleware('admin:admin');

//admin >Video Galery
Route::get('/admin/galery/video', [AdminVideoController::class, 'index'])->name('admin_video')->middleware('admin:admin');
Route::get('/admin/galery/video/add', [AdminVideoController::class, 'create'])->name('admin_video_add')->middleware('admin:admin');
Route::post('/admin/galery/video/add-submit', [AdminVideoController::class, 'create_submit'])->name('admin_video_add_submit')->middleware('admin:admin');
Route::get('/admin/galery/video/{id}/edit', [AdminVideoController::class, 'edit'])->name('admin_video_edit')->middleware('admin:admin');
Route::post('/admin/galery/video/{id}/edit-submit', [AdminVideoController::class, 'edit_submit'])->name('admin_video_edit_submit')->middleware('admin:admin');
Route::get('/admin/galery/video/{id}/delete', [AdminVideoController::class, 'delete'])->name('admin_video_delete')->middleware('admin:admin');


//admin >page > about
Route::get('/admin/page/about/show', [AdminPageController::class, 'about'])->name('admin_page_about')->middleware('admin:admin');
Route::post('/admin/page/about/edit-submit', [AdminPageController::class, 'about_edit_submit'])->name('admin_page_about_edit_submit')->middleware('admin:admin');

//admin >page > faq
Route::get('/admin/page/faq/show', [AdminPageController::class, 'faq'])->name('admin_page_faq')->middleware('admin:admin');
Route::post('/admin/page/faq/edit-submit', [AdminPageController::class, 'faq_edit_submit'])->name('admin_page_faq_edit_submit')->middleware('admin:admin');

//admin >page > contact
Route::get('/admin/page/contact/show', [AdminPageController::class, 'contact'])->name('admin_page_contact')->middleware('admin:admin');
Route::post('/admin/page/contact/edit-submit', [AdminPageController::class, 'contact_edit_submit'])->name('admin_page_contact_edit_submit')->middleware('admin:admin');

//admin >page > login
Route::get('/admin/page/login/show', [AdminPageController::class, 'login'])->name('admin_page_login')->middleware('admin:admin');
Route::post('/admin/page/login/edit-submit', [AdminPageController::class, 'login_edit_submit'])->name('admin_page_login_edit_submit')->middleware('admin:admin');

//admin >page > terms
Route::get('/admin/page/terms/show', [AdminPageController::class, 'terms'])->name('admin_page_terms')->middleware('admin:admin');
Route::post('/admin/page/terms/edit-submit', [AdminPageController::class, 'terms_edit_submit'])->name('admin_page_terms_edit_submit')->middleware('admin:admin');

//admin >page > privacy
Route::get('/admin/page/privacy/show', [AdminPageController::class, 'privacy'])->name('admin_page_privacy')->middleware('admin:admin');
Route::post('/admin/page/privacy/edit-submit', [AdminPageController::class, 'privacy_edit_submit'])->name('admin_page_privacy_edit_submit')->middleware('admin:admin');

//admin >page > disclaimer
Route::get('/admin/page/disclaimer/show', [AdminPageController::class, 'disclaimer'])->name('admin_page_disclaimer')->middleware('admin:admin');
Route::post('/admin/page/disclaimer/edit-submit', [AdminPageController::class, 'disclaimer_edit_submit'])->name('admin_page_disclaimer_edit_submit')->middleware('admin:admin');

//admin >FAQ
Route::get('/admin/faq/show', [AdminFagController::class, 'index'])->name('admin_faq')->middleware('admin:admin');
Route::get('/admin/faq/add', [AdminFagController::class, 'create'])->name('admin_faq_add')->middleware('admin:admin');
Route::post('/admin/faq/add-submit', [AdminFagController::class, 'create_submit'])->name('admin_faq_add_submit')->middleware('admin:admin');
Route::get('/admin/faq/{id}/edit', [AdminFagController::class, 'edit'])->name('admin_faq_edit')->middleware('admin:admin');
Route::post('/admin/faq/{id}/edit-submit', [AdminFagController::class, 'edit_submit'])->name('admin_faq_edit_submit')->middleware('admin:admin');
Route::get('/admin/faq/{id}/delete', [AdminFagController::class, 'delete'])->name('admin_faq_delete')->middleware('admin:admin');

//admin >Subscriber
Route::get('/admin/subscribers/all', [AdminSubscriberController::class, 'index'])->name('admin_subscriber')->middleware('admin:admin');
Route::get('/admin/subscribers/send-email', [AdminSubscriberController::class, 'send_email'])->name('admin_subscriber_send_email')->middleware('admin:admin');
Route::post('/admin/subscribers/send-email/submit', [AdminSubscriberController::class, 'send_email_submit'])->name('admin_subscriber_send_email_submit')->middleware('admin:admin');

//admin >Live Channel
Route::get('/admin/live-channel/show', [AdminLiveChannelController::class, 'index'])->name('admin_live_channel')->middleware('admin:admin');
Route::get('/admin/live-channel/active-show', [AdminLiveChannelController::class, 'show_active'])->name('admin_live_channel_active')->middleware('admin:admin');
Route::get('/admin/live-channel/add', [AdminLiveChannelController::class, 'create'])->name('admin_live_channel_add')->middleware('admin:admin');
Route::post('/admin/live-channel/add-submit', [AdminLiveChannelController::class, 'create_submit'])->name('admin_live_channel_add_submit')->middleware('admin:admin');
Route::get('/admin/live-channel/{id}/edit', [AdminLiveChannelController::class, 'edit'])->name('admin_live_channel_edit')->middleware('admin:admin');
Route::post('/admin/live-channel/{id}/edit-submit', [AdminLiveChannelController::class, 'edit_submit'])->name('admin_live_channel_edit_submit')->middleware('admin:admin');
Route::get('/admin/live-channel/{id}/delete', [AdminLiveChannelController::class, 'delete'])->name('admin_live_channel_delete')->middleware('admin:admin');

//admin >Online Poll
Route::get('/admin/online-poll/show', [AdminOnlinePollController::class, 'index'])->name('admin_online_poll_show')->middleware('admin:admin');
Route::get('/admin/online-poll/add', [AdminOnlinePollController::class, 'create'])->name('admin_online_poll_add')->middleware('admin:admin');
Route::post('/admin/online-poll/add-submit', [AdminOnlinePollController::class, 'create_submit'])->name('admin_online_poll_add_submit')->middleware('admin:admin');
Route::get('/admin/online-poll/{id}/edit', [AdminOnlinePollController::class, 'edit'])->name('admin_online_poll_edit')->middleware('admin:admin');
Route::post('/admin/online-poll/{id}/edit-submit', [AdminOnlinePollController::class, 'edit_submit'])->name('admin_online_poll_edit_submit')->middleware('admin:admin');
Route::get('/admin/online-poll/{id}/delete', [AdminOnlinePollController::class, 'delete'])->name('admin_online_poll_delete')->middleware('admin:admin');

//admin >Social Media Item
Route::get('/admin/social-item/show', [AdminSocialItemcontroller::class, 'index'])->name('admin_social_item')->middleware('admin:admin');
Route::get('/admin/social-item/add', [AdminSocialItemcontroller::class, 'create'])->name('admin_social_item_add')->middleware('admin:admin');
Route::post('/admin/social-item/add-submit', [AdminSocialItemcontroller::class, 'create_submit'])->name('admin_social_item_add_submit')->middleware('admin:admin');
Route::get('/admin/social-item/{id}/edit', [AdminSocialItemcontroller::class, 'edit'])->name('admin_social_item_edit')->middleware('admin:admin');
Route::post('/admin/social-item/{id}/edit-submit', [AdminSocialItemcontroller::class, 'edit_submit'])->name('admin_social_item_edit_submit')->middleware('admin:admin');
Route::get('/admin/social-item/{id}/delete', [AdminSocialItemcontroller::class, 'delete'])->name('admin_social_item_delete')->middleware('admin:admin');

//admin >Author Section list
Route::get('/admin/author/list', [AdminAuthorcontroller::class, 'index'])->name('admin_author_section_list')->middleware('admin:admin');
Route::get('/admin/author/add', [AdminAuthorcontroller::class, 'create'])->name('admin_author_section_add')->middleware('admin:admin');
Route::post('/admin/author/add-submit', [AdminAuthorcontroller::class, 'create_submit'])->name('admin_author_section_add_submit')->middleware('admin:admin');
Route::get('/admin/author/{id}/edit', [AdminAuthorcontroller::class, 'edit'])->name('admin_author_section_edit')->middleware('admin:admin');
Route::post('/admin/author/{id}/edit-submit', [AdminAuthorcontroller::class, 'edit_submit'])->name('admin_author_section_edit_submit')->middleware('admin:admin');
Route::get('/admin/author/{id}/delete', [AdminAuthorcontroller::class, 'delete'])->name('admin_author_section_delete')->middleware('admin:admin');
//admin >Author Section list post
Route::get('/admin/author/posts', [AdminAuthorcontroller::class, 'posts'])->name('admin_author_section_posts')->middleware('admin:admin');
