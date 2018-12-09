<?php

/* 헤더 */
Route::get('/', 'mainController@main');
Route::get('about', 'mainController@about');
Route::get('brand', 'mainController@brand');
Auth::routes();


/* 회원정보 */
Route::get('loginform', 'mainController@loginform');
Route::get('memberjoinform', 'mainController@joinform');
Route::post('join', 'mainController@join');
Route::get('updateform', 'mainController@updateform');
Route::post('update', 'mainController@update');
Route::get('passwordform','mainController@passwordform');
Route::post('passwordre','mainController@passwordre');

/* 카카오로그인*/
Route::get('kakao','kakaoLoginController@index');
Route::get('kakao/login','kakaoLoginController@redirectToProvider');
Route::get('kakao/login/callback','kakaoLoginController@handleProviderCallback');


/* 게시판 */
Route::resource('boards','BoardsController');
Route::resource('reboards','ReboardsController');
Route::get('comment_form','mainController@comment_form');
Route::post('comment','mainController@comment');
//Route::post('search','mainController@search');
Auth::routes();

/* 파일첨부 */
Route::resource('attachments','AttachmentsController');

?>