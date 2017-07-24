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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'projects'], function () {
        Route::get('/create', 'ProjectController@create')->name('project.create');
        Route::get('/{uuid}', 'ProjectController@show')->name('project.show');
    });
});

Route::any('auth/{provider}', 'Auth\LoginController@socialLogin')->name('social.auth');
