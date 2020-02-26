<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes(['verify' => true]);
Route::group(['middleware' => ['web', 'auth:web']], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/home2', 'HomeController@indexs');

    Route::resource('drivers', 'DriversController');

    Route::resource('vehicleTypes', 'VehicleTypeController');


    Route::resource('agents', 'AgentController');

    Route::resource('collectors', 'CollectorController');

    Route::resource('enforcers', 'EnforcerController');

    Route::resource('lgas', 'LgaController');

    Route::resource('biodatas', 'BiodataController');
    Route::resource('payments', 'PaymentController');
    Route::resource('userDetails', 'UserDetailsController');

    Route::resource('remitPayments', 'RemitPaymentsController');
});







