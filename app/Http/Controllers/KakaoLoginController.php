<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//컴포저로 설치한 라라벨에서 제공하는 소셜라이트다우다웅
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Hash;
use App\User;

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
        $token = $kaUser->token;
        $id = $kaUser->getId();
        $nickName = $kaUser->getNickName();

        //$avatar = $kaUser->getAvatar();
        //정보를 User를 이용해 로그인 처리

        if(!User::where('email',"$id")->exists()){
        User::create([
           'email' =>$id,
           'password' => Hash::make($token),
           'name' => $nickName,
        ]);
        }else{
            User::where('email',"$id")
                ->update(['password' => Hash::make($token)]);
        }
        //Auth를 이용하여 회원가입
        if(\Auth::attempt(['email'=> $id, 'password' => $token])){
            return redirect('/');
        }
        //dd(response()->json($kaUser,200, [],JSON_PRETTY_PRINT));
        return response()->json($kaUser,200, [],JSON_PRETTY_PRINT);

    }
}
