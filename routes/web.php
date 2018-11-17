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
Route::get('welcome', function (){
    return view('welcome');
});
Route::get('/', 'mainController@main');/*접속했을 때 메인만 보이려면*/
Route::get('/member/login','loginController@login');
Route::get('/member/join','loginController@join');
Route::get('/member/update','loginController@update');
Route::get('/secret/write','writeController@secretWrite');
Route::get('/secret/board','writeController@secretBoard');
Route::get('/secret/view/{num}','writeController@secretView');
Route::get('/free/write','writeController@freeWrite');
Route::get('/free/board','writeController@freeBoard');
Route::get('/free/view/{num}','writeController@freeView');
Route::get('/kakao','KakaoLoginController@index');
Route::get('/kakao/login','KakaoLoginController@redirectToProvider');
Route::get('/kakao/login/callback','KakaoLoginController@handleProviderCallback');


Route::post('/write','writeController@write');
//카테고리 값 받아 글쓰기
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
