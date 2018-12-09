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

//로그인관리
Route::get('/', 'mainController@main');/*접속했을 때 메인만 보이려면*/
Route::get('/member/login','loginController@login');
Route::get('/member/join','loginController@join');
Route::get('/member/update','loginController@update');
Route::post('/member/update','loginController@updatePost');

//카카오
Route::get('/kakao','KakaoLoginController@index');/*카카오 로그인 관련*/
Route::get('/kakao/login','KakaoLoginController@redirectToProvider');
Route::get('/kakao/login/callback','KakaoLoginController@handleProviderCallback');

//카테고리 값 받아 글쓰기
Route::get('/delete/{num}','BoardController@delete');
Route::get('comment/delete/{num}','CommentController@delete');
//게시글 별점 부여
Route::post('/star_up/{num}/{category}','BoardController@star');
//자신의 글 확인
Route::get('/mywriting/{id}/{page}/{search?}/{range?}','writeController@myBoard');
Route::get('/mywriting/view/{num}/{page}','writeController@myBoardView');
Route::post('/member/board/delete/{page}','writeController@myBoardDelete');
//신고 기능
Route::get('/report/{num}/{category}/{page}','BoardController@report');
//보드 라우트
Route::resource('board','BoardController');
Route::resource('comment','CommentController',['only'=>['store','update']]);
Route::post('/board/update/{num}','BoardController@update');
//게시글 좋아요 기능
Route::get('/thumb_up/{num}','CommentController@thumb_up');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
