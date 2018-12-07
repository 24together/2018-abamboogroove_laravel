<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use App\Board;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {//댓글 저장
        $board  = new comment();
        $board->board_num  = $request->board_num;
        $board->writer = $request->writer;
        $board->id = $request->id;
        $board->comment = $request->comment;

        $board->save();

        return back();
    }

    public function thumb_up($num)
    {//좋아요 버튼
        $comment = Comment::find($num);
        $comment->increment('like');
        //댓글에 좋아요가 5개 되면 write_count제공
        if($comment->like ==5){
            User::where('email','like',$comment->id)->increment('write_count');
        }

        return back();
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function delete($num){
        //게시글 삭제
        $board = Comment::where('num',$num);
        $board->delete();

        return back();
    }

}
