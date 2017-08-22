<?php

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


Auth::routes();

Route::prefix('admin')->group(function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset');

    Route::resource('/countries', 'Admin\CountrieController');
    Route::resource('/servers', 'Admin\ServerController');
    Route::resource('/users', 'Admin\UserController');
    Route::resource('/devices', 'Admin\DeviceController');
    Route::resource('/devicesusers', 'Admin\DeviceuserController');
    Route::resource('/sessionlogs', 'Admin\SessionlogController');
    Route::resource('/languages', 'Admin\I18nController');
    Route::resource('/plans', 'Admin\PlanController');
    Route::resource('/pages', 'Admin\PageController');
    Route::resource('/subscriptions', 'Admin\SubscriptionController');
    Route::resource('/settings', 'Admin\SettingController');
    Route::get('/upload','Admin\DashboardController@getUpload')->name('admin.upload');
    Route::post('/upload','Admin\DashboardController@upload')->name('admin.upload.submit');

    Route::get('/','Admin\DashboardController@index')->name('admin.dashboard');
});

Route::prefix('subscriptions')->group(function() {
    Route::get('/', 'SubscriptionController@index')->name('subscriptions');
    Route::post('/order', 'SubscriptionController@order')->name('subscriptions.order');
});

Route::get('/logout','Auth\LoginController@userLogout')->name('logout');
Route::get('/home', 'User\HomeController@index')->name('home');

Route::get('/', 'indexController@index')->name('index');
