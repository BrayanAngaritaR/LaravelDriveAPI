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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/google', 'Auth\LoginController@redirectToProvider')
		->name('login.google');
Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallback');

//Rutas para acceder al contenido

Route::middleware('auth')->group(function (){
	Route::get('/api', 'GoogleDriveController@getFolders')->name('google.folders');
	Route::get('/api/v', 'GoogleDriveController@isEmpty');
	Route::get('/api/upload', 'GoogleDriveController@uploadFiles');
	Route::post('/api/upload', 'GoogleDriveController@uploadFiles');
});
