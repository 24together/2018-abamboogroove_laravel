<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>대나무숲::글 수정</title>
</head>

    <?php require_once("../style.php");?>
    
    <?php 
        require_once("../MemberDao.php");
        require_once("BoardDao.php");
        require_once("../tools.php");
    
        $num = requestValue("num");
        session_start();
    
        $uid= isset($_SESSION["uid"])?$_SESSION["uid"]:"";
        
        $mdao = new MemberDao();
        $member = $mdao->getMember($uid);
    
        if(!$member){
            errorBack("[$uid]로그인 해주세요.");
            exit();
        }
    
        $dao = new BoardDao();
        $msg = $dao->getMsg(1,$num);
    ?>
<body id = "LoginForm">    
    <nav class="navbar navbar-expand-sm bg-white navbar-white">
          <!-- Brand/logo -->
          <a class="navbar-brand" href="../main.php"style="color:gray">a bamboo grove</a>

              <!-- Links -->
              <ul class="navbar-nav">
                <li class="nav-item" >
                  <a class="nav-link" href="../main.php" style="color:gray">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"style="color:gray">Link 2</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"style="color:gray">Link 3</a>
                </li>
              </ul>
            </nav>

    <!--게시글-->
            <div class="container" style="margin-top:50px">
               <div class="login-form">
                   <div class="board-main-div">
                       <div class="panel">
                           <img src="../img/logo5.png" width="150px">
                           <p>수정하기 페이지입니다.</p>
                       </div>
                       <form action="modify.php" method="post">
                          <input type="text" name="num" 
                            value="<?= $msg["Num"] ?>" readonly
                            hidden>
                           <div>
                               <div class="form-group">
                                   <span class="span" style="width:20%">
                                       <label for="title">제목: </label>
                                   </span>
                                   <span class="span" style="width:70%">
                                       <input type="text" id="title" name="title" class="form-control" value="<?= $msg["title"] ?>" required>
                                   </span>
                               </div>
                               <div class="form-group">
                                   <span class="span" style="width:20%">
                                       <label for="writer">작성자: </label>
                                   </span>
                                   <span name="writer" class="span" style="width:70%">
                                      <input type="text" class="form-control" name="writer" readonly value="<?= $msg["writer"] ?>">
                                   </span>
                               </div>
                               <div class="form-group">
                                   <span class="span" style="width:20%">
                                       <label for="content">내용: </label>
                                   </span>
                                   <span class="span" style="width:70%">
                                       <textarea class="form-control" style="resize:none overflow:visible;height:400px " cols="50" id="content" name="content"><?= $msg["content"] ?></textarea>
                                   </span>
                               </div>
                               <div class="form-group">
                                   <span class="span">
                                       <button type="button" class="btn btn-light" onclick="location.href='board.php'">목록보기</button>
                                       
                                       <input type="submit" class="btn btn-light" value="수정하기">
                                   </span>
                               </div>
                           </div>
                           </form>
                       
                   </div>
               </div>
                
            </div>
       <?php require_once("../footer.php"); ?>
</body>
</html>