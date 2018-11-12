<?php
    require_once("../tools.php");
    require_once("../board/BoardDao.php");
    require_once("../MemberDao.php");
    $num = requestValue("num");
    $page = requestValue("page");
    $dao = new BoardDao();
    $dao -> increaseHits(2,$num);
    $msg = $dao -> getMsg(2,$num);

    session_start();
        
        $uid = isset($_SESSION["uid"])?$_SESSION["uid"]:"";
        /*로그인 정보 가져오기*/
        $mdao = new MemberDao();
        $member = $mdao->getMember($uid);
        /*디비에서 찾아보기*/
        if(!$member){
            errorBack("$uid 로그인 해주세요.");
            exit();
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>대나무숲::게시글보기</title>
    <?php require_once("../style.php")?>
    <script>
		function processDelete(num) {
			result = confirm("Are you sure?");
			if(result) {
				location.href="./delete.php?num="+num;
			}
		}
	</script>
</head>
<body id = "FreeForm">
   <!--상단바-->
    <nav class="navbar navbar-expand-sm bg-white navbar-white">
          <!-- Brand/logo -->
          <a class="navbar-brand" href="../main.php"style="color:gray">a bamboo grove</a>

          <!-- Links -->
          <ul class="navbar-nav">
            <li class="nav-item" >
              <a class="nav-link" href="../main.php" style="color:gray">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./board.php"style="color:gray">게시판</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"style="color:gray">제작자</a>
            </li>
          </ul>
        </nav>
    <!--본문-->
       <div class="container" style=" margin-top:50px; text-align:center">
    <div class="view-div">
        <div class="panel">
       <img src="../img/free_logo.png" width="120px">
       <p>사람들의 이야기에 귀기울여 보세요.</p>
       </div>
<!--게시판 내용-->    
        <div class="content" align="justify"> 
           <div>
               <h5><?=$msg["title"]?></h5>
               <p><?=$msg["writer"]?>님의 대나무숲</p>
               <br>
                <div align="right">
                   <form id="Login" action="./star_up.php?num=<?=$num?>&page=<?=$page?>" method="post">

                       <span class="span">
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

                                    }?>
                            </span>
                            <span class="span">
                             <select style="vertical-align:baseline" name="star" class="custom-select mb-3" >

                              <option value="0">별별</option>
                              <option value="1">★☆☆☆☆</option>
                              <option value="2">★★☆☆☆</option>
                              <option value="3">★★★☆☆</option>
                              <option value="4">★★★★☆</option>
                              <option value="5">★★★★★</option>
                            </select>
                        </span>
                        <span class="span">
                        <button type="submit" class="btn btn-success">별점주기</button>
                        </span>
                     </form>
                </div> 
               <div style="max-height:450px;width:100% ;border: 1px solid gray; overflow:scroll">

                       <?=$msg["content"]?>

               </div>
               <div align="right">
                   <input type="button" onclick="location.href='board.php?page=<?=$page ?>'"  class="btn btn-light" value="목록보기">

                  <?php
                        if($uid==$msg["id"]){
                  ?>
                     <button class="btn btn-light" onclick="location.href='modify_form.php?num=<?= $msg["Num"] ?>&page=<?=$page?>'">수정</button>
                    <input type="submit" 
                        onclick="processDelete(<?= $msg["Num"] ?>)"
                    class="btn btn-light" value="삭제">
                  <?php } ?>
                  </div>	
               </div>
            </div>
          </div> 
    </div>
        <?php require_once("../footer.php");?>
</body>
</html>