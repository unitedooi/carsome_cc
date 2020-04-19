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

Route::get('/appointment/edit/{appointment_id}', 'AppointmentController@edit')->name('appointment.update');

Route::post('appointment/fetch', 'AppointmentController@fetch')->name('appointment.fetch');
