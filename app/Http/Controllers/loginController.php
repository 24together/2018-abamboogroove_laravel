<?php

namespace App\Http\Controllers;

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
        return view('login.member-update');
    }
}