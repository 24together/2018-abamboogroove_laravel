<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{
    public function main(){
        return view('index');
    }
    public function secret_write(){
//        require_once("MemberDao.php");
//        require_once("tools.php");
//
//        session_start();
//
//        $uid = isset($_SESSION["uid"])?$_SESSION["uid"]:"";
//        /*로그인 정보 가져오기*/
//        $mdao = new MemberDao();
//        $member = $mdao->getMember($uid);
//        /*디비에서 찾아보기*/
//        if(!$member){
//            errorBack("[$uid] 로그인 해주세요.");
//            exit();
//        }
//        return view('write_form')
    }
}
