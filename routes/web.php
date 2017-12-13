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

Route::get('/', function () {
    return view('welcome');
});

Route::get('track', 'FrontendController@showTrackingForm')->name('showTrackingForm');
Route::post('track', 'FrontendController@displayTrackingDetails')->name('displayTrackingDetails');

// Auth::routes();

Route::get('registeruser', 'Auth\RegisterController@showRegistrationForm');
Route::post('registeruser', 'Auth\RegisterController@register')->name('register');
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('home', 'HomeController@index')->name('home');
Route::get('trackings', 'TrackingsController@showAllTrackings')->name('showAllTrackings');
Route::get('trackings/new', 'TrackingsController@showNewTrackingForm')->name('showNewTrackingForm');
Route::post('trackings/new', 'TrackingsController@addNewTracking')->name('addNewTracking');
Route::get('trackings/{id}/edit', 'TrackingsController@showEditTrackingForm')->name('showEditTrackingForm');
Route::put('trackings/{id}/edit', 'TrackingsController@editTracking')->name('editTracking');
Route::post('trackings/{id}/edit', 'TrackingsController@newShipmentHistory')->name('addNewShipmentHistory');

Route::get('trackings/{id}/history/{history}/edit', 'TrackingsController@showEditShipmentHistory');
Route::put('trackings/{id}/history/{history}/edit', 'TrackingsController@editShipmentHistory')
    ->name('editShipmentHistory');

Route::get('trackings/{id}/delete', 'TrackingsController@delete')->name('delete');
