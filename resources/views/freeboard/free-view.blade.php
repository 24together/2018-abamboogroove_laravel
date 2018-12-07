@extends('default-form')
@section('title')
    게시글
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
    view-div
@endsection
@section('head')

    <script>
        function processDelete() {//글삭제 확인
            result = confirm("Are you sure?");
            if(result) {
                location.href="{{url('delete/'.$msg->num)}}";
            }
        }
        function processReport() {//글신고 확인
            result = confirm("Are you sure?");
            if (result) {
                    location.href = "{{url('report/'.$msg['num'].'/2/1')}}";
            }
        }
    </script>
@endsection
@section('content')
    <!--메세지-->
    @include('components.message')
    <!--로고, 설명-->
    <div class="panel">
            <img src="{{asset('img/free_logo.png')}}" width="120px">
            <p>사람들의 이야기에 귀기울여 보세요.</p>
        </div>
        <!--게시판 내용-->
        <div class="content" align="justify">
            <div>
                <h5>{{$msg->title}}</h5>
                <p>{{$msg->writer}}님의 대나무숲</p>
                <br>
                <!--별점 기능-->
                <div align="right">
                    <form  action="{{url('star_up/'.$msg["num"].'/2')}}" method="post">
                    @include('components.star_up')
                    </form>
                </div>
                <div style="min-height:200px;max-height:600px;width:100% ;border: 1px solid gray; overflow:scroll">
                    {!! $msg->content !!}
                 </div>
                <br>
                <div align="right">
                    <!--버튼/ 본인 글인 경우 수정 버튼-->
                    <span style="display:inline-block">
                        @if(isset($search))
                            <input type="button" onclick="location.href='{{route('board.index',['category'=>2,'page'=>$page,'search'=>$search,'range'=>$range])}}'"  class="btn btn-light" value="목록보기">
                        @else
                            <input type="button" onclick="location.href='{{route('board.index',['category'=>2,'page'=>$page])}}'"  class="btn btn-light" value="목록보기">
                        @endif
                        @if(\Auth::user()["email"]==$msg->id)
                        <button class="btn btn-light" onclick="location.href='{{route('board.edit',['num'=>$msg->num,'page'=>$page])}}'">수정</button>
                        <input type="button" onclick="processDelete()" class="btn btn-light" value="삭제">
                    </span>
                    @endif
                    <span style="display:inline-block">
                        <input type="button"  onclick="processReport()" class="btn btn-light" value="신고">
                    </span>
                <br>
                </div>
                <div style="max-height:300px;width:100% ;overflow:scroll">
                    <!--댓글-->
                    @include('components.comment')
                </div>
            </div>
        </div>
@endsection

@section('footer')
    @include('footer')
@endsection
