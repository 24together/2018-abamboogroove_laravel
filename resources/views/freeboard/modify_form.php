<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>대나무숲::글작성</title>
    <!-- include libraries(jQuery, bootstrap) -->
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
        <link href="../stylesheet.css" rel="stylesheet">
        <!-- include summernote css/js -->
        <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
        <link rel="shortcut icon" href="../img/favicon.ico">
        
</head>
<?php
    require_once("../MemberDao.php");
    require_once("../tools.php");
    require_once("../board/BoardDao.php");
    
    $num = requestValue("num");
    
    session_start();
    
    $uid=isset($_SESSION["uid"])?$_SESSION["uid"]:"";
    
    $mdao = new MemberDao();
    $member = $mdao->getMember($uid);
        /*디비에서 찾아보기*/
        if(!$member){
            errorBack("[$uid] 로그인 해주세요.");
            exit();
        }
    
    $dao = new BoardDao();
    $msg = $dao->getMsg(2,$num);
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
     <!--게시판 내용-->

       <div class="container" style=" margin-top:50px ">
   <div class="login-form">
    <div class="board-main-div">
        <div class="panel">
       <img src="../img/free_logo.png" width="120px">
       <p>수정하기 페이지입니다.</p>
       </div>   
        <form action="./modify.php" method="post">
                  <input type="text" name="num" 
                            value="<?= $msg["Num"] ?>" readonly
                            hidden>
                   <div>
                    <!--<form action="write.php" method="post">-->
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
                            <span name="name" class="span" style="width:70%">
                                <input type="text" class="form-control" name="writer" readonly value="<?= $msg["writer"] ?>">
                            </span>
                        </div>

                        <div class="form-group">
                            <span class="span" style="width:20%">
                                <label for="content">내용</label>
                            </span>
                            <span name="content" class="span" style="width:70%">
                                <textarea class="summernote" name="content" row="8" >
                                    <?=$msg["content"] ?>
                                </textarea>

                            </span>
                        </div>
                        <div class="form-group">
                            <span class="span">
                                <button class="btn btn-light" type="submit" >수정하기</button>
                            </span>
                            <span class="span">
                                <button class="btn btn-light" type="button" onclick="location.href='Board.php'" >목록보기</button>
                            </span>
                        </div>
                      </div> 
                      </form>

                      </div>
           </div>

    </div>
    <?php require_once("../footer.php");?>
    <script>
            $(function (){/*jquery의 onload함수. 페이지가 그려지고 난 후에 실행 */
                $('.summernote').summernote({
                height:350,
                minHeight:null,
                maxHeight:null,
                focus:true,
                placeholder: "testMessage",
                callbacks:{onImageUpload:function(image){
                    editor=$(this); 
                    uploadImageContent(image[0],editor);
                }}
                });
                function uploadImageContent(image,editor){
                    var data = new FormData();
                    data.append("image",image);
                    $.ajax({
                        data:data,
                        type:"post",
                        url:"./image_upload.php",
                        cache:false,
                        contentType:false,
                        processData:false,
                        success:function(url){
                            var image = $('<img>').attr('src',url);
                            $(editor).summernote("insertNode",image[0]);
                            
                        },
                        error:function(data){
                            console.log(data);                            
                        }
                        
                    });
                }
            });
        </script>    
</body>
</html>