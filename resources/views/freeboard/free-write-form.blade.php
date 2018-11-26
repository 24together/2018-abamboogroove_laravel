@extends('default-form')
@section('title')
    자유 게시판
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
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script src="lang/summernote-ko-KR.js"></script>

    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                lang:'ko-KR'
            });

        });
    </script>
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

                <div class="panel">
                    <img src="{{asset('img/free_logo.png')}}" width="120px">
                    <p>사람들과 자유롭게 이야기 해 보세요.</p>
                </div>
                <form action="{{route('summernotePersist')}}" method="post">
                    @csrf
                    <!--카테고리 판별-->
                        <input name="category" value="2" hidden>
                        <!--유저 아이디 넘기기-->
                        <input name="id" value="{{\Auth::user()["email"]}}" hidden>
                    <div>
                        <!--<form action="write.php" method="post">-->
                        <div class="form-group">
                           <span class="span" style="width:20%">
                                <label for="title">제목: </label>
                            </span>
                            <span class="span" style="width:70%">
                                <input type="text" id="title" name="title" class="form-control" required>
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
                                <textarea class="summernote" name="content_" row="8" >
                                </textarea>

                            </span>
                        </div>
                        <div class="form-group">
                            <span class="span">
                                <button class="btn btn-light" type="submit" >공유하기</button>
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
