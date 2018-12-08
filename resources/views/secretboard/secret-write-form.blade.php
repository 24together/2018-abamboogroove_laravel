@extends('default-form')

@section('title')
    글쓰기
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
    <script>
        function processWrite(){
            alert("죽순이 필요합니다. 댓글을 남겨 좋아요를 5개 이상 받아주세요");
        }
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
        <img src="{{asset('img/logo5.png')}}" width="150px">
        <p>이야기를 들려주세요.</p>
    </div>

        <div>
            <form action="{{route('board.store',['page'=>1])}}" method="post">
                @csrf
                <div class="form-group">
                    <!--카테고리 판별-->
                            <input name="category" value="1" hidden>
                    <!--유저 아이디 넘기기-->
                            <input name="id" value="{{\Auth::user()["email"]}}" hidden>
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
                <span  class="span" style="width:70%">
                                <input type="text" id="writer" name="writer" class="form-control" value="{{\Auth::User()['name']}}" readonly>
                            </span>
            </div>

            <div class="form-group">
                            <span class="span" style="width:20%">
                                <label for="content_">내용</label>
                            </span>
                <span  class="span" style="width:70%">
                                <textarea class="form-control" style="overflow:visible; height:400px" cols="50" id="content_" name="content_"></textarea>

                            </span>
            </div>
            <div class="form-group">
                            <span class="span">
                                @if(\Auth::user()['write_count']>0)
                                <button class="btn btn-light" type="submit" >공유하기</button>
                                @else
                                <input type="button" class="btn btn-light" onclick="processWrite()" value="공유하기"/>
                                @endif
                            </span>
                <span class="span">
                                <input type="button" class="btn btn-light" onclick="location.href='{{route('board.index',['category'=>1,'page'=>1])}}'" value="목록보기">
                            </span>
            </div>
            </form>
        </div>
@endsection
@section('footer')
    @include('footer')
@endsection