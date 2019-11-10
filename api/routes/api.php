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

Route::post('start', 'StartController')->name('start');

Route::middleware('auth:api')->group(function () {
    Route::resource('libraries', 'LibraryController')->only(['index', 'show']);
    Route::resource('sounds', 'SoundController')->only(['show']);
    Route::post('sounds/{sound}/favorites', 'FavoriteController@store')->name('favorites.store');
    Route::delete('sounds/{sound}/favorites', 'FavoriteController@destroy')->name('favorites.destroy');
    Route::resource('favorites', 'FavoriteController')->only(['index']);
});

