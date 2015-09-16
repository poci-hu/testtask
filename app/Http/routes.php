<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('/category/{id}', 'WelcomeController@category');
Route::get('/video/{id}', 'WelcomeController@video');
Route::get('/upload', 'VideoUploader@upload');
Route::post('/upload', 'Videouploader@process');
