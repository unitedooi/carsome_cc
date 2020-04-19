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
    
    return redirect('/appointment');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/appointment', 'AppointmentController');

Route::post('appointment/fetch', 'AppointmentController@fetch')->name('appointment.fetch');

// Route::resource('/admin/appointment', 'AppointmentController');