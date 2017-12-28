<?php

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

Route::resource('apply', 'Api\\ApplyController', ['except' => ['create', 'edit']]);
Route::resource('movies', 'Api\\MoviesController', ['except' => ['create', 'edit']]);
Route::resource('race', 'Api\\RaceController', ['except' => ['create', 'edit']]);

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login')->name('api.login');
    Route::post('logout', 'AuthController@logout')->name('api.logout');
    Route::post('refresh', 'AuthController@refresh')->name('api.refresh');
    Route::post('me', 'AuthController@me')->name('api.me');
});