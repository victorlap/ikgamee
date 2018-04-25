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

Route::get('/', 'HomeController@index');

Route::get('event/{event}', 'EventController@show')->name('event.show');
Route::post('event', 'EventController@store')->name('event.store');

Route::post('attendee.store', 'AttendeeController@store')->name('attendee.store');