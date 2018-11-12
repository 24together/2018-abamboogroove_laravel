<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>대나무숲::게시판</title>
        @yield('style1')
<!--          --><?php //require_once("../style.php");?>
          <style>
        
        
        </style>
          
    </head>
    <?php
//        require_once("../MemberDao.php");
//        require_once("../tools.php");
//
//
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
//
    
    ?>
    <body id = "LoginForm">
<!--상단바-->
        <nav class="navbar navbar-expand-sm bg-white navbar-white">
          <!-- Brand/logo -->
          <a class="navbar-brand" href="{{asset('/')}}"style="color:gray">a bamboo grove</a>

          <!-- Links -->
          <ul class="navbar-nav">
            <li class="nav-item" >
              <a class="nav-link" href="{{asset('/')}}" style="color:gray">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{asset('/secret/write')}}"style="color:gray">글쓰기</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"style="color:gray"></a>
            </li>
          </ul>
        </nav>

      <div class="container" style=" margin-top:50px ">
   <div class="login-form" style="text-align:left">
    <div class="board-main-div" >
       
        <div class="panel" style="text-align:center">
       <img src="../img/logo5.png" width="150px">
       </div>
       <p style="text-align:center">사람들의 이야기에 귀기울여 보세요.</p>
       <div class="span" style="margin-bottom:20px">
          <span><img src="{{asset('img/bamboo2.png')}}" width="20px"></span>
          <span> : <?php //$member["write_count"]?></span>
          <?php
//           if($member["write_count"]>0){
        ?>
               <p>죽순을 사용하여 익명 게시글을 써 볼까요?</p>
            
           <?php
//           } else{
            ?>
                <p>죽순이 있으면 익명 게시글을 쓸 수 있어요</p>
            <?php              
//               }
           ?>
       </div>

       
<!--게시판 내용-->       
            <div class="container">	
                <table class="table table-hover">

                    <tr>
                        <th>번호</th>	
                        <th>제목</th>
                        <th>작성자</th>
                        <th>작성일시</th>
                        <th>조회수</th>
                        <th>별점</th>
                    </tr>
                <?php
//                    require_once("./BoardDao.php");
//
//                    $Bdao = new BoardDao();
//
//                    $page = requestValue("page");
//                        if($page<1)$page = 1;
//                        $startRecord= ($page-1)*6;
//                    $msgs = $Bdao->getPageMsgs(1,$startRecord, 6);
//

                ?> 
<!--별저으로 나타내기--> 
<!--                               -->
<!--                --><?php //foreach($msgs as $msg) :
//
//                 ?><!--   -->
<!--                    <tr>-->
<!--                        <td>--><?//= $msg["Num"] ?><!-- </td>			   -->
<!--                        <td><a href="view.blade.php?num=--><?//=$msg["Num"] ?><!--">--><?//= $msg["title"]?><!--</a></td>-->
<!--                        <td>-->
<!--                            --><?php //if($msg["id"]==$_SESSION["uid"]){
//                            echo $msg["writer"]; }
//                            else{ echo "익명"; }?><!--  -->
<!--                        </td>-->
<!--                        <td>--><?//= $msg["regtime"] ?><!-- </td>-->
<!--                        <td>--><?//= $msg["hits"] ?><!-- </td>-->
<!--                        <td>-->
<!--                        <div class="span">-->
<!--                --><?php //
//                        if ($msg["stars"]>0 && $msg["setstar"]>0){
//                            $star = $msg["stars"]/$msg["setstar"];
//                        }else{
//                            $star = 0;
//                        }
//                        for($i=0; $i<5; $i++){
//
//                        if($i < $star ){
//                ?>
<!--                       <span><img src="../img/star2.png" width="25px"></span>-->
<!--                --><?php
//                        }else{
//                ?>
<!--                        <span><img src="../img/star.png" width="25px"></span>-->
<!--                --><?php
//                        }
//
//                    }?><!--</div></td>-->
<!--                    </tr>-->
<!--                --><?php //endforeach ?><!--	-->
                </table>	    
                </div>
                            <?php
//                $numPageLinks = 10; // 한 페이지에 출력할 페이지 링크의 수
//                $numMsgs = 6; // 한 페이지에 출력할 게시글 수
//                $startPage = floor(($page-1)/$numPageLinks)*$numPageLinks+1;
//                $endPage = $startPage + ($numPageLinks-1);
//                $count = $Bdao->getTotalCount(1); // 전체 게시글 수
//                $totalPages = ceil($count/$numMsgs);
//                if($endPage > $totalPages)
//                    $endPage = $totalPages;
//            ?>
<!--              <nav aria-label="...">-->
<!--                  <ul class="pagination">-->
<!--                   --><?php //if($startPage > 1) : ?>
<!--                    <li class="page-item disabled">-->
<!--                      <a class="page-link" href="Board.php?page=--><?//= $startPage - $numPageLinks ?><!--" tabindex="-1">Previous</a>-->
<!--                    </li>-->
<!--                    --><?php //endif ;?>
<!--                    --><?php //for($i=$startPage; $i <= $endPage; $i++) :
//                      if($i==$page) : ?>
<!---->
<!--                    <li class="page-item active">-->
<!--                      <a class="page-link" href="Board.php?page=--><?//=$i ?><!--">--><?//= $i ?><!-- <span class="sr-only">(current)</span></a>-->
<!--                    </li>-->
<!--                    --><?php //else: ?><!-- -->
<!--                    <li class="page-item"><a class="page-link" href="Board.php?page=--><?//= $i ?><!--">--><?//= $i ?><!--</a></li>-->
<!--                    --><?php //
//                      endif ;
//                      endfor ;?>
<!--                      --><?php //if($endPage < $totalPages) : ?>
<!--                    <li class="page-item">-->
<!--                      <a class="page-link" href="Board.php?page=--><?//= $endPage+2?><!--">Next</a>-->
<!--                    </li>-->
<!--                    --><?php //endif ?><!--	-->
<!--                  </ul>-->
<!--                </nav>-->
<!--                <p style="text-align:right">댓글에 좋아요가 5개 달리면 죽순 한개를 얻을 수 있어요.</p>-->
<!--            </div> -->
<!--          </div>-->
                @yield('footer')
        </div>   
    </body>
</html>