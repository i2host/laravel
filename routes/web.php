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

Route::get('/','MainController@index');
Route::get('/upload','MainController@getUpload');
Route::post('/upload','MainController@upload');

Route::resource('/countries', 'CountrieController');
Route::resource('/servers', 'ServerController');
Route::resource('/users', 'UserController');
Route::resource('/devices', 'DeviceController');
Route::resource('/devicesusers', 'DeviceuserController');
Route::resource('/sessionlogs', 'SessionlogController');
Route::resource('/languages', 'I18nController');
Route::resource('/plans', 'PlanController');
Route::resource('/pages', 'PageController');
Route::resource('/subscriptions', 'SubscriptionController');