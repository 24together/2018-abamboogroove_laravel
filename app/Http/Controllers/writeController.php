<?php

namespace App\Http\Controllers;

use App\Board;//모델사용
use Illuminate\Http\Request;

class writeController extends Controller
{
    public function __construct()
    {//미들웨어를 이용해 페이지 접근시 로그인체크
        $this->middleware('login');
    }
    //////memberboard///////////////////////
    public function myBoard($id,$page,Request $request){

        $search = $request->search;
        $range = $request->range;

        //페이지 네이션 할 값을 부여한 후 내림차순으로 보이도록
        $msgs = Board::where('id','like',$id)->orderBy('num', 'desc')->paginate(5);

        if(isset($request->search)){
            switch($range){
                case "writer":
                    $msgs = Board::where('id', 'like', $id)->where('writer','LIKE',"%$search%")->orderBy('num', 'desc')->paginate(5);
                    break;
                case "content":
                    $msgs = Board::where('id', 'like', $id)->where('content','LIKE',"%$search%")->orderBy('num', 'desc')->paginate(5);
                    break;
                case "titleAndcotent":
                    $msgs = Board::where('id', 'like', $id)->where('title','LIKE',"%$search%")->orWhere('content','LIKE',"%$search%")->orderBy('num', 'desc')->paginate(5);
                    break;
            }
        }

        return view('member_board', compact('msgs'),['page'=>$page])->with('search',$search)->with('range',$range);
    }
    public function myBoardDelete(Request $request,$page){
        $id = $request->id;
        $check_list = $request->check_list;
        foreach($check_list as $num){
            Board::where('num',$num)->delete();

        }
        return redirect('mywriting/'.$id.'/'.$page);
    }
    public function myBoardView($num,$page){
        //신고 되어 나만 볼 수 있는 글의 경우
        $msg =Board::find($num);

        return view('member-view',compact('msg'),['page'=>$page]);
    }
 
}
