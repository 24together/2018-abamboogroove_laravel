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
//로그인관리
Route::get('/', 'mainController@main');/*접속했을 때 메인만 보이려면*/
Route::get('/member/login','loginController@login');
Route::get('/member/join','loginController@join');
Route::get('/member/update','loginController@update');
//익명 게시판
Route::get('/secret/write','writeController@secretWrite');
Route::get('/secret/board','writeController@secretBoard');
Route::get('/secret/view/{num}','writeController@secretView');
Route::get('/secret/modify/{num}','writeController@secretModify');
////자유 게시판
//섬머노트 작성
Route::get('/free/write','writeController@freeWrite');
Route::get('/free/board','writeController@freeBoard');
//섬머노트 뷰
Route::get('/free/view/{num}','writeController@freeView');
//섬머노트 저장
Route::post('/summernote','writeController@summernote')->name('summernotePersist');
//카카오
Route::get('/kakao','KakaoLoginController@index');/*카카오 로그인 관련*/
Route::get('/kakao/login','KakaoLoginController@redirectToProvider');
Route::get('/kakao/login/callback','KakaoLoginController@handleProviderCallback');

Route::post('/modify/{num}','writeController@modify');
Route::post('/write','writeController@write');

//카테고리 값 받아 글쓰기
Route::post('/delete/{num}/{category}','writeController@delete');
//게시글 별점 부여
Route::post('/star_up/{num}/{category}','writeController@star');
//자신의 글 확인
Route::get('/mywriting/{id}','writeController@myBoard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
