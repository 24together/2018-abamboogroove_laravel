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
            var url = 'board?search=' + search + '&range=' + searchValue + '&page=' + page+'&category=2';

            location.href = url;
        }
    </script>
@endsection
@section('content')
    <!--메세지-->
    @include('components.message')
    <!--로고, 설명-->
            <div class="panel">
                <img src="{{asset('img/free_logo.png')}}" width="120px">
                <p>사람들과 자유롭게 이야기 해 보세요.</p>
            </div>
            <!--게시판 내용-->
            <div >
                <table class="table table-list-search">
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
                        <td>{{$msg->writer}} </td>
                        <td>{{$msg->created_at}} </td>
                        <td>{{$msg->hits}} </td>
                        <td>
                            <div class="span">
                                <!--별저으로 나타내기-->
                                <?php
                                //(별점 수 합/부여한 사람 수) 계산하여 별점 평균 내기
                                if ($msg->stars >0 && $msg->setstar >0){
                                    $star = $msg-> stars /$msg->setstar;
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
                                </div></td>
                    </tr>
                    @endforeach
                </table>
            </div>
            @include('components.search')
@endsection
@section('pagination')
    @include('components.pagination')
@endsection
@section('footer')
    @include('footer')
@endsection
