<?php

namespace App\Http\Controllers;

use App\Board;//모델사용
use Illuminate\Http\Request;


class BoardController extends Controller
{
    public function index(Request $request)
    {
        //페이지네이션
        $category = $request->category;
        $page = $request->page;
        $msgs = Board::where('category', 'like', $category)->orderBy('num', 'desc')->paginate(5);

        if ($category == 1) {
            return view('secretboard.secret-board', compact('msgs'))->with('category', $category)->with('page', $page);
        } else if ($category == 2) {
            return view('freeboard.free-board', compact('msgs'))->with('category', $category)->with('page', $page);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $page = $request->page;
        $category = $request->category;
        if ($category == 1) {
            return view('secretboard.secret-write-form',['page'=>$page]);
        } else if ($category == 2) {
            return view('freeboard.free-write-form',['page'=>$page]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //secretboard
        //난수출력
        $ran = mt_rand(1, 3);
        //페이지 얻기
        $page = $request->page;

        $board = new board();
        $board->title = $request->title;
        $board->writer = $request->writer;
        $board->content = $request->content_;
        $board->category = $request->category;
        $board->id = $request->id;
        // 값을 받아온다
        $board->save();
        $msg = $board;
        $category = $request->category;
        if ($category == 1) {
            return view('secretboard.secret-view', ['msg' => $msg], ['ran' => $ran])->with('category', $category)->with('page', $page);
        } else if ($category == 2) {
            return view('freeboard.free-view', ['msg' => $msg])->with('category', $category)->with('page', $page);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $num)
    {
        //secretboard
        //난수출력
        $ran = mt_rand(1, 3);
        //all board
        //조회수 증가
        $page = $request->page;
        $msg = Board::find($num);
        $msg->increment('hits');
        //해당 뷰 보여줌

        $category = $msg->category;
        if ($category == 1) {
            return view('secretboard.secret-view', ['msg' => $msg], ['ran' => $ran])->with('category', $category)->with('page', $page);
        } else if ($category == 2) {
            return view('freeboard.free-view', ['msg' => $msg])->with('category', $category)->with('page', $page);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($num, Request $request)
    {
        //secretboard
        //난수출력
        $ran = mt_rand(1, 3);

        $page = $request->page;
        $msg = Board::find($num);
        $category = $msg->category;


        if ($category == 1) {
            return view('secretboard.secret-view', ['msg' => $msg], ['ran' => $ran])->with('category', $category)->with('page', $page);
        } else if ($category == 2) {
            return view('freeboard.free-view', ['msg' => $msg])->with('category', $category)->with('page', $page);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($num, Request $request)
    {
        //secretboard
        //난수출력
        $ran = mt_rand(1, 3);
        //all board
        $title = $request->title;
        $content = $request->content_;

        if ($request->category == 1) {
            $category = "secret";
        } else if ($request->category == 2) {
            $category = "free";
        }

        $page = $request->page;

        Board::where('num', $num)->update(['title' => $title, 'content' => $content]);

        $msg = Board::find($num);
        if ($category == 1) {
            return view('secretboard.secret-view', ['msg' => $msg], ['ran' => $ran])->with('category', $category)->with('page', $page)->with('message', '수정을 완료하였습니다');
        } else if ($category == 2) {
            return view('freeboard.free-view', ['msg' => $msg])->with('category', $category)->with('page', $page)->with('message', '수정을 완료하였습니다.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $num)
    {
        $page = $request->page;
        $board = Board::find($num);
        $category = $board['category'];
        $board->delete();

        $msgs = Board::where('category', 'like', $category)->orderBy('num', 'desc')->paginate(5);

        if ($category == 1) {
            return view('secretboard.secret-board', compact('msgs'))->with('category', $category)->with('page', $page)->with('message', '글삭제를 완료하였습니다');
        } else if ($category == 2) {
            return view('freeboard.free-board', compact('msgs'))->with('category', $category)->with('page', $page)->with('message', '글삭제를 완료하였습니다');
        }
    }

    public function star(Request $request, $num, $category)
    {
        $board = Board::find($num);
        $request_star = $request->star;
        $board->increment('stars', "$request_star");
        $board->increment('setstar');
        $board->save();

        $msg = $board;
        if ($msg->category == 1) {
            return redirect()->action('BoardController@show', ['num' => $num])->with('message', '별점부여를 완료하였습니다');
        } else if ($msg->category == 2) {
            return redirect()->action('BoardController@show', ['num' => $num])->with('message', '별점부여를 완료하였습니다');
        }
    }


    public function report($num, $category, $page)
    {
        //secretboard
        //난수출력
        $ran = mt_rand(1, 3);
        //all board
        $board = Board::find($num);

        //신고
        $board->increment('report_count');
        //신고 5이상
        if ($board['report_count'] >= 5) {
            $board->update(['category' => 3]);
            $msgs = Board::where('category', 'like', $category)->orderBy('num', 'desc')->paginate(5);

            if ($category == 1) {
                return view('secretboard.secret-board', compact('msgs'))->with('category', $category)->with('page', $page)->with('message', '신고했습니다');
            } else if ($category == 2) {
                return view('freeboard.free-board', compact('msgs'))->with('category', $category)->with('page', $page->with('message', '신고했습니다.'));
            }
        } else {//신고 5이하
            $msg = $board;
            if ($category == 1) {
                return view('secretboard.secret-view', ['msg' => $msg], ['ran' => $ran])->with('category', $category)->with('page', $page)->with('message', '신고했습니다.');
            } else if ($category == 2) {
                return view('freeboard.free-view', ['msg' => $msg])->with('category', $category)->with('page', $page)->with('message', '신고했습니다.');
            }
        }
    }

}