<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome', ['rides'=>\App\Ride::paginate(5)]);
});

Auth::routes();

Route::post('/home/store', 'HomeController@store');
Route::post('/home/update/{id}', 'HomeController@update');
Route::get('/home/destroy/{id}', 'HomeController@destroy');
Route::resource('/home', 'HomeController');

