<?php

namespace App\Http\Controllers;

use App\Board;//모델사용
use App\User;//모델사용
use Illuminate\Http\Request;


class BoardController extends Controller
{
    public function __construct()
    {//미들웨어를 이용해 index 이외의 페이지 접근시 로그인체크
        $this->middleware('login')->except('index');
    }
    public function index(Request $request)//게시글 목록 보여줌
    {
        $category = $request->category;
        $page = $request->page;

        $message = $request->message;

        $search = $request->search;
        $range = $request->range;

        //페이지네이션
        $msgs = Board::where('category', 'like', $category)->orderBy('num', 'desc')->paginate(5);

        if(isset($request->search)){
            switch($range){

                case "title":
                    $msgs = Board::where('category', 'like', $category)->where('title','LIKE',"%$search%")->orderBy('num', 'desc')->paginate(5);
                    break;
                case "writer":
                    $msgs = Board::where('category', 'like', $category)->where('writer','LIKE',"%$search%")->orderBy('num', 'desc')->paginate(5);
                    break;
                case "content":
                    $msgs = Board::where('category', 'like', $category)->where('content','LIKE',"%$search%")->orderBy('num', 'desc')->paginate(5);
                    break;
                case "titleAndcotent":
                    $msgs = Board::where('category', 'like', $category)->where('title','LIKE',"%$search%")->orWhere('content','LIKE',"%$search%")->orderBy('num', 'desc')->paginate(5);
                    break;
            }
        }

        //카테고리구분
        //1 = 익명게시판
        //2 = 자유게시판
        if ($category == 1) {
            return view('secretboard.secret-board', compact('msgs'))->with('category', $category)->with('page', $page)->with('search',$search)->with('range',$range)->with('message',$message);
        } else if ($category == 2) {
            return view('freeboard.free-board', compact('msgs'))->with('category', $category)->with('page', $page)->with('search',$search)->with('range',$range)->with('message',$message);
        }

    }

    public function create(Request $request)
    {//글쓰기 폼
        $page = $request->page;
        $category = $request->category;

        //카테고리구분
        //1 = 익명게시판
        //2 = 자유게시판
        if ($category == 1) {
            return view('secretboard.secret-write-form',['page'=>$page]);
        } else if ($category == 2) {
            return view('freeboard.free-write-form',['page'=>$page]);
        }
    }

    public function store(Request $request)
    {//새 글 저장
        //validate추가할것
        //secretboard
        //난수출력
        $ran = mt_rand(1, 3);
        $page = $request->page;

        $user= User::where('email','like',$request->id)->get()->first();
        //익명게시판(죽순(write_count)가 있어야 글을 쓸 수 있음)
        if($request->category==1){
            if($user->write_count==0){
                //죽순이 부족한 경우 return back과 메세지 출력
                return back()->with('massage','죽순이 부족합니다.');
            }else{
                //죽순이 있는 경우 1개 소거
                $user->decrement('write_count');
            }
        }
        //익명게시판, 자유게시판 공통 값 받아오기
        $board = new board();
        $board->title = $request->title;
        $board->writer = $request->writer;
        $board->content = $request->content_;
        $board->category = $request->category;
        $board->id = $request->id;
        //게시글 작성
        $board->save();

        $msg = $board;
        $category = $request->category;

        //카테고리 구분
        if ($category == 1) {
            return view('secretboard.secret-view', ['msg' => $msg], ['ran' => $ran])->with('category', $category)->with('page', $page);
        } else if ($category == 2) {
            return view('freeboard.free-view', ['msg' => $msg])->with('category', $category)->with('page', $page);
        }
    }

    public function show(Request $request, $num)
    {//게시판 출력
        //secretboard
        //난수출력
        $ran = mt_rand(1, 3);
        //all board
        //조회수 증가
        $page = $request->page;
        $search = $request->search;
        $range = $request->range;
        $message = $request->message;

        $msg = Board::find($num);
        $msg->increment('hits');
        //해당 뷰 보여줌

        $category = $msg->category;
        if ($category == 1) {
            return view('secretboard.secret-view', ['msg' => $msg], ['ran' => $ran])->with('message',$message)->with('category', $category)->with('page', $page)->with('search',$search)->with('range',$range);
        } else if ($category == 2) {
            return view('freeboard.free-view', ['msg' => $msg])->with('category', $category)->with('page', $page)->with('search',$search)->with('range',$range)->with('message',$message);
        }
    }

    public function edit($num, Request $request)
    {//게시글 수정 폼
        //secretboard
        //난수출력
        $ran = mt_rand(1, 3);

        $page = $request->page;
        $msg = Board::find($num);
        $category = $msg->category;

        //카테고리 구분
        if ($category == 1) {
            return view('secretboard.secret-modify-form', ['msg' => $msg], ['ran' => $ran])->with('category', $category)->with('page', $page);
        } else if ($category == 2) {
            return view('freeboard.free-modify-form', ['msg' => $msg])->with('category', $category)->with('page', $page);
        }
    }

    public function update($num, Request $request)
    {//게시글 수정 및 저장
        //secretboard
        //난수출력
        $ran = mt_rand(1, 3);
        //all board
        $title = $request->title;
        $content = $request->content_;
        $category = $request->category;

        $page = $request->page;
        //게시글 수정
        Board::where('num', $num)->update(['title' => $title, 'content' => $content]);

        $msg = Board::find($num);
        //카테고리 구분
            return redirect()->route('board.show', ['num'=> $num, 'page'=>$page,'message'=>'수정을 완료하였습니다'])->with('category', $category);

    }

    public function delete(Request $request, $num)
    {//게시글 삭제
        $page = $request->page;
        $board = Board::find($num);
        $category = $board['category'];
        $id = $board->id;
        $board->delete();

        //페이지네이션
        $msgs = Board::where('category', 'like', $category)->orderBy('num', 'desc')->paginate(5);
        //카테고리 구분
        if ($category == 1) {
            return redirect()->route('board.index',['category'=>$category,'page'=>$page,'message'=>'글삭제를 완료하였습니다']);
        } else if ($category == 2) {
            return redirect()->route('board.index',['category'=>$category,'page'=>$page,'message'=>'글삭제를 완료하였습니다']);
        } else if($category ==3) {
            return redirect('mywriting/'.$id.'/1');
        }
    }

    public function star(Request $request, $num, $category)
    {//별점 부여
        //(별점/준사람수)로 별점계산
        $board = Board::find($num);
        $request_star = $request->star;
        $board->increment('stars', "$request_star");//별점+별점
        $board->increment('setstar');//별점 준 사람 수
        $board->save();

        $msg = $board;

        return redirect()->route('board.show', ['num' => $num,'message'=>'별점을 주었습니다']);

    }
    public function report($num, $category, $page)
    {//게시글 신고
        //신고가 5이상일 경우 사람들과 공유하는 게시판에 게시 x
        //카테고리 3으로 변경

        //all board
        $board = Board::find($num);
        //신고
        $board->increment('report_count');
        //신고 5이상
        if ($board['report_count'] >= 5) {
            $board->update(['category' => 3]);
                return redirect()->route('board.index',['category'=>$category,'page'=>$page,'message'=>'신고했습니다.']);
        } else {//신고 5이하
            if ($category == 1) {
                return back()->with('page', $page)->with('message', '신고했습니다.');
            } else if ($category == 2) {
                return back()->with('page', $page)->with('message', '신고했습니다.');
            }
        }
    }

}