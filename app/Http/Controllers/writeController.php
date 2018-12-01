<?php

namespace App\Http\Controllers;

use App\Board;//모델사용
use Illuminate\Http\Request;

class writeController extends Controller
{

    //////memberboard///////////////////////
    public function myBoard($id,$page){
        //페이지 네이션 할 값을 부여한 후 내림차순으로 보이도록
        $msgs = Board::where('id','like',$id)->orderBy('num', 'desc')->paginate(5);
        return view('member_board', compact('msgs'),['page'=>$page]);
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
        $msg =Board::find($num);

        return view('member-view',compact('msg'),['page'=>$page]);
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
