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
@section('head')
    @include('login.login_check')
    <script type="text/javascript">
        function AjaxCall() {
            var data = $("form[id=AjaxForm]").serialize() ;/*val가 값 읽어 오는 것이긔 */
            $.ajax({
                url : "{{url('star_up/'.$msg["num"].'/1')}}",
                data: data, dataType:"json",
                success : function() { alert(json); },
                error: function() { alert("실패"); } }); }
        function processDelete() {
            result = confirm("Are you sure?");
            if(result) {
                location.href="{{url('delete/'.$msg["num"].'/1')}}";
            }
        }
        function errorMsg(msg){
            alert(msg);
        }
    </script>
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
        <div class="content" style="display:flex;flex-flow:wrap;">
               <div style="margin-top:0px;">
                   <img src="{{asset('img/view'.$ran.'.png')}}" width="350px">
               </div>
               <div style="margin-left:20px; margin-right:10px;width:58%;overflow:scroll; height:400px">
                   <h5>{{$msg["title"]}}</h5>
                   <p>
                        @if($msg["id"]==\Auth::user()["email"])
                       {{ $msg-> writer}}님의 대나무숲
                        @else 익명
                        @endif
                   </p>
                   <br>
                    <div align="right">
                        <form id="AjaxForm" action="{{url('star_up/'.$msg["num"].'/1 ')}}" method="post">
                        @include('components.star_up')
                        </form>
                    </div>
                   <div style="height:auto;width:100% ;border: 0px solid gray;overflow:visible">
                       <p>{{$msg["content"]}}</p>
                   </div>
                   <div align="right">
                       <input onclick="location.href='{{url('/secret/board')}}'" type="button" class="btn btn-light" value="목록보기">
                       @if(\Auth::user()["email"]==$msg["id"])
                       <button class="btn btn-light" onclick="location.href='{{url('/secret/modify/'.$msg["num"])}}'">수정</button>
                        <input type="button"
                               onclick="processDelete()"
                               class="btn btn-light" value="삭제하기">
                       @endif
                      </div>
                        <br>
                   <!--댓글쓰기-->
                    <form action="../commentWrite.php?num=<?php //echo $num?>&page=<?php //echp $page?>&cn=1" method="post">
                         <div class="form-group">
                            <input type="text" class="form-control-plaintext" id="writer" name="writer" value="<?php //echo $login["name"] ?>" hidden>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="comment" cols="50" rows="2"></textarea>
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
                                          @if($msg['id']==\Auth::user()['email'])
                                              {{$msg['writer']}}
                                          @else 익명
                                          @endif
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
        </div>
@endsection

@section('footer')
    @include('footer')
@endsection