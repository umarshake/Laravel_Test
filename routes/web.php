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

Route::get('/', function () {
    return view('auth.login');
});


Route::get('/datatable', [
	'as'	=>	'datatable',
	'uses'	=> 	'HomeController@datatable'
]);

Route::get('/blankpage', [
	'as'	=>	'blankpage',
	'uses'	=> 	'HomeController@blankpage'
]);

Route::group([],function(){

	Route::get('/dashboard', [
		'as'	=>	'dashboard',
		'uses'	=> 	'HomeController@dashboard'
	]);	

	Route::get('/getdata/{page}', [
		'as' => 'getdata',
		'uses' => 'HomeController@getData'
	]);

	Route::get('/listdata', [
		'as' => 'listdata',
		'uses' => 'HomeController@listData'
	]);
	Route::get('/delete/{uuid}', [
		'as' => 'deletedata',
		'uses' => 'HomeController@deleteData'
	]);
	Route::get('/edit/{uuid}', [
		'as' => 'editdata',
		'uses' => 'HomeController@editData'
	]);
	Route::post('/update/{uuid}', [
		'as' => 'updatedata',
		'uses' => 'HomeController@updateData'
	]);
	Route::get('/adddata', [
		'as' => 'adddata',
		'uses' => 'HomeController@addData'
	]);

	Route::post('/adddata', [
		'as' => 'postdata',
		'uses' => 'HomeController@postData'
	]);
	

});









