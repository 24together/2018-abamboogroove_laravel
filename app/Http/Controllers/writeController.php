<?php

namespace App\Http\Controllers;

use App\Board;//모델사용
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class writeController extends Controller
{
    public function write(Request $request){
        $board = new board();
        $board->title = $request->title;
        $board->writer = $request->writer;
        $board->content = $request->content_;
        $board->category = $request->category;
        $board->id = $request->id;
        // 값을 받아온다
        $board->save();
        if($request->category ==1){
            $board_name="secret";
        }else if($request->category ==2) {
            $board_name="free";
        }
        return redirect($board_name.'/view/'.$board->num)->with('message','글이 정상적으로 등록되었습니다 !');

    }
    public function delete($num,$category){
        Board::where('num','like',$num)->delete();
        if($category ==1){
            $board_name="secret";
        }else if($category ==2) {
            $board_name="free";
        }
        return redirect($board_name.'/board');
    }
    public function modify(Request $request,$num){
        $title = $request->title;
        $content = $request->content_;
        if($request->category ==1){
            $category = "secret";
        }else if($request->category ==2){
            $category = "free";
        }

        Board::where('num',$num)->update(['title'=>$title,'content'=>$content]);
        return redirect($category.'/view/'.$num)->with('message','글 수정을 하였습니다.');
    }
    //////memberboard///////////////////////
    public function myBoard($id){
        //페이지 네이션 할 값을 부여한 후 내림차순으로 보이도록
        $msgs = Board::where('id','like',$id)->orderBy('num', 'desc')->paginate(5);
        return view('member_board', compact('msgs'));
    }
    public function myBoardDelete(Request $request){
        $id = $request->id;
        $msgs = Board::where('id','like',$id)->orderBy('num', 'desc')->paginate(5);
        $check_list = $request->check_list;
        foreach($check_list as $num){
            Board::where('num',$num)->delete();

        }
        return redirect('mywriting/'.$id);
    }
    /////secretboard//////////////////////
    public function secretWrite(Request $request){
        return view('secretboard.secret-write-form');
    }
    public function secretBoard(){
        //페이지 네이션 할 값을 부여한 후 내림차순으로 보이도록
        $msgs = Board::where('category','like','1')->orderBy('num', 'desc')->paginate(5);
        return view('secretboard.secret-board', compact('msgs'));
    }
    public function secretModify($num){
        $msg = Board::find($num);
        return view('secretboard.secret-modify-form', ['msg' => $msg]);
    }
    /////freeboard//////////////////////
    public function secretView($num){
       //난수 출력
        $ran = mt_rand(1, 3);
        //조회수 증가
        $board = Board::find($num);
        $board->increment('hits');
        $board->save();
       //해당 뷰 보여줌 
        $msg = Board::find($num);
        return view('secretboard.secret-view', ['msg' => $msg],['ran'=>$ran]);
    }
    public function freeWrite(){
        return view('freeboard.free-write-form');
    }
    public function freeBoard(){
       //페이지네이션
        $msgs = Board::where('category','like','2')->orderBy('num', 'desc')->paginate(5);
        return view('freeboard.free-board',compact('msgs'));
    }
    public function freeView($num){
       //조회수 증가
        $board = Board::find($num);
        $board->increment('hits');
        $board->save();
       //해당 뷰 보여줌 
        $msg = Board::find($num);
        return view('freeboard.free-view',['msg'=>$msg]);
    }
    public function star(Request $request,$num,$category){
        $board = Board::find($num);
        $request_star = $request->star;
        $board->increment('stars',"$request_star");
        $board->increment('setstar');
        $board->save();

        if($category==1) {
            return redirect('/secret/view/'.$num)->with('message','별점 주기 완료');
         }else if($category==2){
            return redirect('/free/view/'.$num);
        }
    }
    ///smarteditor///
    public function summernote(Request $request){
        $detail=$request->content_;

        $dom = new \domdocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);

            $data = base64_decode($data);
            $image_name= "/upload/".time().$k.'.png';
            $path = public_path() . $image_name;

            file_put_contents($path, $data);

            $img->removeattribute('src');
            $img->setattribute('src', $image_name);
        }

        $detail = $dom->savehtml();
        $board = new board();
        $board->title = $request->title;
        $board->writer = $request->writer;
        $board->category = $request->category;
        $board->id = $request->id;
        $board->content = $detail;
        $board->save();
        if($request->category ==1){
            $board_name="secret";
        }else if($request->category ==2) {
            $board_name="free";
        }
        return redirect($board_name.'/view/'.$board->num)->with('message','글이 정상적으로 등록되었습니다 !');

    }


}
