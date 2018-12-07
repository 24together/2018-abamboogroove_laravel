<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{
    public function main(){//메인페이지
        return view('index');
    }

}
