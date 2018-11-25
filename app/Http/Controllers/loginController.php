<?php

namespace App\Http\Controllers;

use Auth;       // Auth 클래스
use App\User;   // 사용자 테이블

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(){
        return view('login.member-login');
    }

    public function join(){
        return view('auth.register');
    }

    public function update(){
        $user = User::find(1);
        $user->save();
        // 세션종료.

        Auth::login($user);
        return view('auth.passwords.reset');
    }

}