<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>대나무숲::글작성</title>
    <!-- include libraries(jQuery, bootstrap) -->
        @yield('style2')
        <!-- include summernote css/js -->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
        <link rel="shortcut icon" href="../img/favicon.ico">
</head>
<?php
//    require_once("../MemberDao.php");
//    require_once("../tools.php");
//
//    session_start();
//
//    $uid=isset($_SESSION["uid"])?$_SESSION["uid"]:"";
//
//    $mdao = new MemberDao();
//    $member = $mdao->getMember($uid);
//        /*디비에서 찾아보기*/
//        if(!$member){
//            errorBack("[$uid] 로그인 해주세요.");
//            exit();
//        }
//
//    ?>
<body id = "FreeForm">
   <!--상단바-->
    <nav class="navbar navbar-inverse" style="border:0px none white">
              <div class="container-fluid" style="background-color:white">

                <div class="navbar-header">
                  <a class="navbar-brand" href="../main.php" style="color:gray">a bamboo grove</a>
                </div>
                <ul class="nav navbar-nav">
                  <li><a href="{{url('/')}}"style="color:gray">Home</a></li>
                  <li><a href="{{url('free/write')}}" style="color:gray">글쓰기</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                 </ul>
            </div>
        </nav>
     <!--게시판 내용-->
@yield('content')
</body>
</html>