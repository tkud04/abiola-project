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

#Route::get('/', function(){return "<h2 style='color: red;'>There was a problem connecting to the server</h2>";});


Route::get('/', 'MainController@getTemp');
Route::post('contact', 'MainController@postContact');
Route::get('track', 'MainController@getTrack');


Route::get('practice', 'MainController@getPractice');
Route::get('zohoverify/{url}', 'MainController@getZoho');


