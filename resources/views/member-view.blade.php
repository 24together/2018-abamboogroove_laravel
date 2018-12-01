@extends('default-form')

@section('title')
    신고글
@endsection

@section('form')
    MemberForm
@endsection
@section('nav_bar')
    <nav class="navbar navbar-inverse" style="border:0px none white">
        <div class="container-fluid" style="background-color:white">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{url('/')}}" style="color:#C592C0">a bamboo grove</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{url('/')}}" style="background-color:#C592C0">Home</a></li>
                <li class="dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#"style="color:#C592C0"
                    >대나무숲<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('board.index',['category'=>1,'page'=>1])}}" style="color:#C592C0">익명게시판</a></li>
                        <li><a href="{{route('board.create',['category'=>1,'page'=>1])}}" style="color:#C592C0">게시글 쓰기</a></li>
                    </ul>
                </li>
                <li class="dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#"style="color:#C592C0"
                    >자유게시판<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('board.index',['category'=>2,'page'=>1])}}" style="color:#C592C0">게시판</a></li>
                        <li><a href="{{route('board.create',['category'=>2,'page'=>1])}}" style="color:#C592C0">게시글 쓰기</a></li>
                    </ul>
                </li>
                <li><a href="./introduce.php"style="color:#C592C0">제작자소개</a></li>
            </ul>
        </div>
    </nav>
@endsection

@section('style1')
    @include('components.style2')
@endsection
@section('head')
    @include('login.login_check')
    <script type="text/javascript">


        function processDelete() {
            result = confirm("Are you sure?");
            if(result) {
                location.href="{{url('delete/'.$msg->num)}}";
            }
        }
        function errorMsg(msg){
            alert(msg);
        }
        function processReport(){
            result = confirm("Are you sure?");
            if(result) {
                @if(isset($page))
                    location.href="{{url('report/'.$msg['num'].'/1/'.$page)}}";
                @else
                    location.href="{{url('report/'.$msg['num'].'/1/1')}}";
                @endif

            }


        }
    </script>
@endsection
@section('main_div')
    board-main-div
@endsection
@section('content')
    <div class="panel">
        <img src="{{asset('img/logo5.png')}}" width="150px">
        <p>신고되어 삭제 된 글입니다.</p>


    </div>
    <!--게시판 내용-->
    <!--1들어갈때마다 사진이 다르게
        2게시글과 댓글이 옆에
        3별점 기능
        4목록보기, 삭제
      -->
    <div class="content">
            <h5>{{$msg["title"]}}</h5>
            <p>
                    {{ $msg-> writer}}님의 대나무숲
            </p>
            <br>
            <div style="height:auto;width:100% ;border: 0px solid gray;overflow:visible">
                <p>{{$msg["content"]}}</p>

            <div align="right">
                <input onclick="location.href='{{url('/mywriting/'.\Auth::user()['email'].'/'.$page)}}'" type="button" class="btn btn-light" value="목록보기">

                    <input type="button"
                           onclick="processDelete()"
                           class="btn btn-light" value="삭제하기">

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

        </div>
    </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection