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

Route::get('/', ['uses' =>  'HomeController@index']);
Route::post('get_comment_video', [ 'uses' => 'HomeController@get_comment_video' ] );
Route::get('bonus', [ 'uses' => 'HomeController@bonus' ] );
Route::get('program', [ 'uses' => 'ProgrammController@index' ] );


Route::get('login', ['uses' => 'HomeController@index' ] );
Route::get('register', ['uses' => 'HomeController@index' ] );

Route::post('register', ['uses' => 'UserController@registration' ] );
Route::post('login', ['as' => 'login', 'uses' => 'UserController@login' ] );


Route::group(['prefix' => '/', 'middleware' => ['auth']], function () {
	Route::get('logout', [ 'as' => 'logout', 'uses' => 'UserController@logout' ] );

	Route::post('user/change_logo', [ 'uses' => 'UserController@change_logo' ] );

	Route::get('lk/{id}', [ 'uses' => 'PrivatOfficeController@index' ] );
	Route::post('privat_office/get_exercive_video', [ 'uses' => 'PrivatOfficeController@get_exercive_video' ] );
	Route::get('lk/{id}/edit', ['uses' => 'PrivatOfficeController@personal_data']);
	Route::post('lk/{id}', ['uses' => 'PrivatOfficeController@personal_data_store']);

	Route::get('lk/{id}/balance', ['uses' => 'PrivatOfficeController@balance']);
	Route::get('lk/{id}/messages', ['uses' => 'PrivatOfficeController@messages']);

	Route::get('lk/{id}/faq', ['uses' => 'PrivatOfficeController@faq']);

	Route::post('program/choice_programm', [ 'uses' => 'ProgrammController@choice_program']);
	Route::post('program/get_program', [ 'uses' => 'ProgrammController@get_program' ] );

	//Message
	Route::get('messages/new', ['uses' => 'MessageController@create']);
	Route::get('messages/{type}', ['uses' => 'MessageController@index']);
	Route::get('message/{id}', ['uses' => 'MessageController@show']);

	//Временно апи сюда
	Route::resource('api/message', 'Api\MessageApiController', ['only' => [
	    'index', 'show', 'store','update', 'destroy'
	]]);

	Route::group(['middleware' => ['admin']], function () {
		Route::get('admin', ['uses' => 'Admin\HomeController@index']);
		Route::resource('admin/users', 'Admin\UsersController');
		Route::post('admin/change_status/{id}', ['uses' => 'Admin\UsersController@change_status']);
		Route::resource('admin/accruals', 'Admin\AccrualsController');

		//Message
		Route::get('admin/messages/sendAll', ['uses' => 'MessageController@sendAll']);
		Route::get('admin/messages/new/{id}', ['uses' => 'MessageController@create_admin']);
		Route::get('admin/messages/{type}', ['uses' => 'MessageController@index_admin']);
		Route::get('admin/message/{id}', ['uses' => 'MessageController@show_admin']);

		Route::get('admin/tasks', ['uses' => 'Admin\TaskController@index'])->name('tasks');
		Route::post('admin/tasks', ['uses' => 'Admin\TaskController@post_index']);
		Route::get('admin/tasks/{id}/{status}', ['uses' => 'Admin\TaskController@change_status']);
		Route::get('admin/tasks/{id}', ['uses' => 'Admin\TaskController@task']);


	});

	Route::post('api/yandex/payment_aviso_test', ['uses' => 'Api\YandexController@paymentAvisoURLTest']);
	Route::post('api/yandex/payment_aviso', ['uses' => 'Api\YandexController@paymentAvisoURL']);

});

Route::get('api/user/email_store', ['uses' => 'Api\UserApiController@email_store']);
Route::post('api/file/store_attachment', ['uses' => 'Api\FileApiController@store_attachment']);

Route::post('api/private_office/store_training', ['uses' => 'Api\PrivateOfficeApiController@store_training']);


//Yandex
Route::any('yandex/CheckURL', ['uses' => 'Api\YandexController@checkURL']);
Route::any('yandex/CheckURLTest', ['uses' => 'Api\YandexController@checkURLTest']);

Route::any('yandex/AvisoURL', ['uses' => 'Api\YandexController@avisoURL']);
Route::any('yandex/AvisoURLTest', ['uses' => 'Api\YandexController@avisoURLTest']);
