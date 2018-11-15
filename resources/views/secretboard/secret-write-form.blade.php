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
@section('main_div')
    board-main-div
@endsection
@section('content')
    <div class="panel">
        <img src="{{asset('img/logo5.png')}}" width="150px">
        <p>이야기를 들려주세요.</p>
    </div>

        <div>
            <form action="{{url('/write')}}" method="post">
                @csrf
                <div class="form-group">
                            <input name="category" value="1" hidden>
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
                                <label for="content">내용</label>
                            </span>
                <span  class="span" style="width:70%">
                                <textarea class="form-control" style="overflow:visible; height:400px" cols="50" id="content" name="content"></textarea>

                            </span>
            </div>
            <div class="form-group">
                            <span class="span">
                                <button class="btn btn-light" type="submit" >공유하기</button>
                            </span>
                <span class="span">
                                <button class="btn btn-light" onclick="location.href='board.blade.phpboard.blade.php'" >목록보기</button>
                            </span>
            </div>
            </form>
        </div>
@endsection
@section('footer')
    @include('footer')
@endsection