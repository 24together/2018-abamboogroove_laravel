@extends('default-form')

@section('title')
    글수정
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
@endsection
@section('main_div')
    board-main-div
@endsection
@section('content')
    <div class="panel">
        <img src="{{asset('img/logo5.png')}}" width="150px">
        <p>수정하기 페이지입니다.</p>
    </div>
    <form action="{{url('/modify/'.$msg["num"])}}" method="post">
        @csrf
        <input name="category" value="1" hidden>
        <input name="id" value="{{$msg["id"]}}" hidden>
        <input type="text" name="num"
               value="{{$msg["num"]}}" readonly
               hidden>
        <div>
            <div class="form-group">
                                   <span class="span" style="width:20%">
                                       <label for="title">제목: </label>
                                   </span>
                <span class="span" style="width:70%">
                                       <input type="text" id="title" name="title" class="form-control" value="{{$msg["title"]}}" required>
                                   </span>
            </div>
            <div class="form-group">
                                   <span class="span" style="width:20%">
                                       <label for="writer">작성자: </label>
                                   </span>
                <span name="writer" class="span" style="width:70%">
                                      <input type="text" class="form-control" name="writer" readonly value="{{$msg["writer"]}}">
                                   </span>
            </div>
            <div class="form-group">
                                   <span class="span" style="width:20%">
                                       <label for="content">내용: </label>
                                   </span>
                <span class="span" style="width:70%">
                                       <textarea class="form-control" style="resize:none; overflow:visible;height:400px " cols="50" id="content" name="content_">{{$msg["content"]}}</textarea>
                                   </span>
            </div>
            <div class="form-group">
                                   <span class="span">
                                       <button type="button" class="btn btn-light" onclick="location.href='{{url('secret/board')}}'">목록보기</button>
                                       <input type="submit" class="btn btn-light" value="수정하기">
                                   </span>
            </div>
        </div>
    </form>
@endsection
@section('footer')
    @include('footer')
@endsection