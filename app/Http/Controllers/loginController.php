<?php

namespace App\Http\Controllers;

use Auth;       // Auth 클래스
use App\User;   // 사용자 테이블
use Illuminate\Support\Facades\Hash;//해싱
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function __construct()
    {//미들웨어를 이용해 회원정보수정 접근시 로그인체크
        $this->middleware('login')->only('update');
    }

    public function login(){
        return view('login.member-login');
    }

    public function join(){
        return view('auth.register');
    }

    public function update(){
        return view('auth.passwords.reset');
    }
    public function updatePost(Request $request){
        $email = $request->email;
        $password = Hash::make($request->password);
        //비밀번호 해싱
        $name = $request->name;
        $age = $request->age;

        User::where('email',$email)->update(['email'=>$email,'password'=>$password,'name'=>$name,'age'=>$age]);

        return redirect('/');
    }
}