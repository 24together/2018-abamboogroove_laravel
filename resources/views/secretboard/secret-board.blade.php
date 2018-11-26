
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
@section('content')

        <div class="panel" style="text-align:center">
            <img src="{{asset(('img/logo5.png'))}}" width="150px">
        </div>
        <p style="text-align:center">사람들의 이야기에 귀기울여 보세 요.</p>
        @if(\Auth::check())
        <div class="span" style="margin-bottom:20px; text-align:left">
            <span><img src="{{asset('img/bamboo2.png')}}" width="20px"></span>
            <span> : {{\Auth::user()["write_count"]}}</span>
            @if(\Auth::user()["write_count"]>0)
            <p>죽순을 사용하여 익명 게시글을 써 볼까요?</p>
            @else
            <p>죽순이 있으면 익명 게시글을 쓸 수 있어요</p>
            @endif
        </div>
        @endif

        <!--게시판 내용-->
        <div class="container">
            <table class="table table-hover">

                <tr>
                    <th>제목</th>
                    <th>작성자</th>
                    <th>작성일시</th>
                    <th>조회수</th>
                    <th>별점</th>
                </tr>
            <?php
            //                    require_once("./BoardDao.php");
            //
            //                    $Bdao = new BoardDao();
            //
            //                    $page = requestValue("page");
            //                        if($page<1)$page = 1;
            //                        $startRecord= ($page-1)*6;
            //                    $msgs = $Bdao->getPageMsgs(1,$startRecord, 6);
            //

            ?>
                @foreach($msgs as $msg)
                    <tr>
                        <td><a href="{{url('/secret/view/'.$msg["num"])}}">{{$msg["title"]}}</a></td>
                        <!-- 로그인 아이디 유무로 익명 나타낼 지 정하기-->
                        <td>@if (\Auth::user()['email']==$msg['id'])
                                {{$msg['writer']}}
                            @else 익명</td>
                        @endif
                        <td>{{$msg['created_at']}}</td>
                        <td>{{$msg['hits']}}</td>
                        <td>

                            <div class = "span">
                                <!--별점으로 나타내기-->
                                <?php
                                if ($msg["stars"]>0 && $msg["setstar"]>0){
                                    $star = $msg["stars"]/$msg["setstar"];
                                }else{
                                    $star = 0;
                                }
                                for($i=0; $i<5; $i++){
                                if($i < $star ){
                                ?>
                                <span><img src="{{asset('img/star2.png')}}" width="25px"></span>
                                <?php
                                }else{
                                ?>
                                <span><img src="{{asset('img/star.png')}}" width="25px"></span>
                                <?php
                                }

                                }?>
                            </div>
                        </td>
                        @endforeach
            </table>
        </div>
        <p style="text-align:right">댓글에 좋아요가 5개 달리면 죽순 한개를 얻을 수 있어요.</p>

@endsection
@section('pagination')
    @include('components.pagination')
@endsection
@section('footer')
    @include('footer')
@endsection