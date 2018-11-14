<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socailite;//컴포저로 설치한 라라벨에서 제공하는 소셜라이트다우다웅
use Laravel\Socialite\Facades\Socialite;

class KakaoLoginController extends Controller
{
    public function index(){
        return view('login.kakao_login');
    }
    public function redirectToProvider(){
        return Socialite::with('kakao')->redirect();
    }
    public function handleProviderCallback(){
        //로그인 처리
        $kaUser = Socialite::with('kakao')->user();

        //dd(response()->json($kaUser,200, [],JSON_PRETTY_PRINT));
        return response()->json($kaUser,200, [],JSON_PRETTY_PRINT);

    }
}
