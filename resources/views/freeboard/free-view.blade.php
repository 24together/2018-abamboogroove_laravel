@extends('default-form')
@section('title')
    게시글
@endsection
@section('form')
    FreeForm
@endsection
@section('nav_bar')
    @include('components.navbar2')
@endsection
@section('style1')
    @include('components.style2')
@endsection
@section('main_div')
    view-div
@endsection
@section('head')
    @include('login.login_check')
    <script type="text/javascript">
        function errorMsg(msg){
            alert(msg);
        }
    </script>
    <script>
        function processDelete() {
            result = confirm("Are you sure?");
            if(result) {
                location.href="{{url('delete/'.$msg["num"].'/2')}}";
            }
        }
        @if(isset($message))
            {{$message}}
        @endif
    </script>
@endsection
@section('content')

    <div class="panel">
            <img src="{{asset('img/free_logo.png')}}" width="120px">
            <p>사람들의 이야기에 귀기울여 보세요.</p>
        </div>
        <!--게시판 내용-->
        <div class="content" align="justify">
            <div>
                <h5>{{$msg["title"]}}</h5>
                <p>{{$msg["writer"]}}님의 대나무숲</p>
                <br>
                <div align="right">
                    <form id="AjaxForm" action="{{url('star_up/'.$msg["num"].'/2')}}" method="post">
                    @include('components.star_up')
                    </form>
                </div>
                <div style="min-height:200px;max-height:400px;width:100% ;border: 1px solid gray; overflow:scroll">
                    <?php echo $msg["content"]?>
                </div>
                <div align="right">
                    <span style="display:inline-block">
                        <input type="button" onclick="location.href='{{url('/free/board')}}'"  class="btn btn-light" value="목록보기">
                        @if(\Auth::user()["email"]==$msg["id"])
                        <button class="btn btn-light" onclick="location.href='modify_form.php?num=<?php //echo $msg["Num"] ?>&page=<?php //echp $page?>'">수정</button>
                        <input type="button" onclick="processDelete()" class="btn btn-light" value="삭제">
                    </span>
                    @endif
                    <span style="display:inline-block">
                        <form action="{{url('report/'.$msg['num'].'/2')}}" method="post">
                            @csrf
                            <input type="submit" onclick="location.href='{{url('report/'.$msg['num'].'/2')}}'" class="btn btn-light" value="신고">
                        </form>
                    </span>
                </div>
            </div>
        </div>
@endsection

@section('footer')
    @include('footer')
@endsection
