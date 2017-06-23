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

Route::get('/', 'HomeController@index');

Route::get('login', ['uses' => 'HomeController@index' ] );
Route::get('register', ['uses' => 'HomeController@index' ] );

Route::post('register', ['uses' => 'UserController@registration' ] );
Route::post('login', ['as' => 'login', 'uses' => 'UserController@login' ] );

Route::group(['prefix' => '/', 'middleware' => ['auth']], function () {
	Route::get('logout', [ 'as' => 'logout', 'uses' => 'UserController@logout' ] );
	Route::get('lk/{id}', [ 'uses' => 'PrivatOfficeController@index' ] );
	Route::post('privat_office/get_exercive_video', [ 'uses' => 'PrivatOfficeController@get_exercive_video' ] );
	Route::get('lk/{id}/edit', ['uses' => 'PrivatOfficeController@personal_data']);
	Route::get('lk/{id}/balance', ['uses' => 'PrivatOfficeController@balance']);
	Route::get('lk/{id}/messages', ['uses' => 'PrivatOfficeController@messages']);

	Route::post('program/choice_programm', [ 'uses' => 'ProgrammController@choice_program']);
	Route::post('program/get_program', [ 'uses' => 'ProgrammController@get_program' ] );
});
