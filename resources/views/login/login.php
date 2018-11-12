<?php

require_once("tools.php");
require_once("MemberDao.php");

session_start();


$id = requestValue("id");
$pw = requestValue("pw");// 값을 담는다
$pw = requestValue("pw");// 값을 담는다

$mdao = new MemberDao();
$member = $mdao -> getMember($id);//1차원 배열로 리턴해 준다

if($member && $member["pw"] == $pw){

    $_SESSION["uid"] = $id; //로그인 유무를 알기위헤 세션변수 uid에 $id정보를 넣어둔다
    $_SESSION["name"] = $member["name"];//dao를 이용해서 가져온 1차원 배열 안에 name 이라는 커럼 아네 이는 이름을 가져온다는 뜻.
    //echo "로그인 성공";
    $_SESSION["age"] = $member["age"];
    goNow(MAIN_PAGE);

}else{
    //로그인 실패
    errorBack("로그인 실패");
}


?>