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



Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/logout', 'Auth\LoginController@logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->middleware('verified');

Route::resource('drivers', 'DriversController');

Route::resource('vehicleTypes', 'VehicleTypeController');


Route::resource('agents', 'AgentController');

Route::resource('collectors', 'CollectorController');

Route::resource('enforcers', 'EnforcerController');

Route::resource('lgas', 'LgaController');