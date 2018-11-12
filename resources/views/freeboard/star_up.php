<?php

    require_once("../tools.php");
    require_once("../board/BoardDao.php");

    session_start();

    $num = requestValue("num");
    $star = requestValue("star");
    

    $dao = new BoardDao();


    $msg = $dao -> getMsg(2,$num);

    if($_SESSION["uid"]==$msg["id"]){
        errorBack("자신의 게시글엔 별점을 줄 수 없습니다.");
    }else if($star>=1){
        $dao->setStars(2,$num,$star);
        okGo("별점을 부여하였습니다.","board.php");
    }else{
        errorBack("별을 선택해주세요");
    }

?>