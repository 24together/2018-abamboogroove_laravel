

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>대나무숲::게시판</title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
              <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
              <link href="../stylesheet.css" rel="stylesheet">
            <link rel="shortcut icon" href="../img/favicon.ico">
          <style>
    body#FreeForm{ background-image:url("../img/background2.png"); background-repeat:no-repeat; background-position:center;

}</style>
    </head>
    <?php
        require_once("../MemberDao.php");
        require_once("../tools.php");
        
        session_start();
        
        $uid = isset($_SESSION["uid"])?$_SESSION["uid"]:"";
        /*로그인 정보 가져오기*/
        $mdao = new MemberDao();
        $member = $mdao->getMember($uid);
        /*디비에서 찾아보기*/
        if(!$member){
            errorBack("로그인 해주세요.");
            exit();
        }
    
    
    ?>
    <body id = "FreeForm">
<!--상단바-->
<nav class="navbar navbar-inverse" style="border:0px none white">
              <div class="container-fluid" style="background-color:white">

                <div class="navbar-header">
                  <a class="navbar-brand" href="../main.php" style="color:gray">a bamboo grove</a>
                </div>
                <ul class="nav navbar-nav">
                  <li><a href="../main.php"style="color:gray">Home</a></li>
                  <li><a href="write_form.blade.php" style="color:gray">글쓰기</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                </ul>
            </div>
        </nav>
      <div class="container" style=" margin-top:50px ">
   <div class="login-form">
    <div class="board-main-div">
        <div class="panel">
       <img src="../img/free_logo.png" width="120px">
       <p>사람들과 자유롭게 이야기 해 보세요.</p>
       </div>
<!--게시판 내용-->       
            <div >	
                <table class="table table-list-search">
                    <tr>
                        <th>번호</th>	
                        <th>제목</th>
                        <th>작성자</th>
                        <th>작성일시</th>
                        <th>조회수</th>
                        <th>별점</th>
                    </tr>
                <?php
                    require_once("../board/BoardDao.php");

                    $Bdao = new BoardDao();
                    
                    $page = requestValue("page");
                        if($page<1)$page = 1;
                        $startRecord= ($page-1)*6;
                    $msgs = $Bdao->getPageMsgs(2,$startRecord, 6);
 

                ?> 
<!--별저으로 나타내기--> 
                               
                <?php foreach($msgs as $msg) : 
                    
                 ?>   
                    <tr>
                        <td><?= $msg["Num"] ?> </td>			   
                        <td><a href="view.php?num=<?=$msg["Num"] ?>"><?= $msg["title"]?></a></td>
                        <td><?= $msg["writer"]?> </td>
                        <td><?= $msg["regtime"] ?> </td>
                        <td><?= $msg["hits"] ?> </td>
                        <td>
                        <div class="span">
                <?php       
                        if ($msg["stars"]>0 && $msg["setstar"]>0){
                            $star = $msg["stars"]/$msg["setstar"];
                        }else{
                            $star = 0;
                        }
                        for($i=0; $i<5; $i++){
                        
                        if($i < $star ){
                ?>
                       <span><img src="../img/star2.png" width="25px"></span>
                <?php
                        }else{
                ?>
                        <span><img src="../img/star.png" width="25px"></span>
                <?php
                        }
                        
                    }?></div></td>
                    </tr>
                <?php endforeach ?>	
                </table>	    
                </div>
                            <?php
                $numPageLinks = 10; // 한 페이지에 출력할 페이지 링크의 수 
                $numMsgs = 6; // 한 페이지에 출력할 게시글 수 
                $startPage = floor(($page-1)/$numPageLinks)*$numPageLinks+1;
                $endPage = $startPage + ($numPageLinks-1);
                $count = $Bdao->getTotalCount(2); // 전체 게시글 수 
                $totalPages = ceil($count/$numMsgs);
                if($endPage > $totalPages)
                    $endPage = $totalPages;
            ?>
              <nav aria-label="...">
                  <ul class="pagination">
                   <?php if($startPage > 1) : ?>
                    <li class="page-item disabled">
                      <a class="page-link" href="board.php?page=<?= $startPage - $numPageLinks ?>" tabindex="-1">Previous</a>
                    </li>
                    <?php endif ;?>
                    <?php for($i=$startPage; $i <= $endPage; $i++) :
                      if($i==$page) : ?>

                    <li class="page-item active">
                      <a class="page-link" href="board.php?page=<?=$i ?>"><?= $i ?> <span class="sr-only">(current)</span></a>
                    </li>
                    <?php else: ?> 
                    <li class="page-item"><a class="page-link" href="board.php?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php 
                      endif ;
                      endfor ;?>
                      <?php if($endPage < $totalPages) : ?>
                    <li class="page-item">
                      <a class="page-link" href="board.php?page=<?= $endPage+2?>">Next</a>
                    </li>
                    <?php endif ?>	
                  </ul>
                  </nav>
            </div> 

                
          </div>
          <p class="botto-text" style="text-align: center"> 영진전문대학교 2WDJ 김민영</p>
      
        </div>   
    </body>
</html>