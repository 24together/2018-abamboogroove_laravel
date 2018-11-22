
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>대나무숲::@yield('title')</title>
    <!--bootstrap, style-->
    @yield('style1')
<!--delete-->          
    	<script>
		function processDelete(num) {
			result = confirm("Are you sure?");
			if(result) {
				location.href="delete.php?num="+num;
			}
		}
        function errorMsg(msg){
            alert(msg);
        }
	   </script>
	   <style>
           .view-div {
    max-width: 97%;
    min-height: 600px;


  background: #ffffff none repeat scroll 0 0;
  border-radius: 2px;
  margin: 10px auto 30px;

  padding: 50px 70px 70px 71px;

}

    </style>
</head>
<body id = "LoginForm">
<!--상단바-->
        @yield('navbar3')

      <div class="container" style=" margin-top:50px">
   <div class="login-form">
    <div class="view-div">
        <div class="panel">
       <img src="{{asset('img/logo5.png')}}" width="150px">
       <p>사람들의 이야기에 귀기울여 보세요.</p>
       
       
       </div>
<!--게시판 내용-->  
          <!--1들어갈때마다 사진이 다르게 
              2게시글과 댓글이 옆에 
              3별점 기능 
              4목록보기, 삭제
            -->   
            <div class="content" > 
           <span style="float:left; margin-top:0px;" >
               <div>
                    <?php
                        #난수 출력
                        //$ran = mt_rand(1, 3);
                   ?>
                   <img src="{{asset('img/view1.png')}}" width="350px">
               </div>
            </span>
            <span  style="float:right;margin-left:20px; margin-right:10px; width:55% ; ">
               <div style="overflow:scroll; height:400px">
                   <h5><?php //echo $msg["title"]?></h5>
                   <p>
                            {{$msg->writer}}님의 대나무숲</p>
                   <br>
                    <div align="right">
                       <form id="Login" action="star_up.php?num={{$msg["num"]}}&page=<?php //echo $page?>" method="post">
                          
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
                   <div style="height:auto;width:100% ;border: 0px solid gray;overflow:visible">
                       <p><{{$msg->content}}</p>
                   </div>
                   <div align="right">
                       <input onclick="location.href='Board.php?page=<?php //echo $page ?>'" type="button" class="btn btn-light" value="목록보기">
                        
                      <?php
                            //if($uid==$msg["id"]){
                      ?>
                         <button class="btn btn-light" onclick="location.href='modify_form.php?num=<?= $msg["Num"] ?>'">수정</button>
                        <input type="button" 
                            onclick="processDelete(<?= $msg["Num"] ?>)"
                        class="btn btn-light" value="삭제하기">
                      <?php //} ?>
                      </div>	
                        <br>
<!--댓글쓰기-->
                    <form action="../commentWrite.php?num=<?php //echo $num?>&page=<?php //echp $page?>&cn=1" method="post">
                         <div class="form-group">
                            <input type="text" class="form-control-plaintext" id="writer" name="writer" value="<?php //echo $member["name"] ?>" hidden>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="comment" cols="80" rows="2"></textarea>
                            <input type="submit" class="btn btn-light" value="덧글등록">
                        </div>
                                                                                
                   </form>
<!--댓글-->                        
                         <?php
//                            require_once("../CommentDao.php");
//
//                            $cdao = new CommentDao();
//
//                            $cmsgs = $cdao->getManyMsgs(1,$msg["Num"]);
//                            foreach($cmsgs as $cmsg) :
//                          ?>
                              <div class="container"style="text-align:left;border-top: 1px solid aquamarine;">
                                  <div class="row align-items-start"  >
                                        <div class="col" style="max-width:20%">
                                          <?php 
//                                              if($_SESSION["name"]==$cmsg["writer"]){
//                                                  echo $cmsg["writer"];
//                                              }else {echo "익명";}
//                                              ?>
                                        </div>
                                        <div class="col" style="text-align:right">
                                            <!--좋아요 누르기-->    <span class="span">
                            <!--본인의 글에는 errorBack--> 
                                            <?php
//                                                if($_SESSION["uid"]==$cmsg["id"]){
//                                            ?>
                                                <img width="15px" src="../img/thumbs-up.png" onclick="errorMsg('자신의 글에는 좋아요를 할 수 없습니다')">
                                            <?php
//                                                }else{
//                                            ?><!--    -->
                                            
                                            <a href='../thumb-up.php?cn=1&num=<?php //echo $cmsg["num"]?>&content=<?php //echo $msg["Num"]?>'><img width="15px" src="../img/thumbs-up.png"></a>
                                            {{--<?php //} ?>--}}
                                            {{--</span>--}}
                                            <span class="span"><p><b>좋아요 <?php //echo $cmsg["good"]?></b>&nbsp;&nbsp;</p></span>
                                          <?php //echo $cmsg["regtime"]?>
                                        </div>
                                  </div>
                                  <p><?php //$cmsg["comment"]?></p>
                          </div>            
                           <?php //  endforeach; ?>
                     </div>
               
            </span>
        </div>
            </div> 
         </div>
        <p class="botto-text" style="text-align: center">
          영진전문대학교 2WDJ 김민영</p>      
    </div>   
</body>
</html>