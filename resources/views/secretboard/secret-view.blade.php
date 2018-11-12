@extends('default-form')

@section('title')
    익명 게시판
@endsection

@section('form')
    LoginForm
@endsection
@section('nav_bar')
    @include('components.navbar1')
@endsection
@section('style1')
    @include('components.style1')
@endsection
@section('main_div')
    view-div
@endsection
@section('content')

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
                   <p><?php //if($msg["id"]==$_SESSION["uid"]){
                       //echo $msg["writer"]; }
                       //else{ echo "익명"; }?>

                       {{ $msg-> writer}}님의 대나무숲</p>
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
                               <span><img src="{{asset('img/star2.png')}}" width="25px"></span>
                               <?php
                               }else{
                               ?>
                               <span><img src="{{asset('img/star.png')}}" width="25px"></span>
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
                       <p><?=$msg["content"]?></p>
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
                                                <img width="15px" src="{{asset('img/thumbs-up.png')}}" onclick="errorMsg('자신의 글에는 좋아요를 할 수 없습니다')">
                                                <?php
                                                //                                                }else{
                                                //                                            ?><!--    -->

                                                <a href='../thumb-up.php?cn=1&num=<?php //echo $cmsg["num"]?>&content=<?php //echo $msg["Num"]?>'><img width="15px" src="{{asset('img/thumbs-up.png')}}"></a>

                                                <span class="span"><p><b>좋아요 <?php// $cmsg["good"]?></b>&nbsp;&nbsp;</p></span>
                                                <!--댓글 단 날짜-->
                                            </span>
                                        </div>
                                  </div>
                                  <p><?php //$cmsg["comment"]?></p>
                          </div>
                   <?php //  endforeach; ?>
                     </div>

            </span>

@endsection

@section('footer')
    @include('footer')
@endsection