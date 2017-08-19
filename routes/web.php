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
    Route::get('/upload','Admin\MainController@getUpload')->name('admin.upload');
    Route::post('/upload','Admin\MainController@upload')->name('admin.upload.submit');
    Route::get('/','Admin\MainController@index')->name('admin.dashboard');
});

Route::get('/home', 'HomeController@index')->name('home');
