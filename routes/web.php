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


Route::get('/', 'mainController@main');



Route::get('loginform', 'mainController@loginform');

Route::get('memberjoinform', 'mainController@joinform');

//Route::post('login','mainController@login');

Route::post('join', 'mainController@join');


Route::get('bbs','mainController@index');

Route::get('view','mainController@show');
//['as' => 'join', 'use' => 'mainController@join']

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/welcome',function(){
	return view('welcome');
});

//회원정보 수정폼
Route::get('updateform', 'mainController@updateform');
Route::post('update', 'mainController@update');