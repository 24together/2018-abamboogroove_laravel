@extends('default-form')
@section('title')
    나의 게시글
@endsection
@section('form')
    MemberForm
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
@section('content')

    <div class="panel">
        <img src="{{asset('img/free_logo.png')}}" width="120px">
        <p>회원 글 확인</p>
    </div>
    <!--게시판 내용-->
    <div >
        <table class="table table-list-search">
            <tr>
                <th>게시판</th>
                <th>제목</th>
                <th>작성자</th>
                <th>작성일시</th>
                <th>조회수</th>
                <th>별점</th>
            </tr>
            @foreach($msgs as $msg)
                <tr>
                    @if($msg["category"]==1)
                        <td>익명</td>
                        <td><a href="{{url('/secret/view',$msg["num"])}}"><?= $msg["title"]?></a></td>
                    @else($msg["category"]==2)
                        <td>자유</td>
                        <td><a href="{{url('/free/view',$msg["num"])}}"><?= $msg["title"]?></a></td>
                    @endif
                    <td><?= $msg["writer"]?> </td>
                    <td><?= $msg["created_at"] ?> </td>
                    <td><?= $msg["hits"] ?> </td>
                    <td>
                        <div class="span"><!--별저으로 나타내기-->
                            <?php
                            if ($msg["stars"]>0 && $msg["setstar"]>0){
                                $star = $msg["stars"]/$msg["setstar"];
                            }else{
                                $star = 0;
                            }
                            ?>
                            @for($i=0; $i<5; $i++)
                                @if($i < $star )
                                    <span><img src="{{asset('img/star2.png')}}" width="25px"></span>
                                @else
                                    <span><img src="{{asset('img/star.png')}}" width="25px"></span>
                                @endif
                            @endfor
                        </div></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
@section('pagination')
    @include('components.pagination')
@endsection
@section('footer')
    @include('footer')
@endsection
