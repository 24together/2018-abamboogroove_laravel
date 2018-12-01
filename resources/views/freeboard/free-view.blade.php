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
    @include('login.login_check')
    <script type="text/javascript">
        function errorMsg(msg){
            alert(msg);
        }
    </script>
    <script>
        function processDelete() {
            result = confirm("Are you sure?");
            if(result) {
                location.href="{{url('delete/'.$msg->num)}}";
            }
        }
        function processReport() {
            result = confirm("Are you sure?");
            if (result) {
                @if(isset($page))
                    location.href = "{{url('report/'.$msg['num'].'/1/'.$page)}}";
                @else
                    location.href = "{{url('report/'.$msg['num'].'/1/1')}}";
                @endif

            }
        }
    </script>
@endsection
@section('content')
    @if (isset($message))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
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
                <div align="right">
                    <form id="AjaxForm" action="{{url('star_up/'.$msg["num"].'/2')}}" method="post">
                    @include('components.star_up')
                    </form>
                </div>
                <div style="min-height:200px;max-height:400px;width:100% ;border: 1px solid gray; overflow:scroll">
                    <?php echo $msg["content"]?>
                </div>
                <div align="right">
                    <span style="display:inline-block">
                        <input type="button" onclick="location.href='{{route('board.index',['category'=>2,'page'=>$page])}}'"  class="btn btn-light" value="목록보기">
                        @if(\Auth::user()["email"]==$msg->id)
                        <button class="btn btn-light" onclick="location.href='{{route('board.update',['category'=>1,'num'=>$msg->num,'page'=>$page])}}'">수정</button>
                        <input type="button" onclick="processDelete()" class="btn btn-light" value="삭제">
                    </span>
                    @endif
                    <span style="display:inline-block">
                        <input type="submit"  onclick="processReport()" class="btn btn-light" value="신고">
                    </span>
                </div>
            </div>
        </div>
@endsection

@section('footer')
    @include('footer')
@endsection
