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
@section('head')

    <script type="text/javascript">
        function processDelete() {//삭제 확인
            result = confirm("Are you sure?");
            if(result) {
                location.href="{{url('delete/'.$msg->num)}}";
            }
        }
        function processReport(){//신고 확인
            result = confirm("Are you sure?");
            if(result) {
                    location.href="{{url('report/'.$msg['num'].'/1/1')}}";
            }
        }
        function errorMsg(message){//별점 에러 표시
            alert(message);
        }
    </script>
@endsection
@section('main_div')
    view-div
@endsection
@section('content')
    <!--메세지-->
    @include('components.message')
    <!--로고, 설명-->
        <div class="panel">
            <img src="{{asset('img/logo5.png')}}" width="150px">
            <p>사람들의 이야기에 귀기울여 보세요.</p>
        </div>
        <div class="content" style="display:flex;flex-flow:wrap;">
               <div style="margin-top:0px;">
                   <img src="{{asset('img/view'.$ran.'.png')}}" width="350px">
               </div>
               <div style="margin-left:20px; margin-right:10px;width:58%;overflow:scroll; height:400px">
                   <h5>{{$msg["title"]}}</h5>
                   <p>
                <!--본인이 글이 아닌 경우 익명 처리-->
                        @if($msg["id"]==\Auth::user()["email"])
                       {{ $msg-> writer}}님의 대나무숲
                        @else 익명
                        @endif
                   </p>
                   <br>
                <!--별점처리-->
                    <div align="right">
                        <form id="AjaxForm" action="{{url('star_up/'.$msg["num"].'/1 ')}}" method="post">
                        @include('components.star_up')
                        </form>
                    </div>
                <!--게시글 -->
                   <div style="height:auto;width:100% ;border: 0px solid gray;overflow:visible">
                       <p>{{$msg["content"]}}</p>
                   </div>
               <!--버튼-->
                   <div align="right">
                       @if(isset($search))
                           <input type="button" onclick="location.href='{{route('board.index',['category'=>1,'page'=>$page,'search'=>$search,'range'=>$range])}}'"  class="btn btn-light" value="목록보기">
                       @else
                           <input type="button" onclick="location.href='{{route('board.index',['category'=>1,'page'=>$page])}}'"  class="btn btn-light" value="목록보기">
                       @endif
                       @if(\Auth::user()["email"]==$msg->id)
                           <input type="button"  class="btn btn-light" onclick="location.href='{{route('board.edit',['num'=>$msg->num,'page'=>$page])}}'" value="수정" >

                           <input type="button"
                               onclick="processDelete()"
                               class="btn btn-light" value="삭제하기">
                       @endif
                   <!--신고-->
                       <span style="display:inline-block">
                            @csrf
                            <input type="submit"  onclick="processReport()" class="btn btn-light" value="신고">
                       </span>
                   </div>
                    <br>
                   <!--댓글-->
                   @include('components.comment')
               </div>
        </div>
@endsection

@section('footer')
    @include('footer')
@endsection