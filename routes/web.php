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

Route::get('/login', 'loginController@index')->name('login');
Route::post('/login', 'loginController@verify');
Route::get('/logout', 'LogoutController@index');

Route::group(['middleware'=>['sess']], function(){
	Route::get('/home', 'homeController@index')->name('home.index');
	Route::group(['middleware'=>['admin']], function(){
		
		//admin
		Route::get('/admin/adduser', 'userController@adduserIndex')->name('admin.add');
		Route::post('/admin/adduser', 'userController@adduser');

		Route::get('/admin/showUser', 'userController@showUser')->name('user.show');
		Route::post('/admin/showUser', 'userController@search');
		Route::get('/admin/useredit/{id}', 'userController@editIndex')->name('user.edit');
		Route::post('/admin/useredit/{id}', 'userController@edit');
		Route::get('/admin/userDelete/{id}', 'userController@destroy')->name('user.delete');
		Route::get('/admin/userDetails/{id}', 'userController@details')->name('user.details');
	});
		//Employer
		Route::get('/user/addjob', 'JobModelController@create')->name('add.job');
		Route::post('/user/addjob', 'JobModelController@store');
		Route::get('/user/joblist', 'JobModelController@show')->name('job.list');
		Route::post('/user/joblist', 'JobModelController@search');

		Route::get('/user/jobEdit/{id}', 'JobModelController@editIndex')->name('job.edit');
		Route::post('/user/jobEdit/{id}', 'JobModelController@update');

		Route::get('/user/jobDelete/{id}', 'JobModelController@destroy')->name('job.delete');
});