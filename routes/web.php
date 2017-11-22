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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('trackings', 'TrackingsController@showAllTrackings')->name('showAllTrackings');
Route::get('trackings/new', 'TrackingsController@showNewTrackingForm')->name('showNewTrackingForm');
Route::post('trackings/new', 'TrackingsController@addNewTracking')->name('addNewTracking');
