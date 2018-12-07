@extends('default-form')
@section('title')
    글수정
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
@section('head')
    @include('login.login_check')
    <!--ck에디터 스크립트-->
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
@endsection
@section('main_div')
    board-main-div
@endsection
@section('container_style')
    @include('components.container_style')
@endsection
@section('imfor_div')
    @include('components.imfor_div')
@endsection
@section('content')
    <!--메세지-->
    @include('components.message')
    <!--로고, 설명-->
    <div class="panel">
        <img src="{{asset('img/free_logo.png')}}" width="120px">
        <p>수정하기 페이지입니다.</p>
    </div>
    <form action="{{url('/board/update/'.$msg["num"])}}" method="post">
    @csrf
    <!--카테고리 판별-->
        <input name="category" value="2" hidden>
        <!--유저 아이디 넘기기-->
        <input name="id" value="{{\Auth::user()["email"]}}" hidden>
        <input type="text" name="num" value="{{$msg["num"]}}" readonly hidden>
        <div>
            <div class="form-group">
                <span class="span" style="width:20%">
                     <label for="title">제목: </label>
                 </span>
                <span class="span" style="width:70%">
                     <input type="text" id="title" name="title" class="form-control" value="{{$msg["title"]}}"required>
                </span>
            </div>

            <div class="form-group">
                <span class="span" style="width:20%">
                    <label for="writer">작성자: </label>
                </span>
                <span class="span" style="width:70%">
                     <input type="text" name="writer" class="form-control" value="{{\Auth::user()["name"]}}" readonly>
                </span>
            </div>

            <div class="form-group">
                 <span class="span" style="width:20%">
                     <label for="content">내용</label>
                </span>
                <span name="content_" class="span" style="width:70%">
                    <!--ck에디터-->
                     <textarea name="content_" row="8" id="content">
                          {{$msg["content"]}}
                     </textarea>
                     <script type="text/javascript">
                          CKEDITOR.replace('content', {
                               'filebrowserUploadUrl': '/upload.php'
                          });//public.upload로 이동
                     </script>
                </span>
            </div>
            <!--버튼-->
            <div class="form-group">
                 <span class="span">
                     <button class="btn btn-light" type="submit" >수정하기</button>
                 </span>
                <span class="span">
                    <button class="btn btn-light" onclick="location.href='{{url('/free/board')}}'" >목록보기</button>
                </span>
            </div>
        </div>
    </form>

@endsection

@section('footer')
    @include('footer')
@endsection
