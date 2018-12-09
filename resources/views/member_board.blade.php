@extends('default-form')
@section('title')
    나의 게시글
@endsection
@section('form')
    MemberForm
@endsection
@section('style1')
    @include('components.style2')
@endsection
@section('head')
    <!--검색 스크립트-->
    <script>
        function searchBtn(page) {
            var searchValue = document.getElementById('inputState').value;
            var search = document.getElementById('inputText').value;
            var url = 'http://www.abamboogrove.site/mywriting/{{\Auth::user()['email']}}/1?search=' + search + '&range=' + searchValue + '&page=' + page;

            window.location.href = url;
        }
    </script>
@endsection
@section('nav_bar')
    <nav class="navbar navbar-inverse" style="border:0px none white">
        <div class="container-fluid" style="background-color:white">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{url('/')}}" style="color:#C592C0">a bamboo grove</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{url('/')}}" style="background-color:#C592C0">Home</a></li>
                <li class="dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#"style="color:#C592C0"
                    >대나무숲<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('board.index',['category'=>1,'page'=>1])}}" style="color:#C592C0">익명게시판</a></li>
                        <li><a href="{{route('board.create',['category'=>1,'page'=>1])}}" style="color:#C592C0">게시글 쓰기</a></li>
                    </ul>
                </li>
                <li class="dropdown" ><a class="dropdown-toggle" data-toggle="dropdown" href="#"style="color:#C592C0"
                    >자유게시판<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('board.index',['category'=>2,'page'=>1])}}" style="color:#C592C0">게시판</a></li>
                        <li><a href="{{route('board.create',['category'=>2,'page'=>1])}}" style="color:#C592C0">게시글 쓰기</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
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
        <p>회원 글 확인</p>
    </div>
    <!--게시판 내용-->
    <div >
        <form action="{{url('member/board/delete/'.$page)}}" method="post">
            @csrf
            <input name="id" value="{{\Auth::user()['email']}}" hidden>
        <table class="table table-list-search">
            <tr>
                <td></td>
                <th>게시판</th>
                <th>제목</th>
                <th>작성자</th>
                <th>작성일시</th>
                <th>조회수</th>
                <th>별점</th>
            </tr>
            @foreach($msgs as $msg)
                <tr>
                    <td><input type="checkbox" name="check_list[]"  value="{{$msg["num"]}}"></td>
                    @if($msg["category"]==1)
                        <td>익명</td>
                        <td><a href="{{route('board.show',['num'=>$msg->num,'page'=>$page])}}"><?= $msg["title"]?></a></td>
                    @elseif($msg["category"]==2)
                        <td>자유</td>
                        <td><a href="{{route('board.show',['num'=>$msg->num,'page'=>$page])}}"><?= $msg["title"]?></a></td>
                    @elseif($msg["category"]==3)
                        <td>신고</td>
                        <td><a href="{{url('/mywriting/view/'.$msg["num"].'/'.$page)}}"><?= $msg["title"]?></a></td>
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
            <div style="text-align:right">
            <input type="submit" class="btn btn-info" value="선택 삭제">
            </div>
        </form>
    </div>
    <!--검색기능-->
    @include('components.search')
@endsection
@section('pagination')
    <div class = text-center">
        {{ $msgs->links() }}
    </div>
@endsection
@section('footer')
    @include('footer')
@endsection
