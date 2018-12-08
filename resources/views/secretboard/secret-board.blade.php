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
    board-main-div
@endsection
@section('container_style')
    @include('components.container_style')
@endsection
@section('imfor_div')
    @include('components.imfor_div')
@endsection
@section('head')
<!--검색 스크립트-->
    <script>
        function searchBtn(page) {
            var searchValue = document.getElementById('inputState').value;
            var search = document.getElementById('inputText').value;
            page = 1;
            var url = 'board?search=' + search + '&range=' + searchValue + '&page=' + page+'&category=1';

            location.href = url;
        }
    </script>
@endsection
@section('content')
    <!--메세지-->
        @include('components.message')
    <!--로고, 설명-->
        <div class="panel" style="text-align:center">
            <img src="{{asset(('img/logo5.png'))}}" width="150px">
        </div>
        <p style="text-align:center">사람들의 이야기에 귀기울여 보세 요.</p>
        @if(\Auth::check())<!--로그인 한 경우-->
        <div class="span" style="margin-bottom:20px; text-align:center">
            <span><img src="{{asset('img/bamboo2.png')}}" width="20px"></span>
            <span> : {{\Auth::user()["write_count"]}}</span>
            @if(\Auth::user()["write_count"]>0)<!--죽순 1개 이상-->
            <p>죽순을 사용하여 익명 게시글을 써 볼까요?</p>
            @else<!--죽순 0개-->
            <p>죽순이 있으면 익명 게시글을 쓸 수 있어요</p>
            @endif
        </div>
        @endif

        <!--게시판 내용-->
        <div class="container">
            <table class="table table-hover" style="width:680px">

                <tr>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>작성일시</th>
                    <th>조회수</th>
                    <th>별점</th>
                </tr>

                @foreach($msgs as $msg)
                    <tr>
                        @if(isset($search))
                            <td><a href="{{route('board.show',['num'=>$msg->num, 'page'=>$page,'search'=>$search,'range'=>$range])}}">{{$msg->title}}</a></td>
                        @else
                            <td><a href="{{route('board.show',['num'=>$msg->num, 'page'=>$page])}}">{{$msg->title}}</a></td>
                        @endif
                        <!-- 로그인 아이디 유무로 익명 나타낼 지 정하기-->
                        <td>@if (\Auth::user()['email']==$msg->id)
                                {{$msg->writer}}
                            @else 익명</td>
                        @endif
                        <td>{{$msg->created_at}}</td>
                        <td>{{$msg->hits}}</td>
                        <td>

                            <div class = "span">
                                <!--별점으로 나타내기-->
                                <?php
                                    //(별점 수 합/부여한 사람 수) 계산하여 별점 평균 내기
                                if ($msg->stars > 0 && $msg->setstar > 0){
                                    $star = $msg->stars /$msg->setstar;
                                }else{
                                    $star = 0;
                                }
                                ?>
                                @for($i=0; $i<5; $i++)
                                @if($i < $star )<!--채워진 별사진-->
                                <span><img src="{{asset('img/star2.png')}}" width="25px"></span>
                                @else<!--빈 별사진-->
                                <span><img src="{{asset('img/star.png')}}" width="25px"></span>
                                @endif
                                @endfor
                            </div>

                        </td>
                        @endforeach
            </table>
        </div>
        <p style="text-align:right">댓글에 좋아요가 5개 달리면 죽순 한개를 얻을 수 있어요.
            <!--검색폼-->
            @include('components.search')
@endsection
@section('pagination')
    @include('components.pagination')
@endsection
@section('footer')
    @include('footer')
@endsection