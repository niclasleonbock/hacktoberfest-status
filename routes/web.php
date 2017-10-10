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

Route::get('/', 'HomeController@index');

Route::get('auth', 'AuthController@redirectToProvider');
Route::get('auth/callback', 'AuthController@handleProviderCallback');
Route::get('auth/signout', 'AuthController@signOut');

Route::get('{github_username}', 'ShareController@index')->name('share');
