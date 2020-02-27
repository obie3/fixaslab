<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'account'], function () {
    Route::get('/all', 'AccountDetailController@index');
    Route::post('/create', 'AccountDetailController@store');
  });

  Route::group(['prefix' => 'customers'], function () {
    Route::get('/all', 'CustomerProfileController@index');
    //Route::post('/create', 'CustomerProfileController@store');
  });

  Route::group(['prefix' => 'transactions'], function () {
    Route::get('/all', 'TransactionController@index');
    Route::post('/create', 'TransactionController@store');
  });
