<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', 'AuthController@login');


Route::group(['middleware' => ['auth:api']], function () {
    Route::post('change_password', 'AuthController@changePassword');

    Route::post('drivers/search', 'DriverAPIController@search');
    Route::resource('drivers', 'DriverAPIController');
    Route::resource('vehicle_types', 'VehicleTypeAPIController');
    Route::resource('lgas', 'LgaAPIController');
    Route::resource('states', 'StateAPIController');
});




