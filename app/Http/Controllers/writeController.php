<?php

namespace App\Http\Controllers;

use App\Board;//모델사용
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class writeController extends Controller
{
    public function secretWrite(){
        return view('secretboard.secret-write-form');
    }
    public function secretBoard(){
        $msgs = Board::where('category','like','1')->paginate(5);
        return view('secretboard.secret-board', compact('msgs'));
    }
    public function secretView($num){
        $msg = Board::find($num);
        return view('secretboard.secret-view', ['msg' => $msg]);
    }
    public function freeWrite(){
        return view('freeboard.free-write-form');
    }
    public function freeBoard(){
        $msgs = Board::where('category','like','2')->paginate(5);
        return view('freeboard.free-board',compact('msgs'));
    }
    public function freeView($num){
        $msg = Board::find($num);
        return view('freeboard.free-view',['msg'=>$msg]);
    }
}
