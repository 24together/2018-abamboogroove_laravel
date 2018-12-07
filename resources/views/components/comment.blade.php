<!--댓글쓰기-->

    <form action="{{route('comment.store')}}" method="post">

    @csrf
    <input name="board_num" value="{{$msg->num}}" hidden>
    <input name="writer" value="{{\Auth::user()['name']}}" hidden>
    <input name="id" value="{{\Auth::user()['email']}}" hidden>

    <div class="form-group">
        <textarea class="form-control" name="comment" cols="50" rows="2"></textarea>
        <input type="submit" class="btn btn-light" value="덧글등록">
    </div>

</form>
<!--댓글 보기-->
@foreach($msg->comments as $c)
    <div class="container"style="width:100%;text-align:left;border-top: 1px solid aquamarine;">
        <div class="row align-items-start"  >
            <div class="col" style="max-width:20%">
                @if($msg->category==1)
                    @if($c->id==\Auth::user()['email'])
                        {{$c->writer}}
                    @else 익명
                    @endif
                @else
                    {{$c->writer}}
                @endif
            </div>
            <div class="col" style="text-align:right">
                <!--좋아요 누르기-->
                <span class="span">
                    <!--본인의 글, 신고된 글에는 errorBack-->
                    @if(\Auth::user()['email']== $c->id)
                        <img width="15px" src="{{asset('img/thumbs-up.png')}}" onclick="errorMsg('자신의 글에는 좋아요를 할 수 없습니다')">
                    @elseif($msg->category==3)
                        <img width="15px" src="{{asset('img/thumbs-up.png')}}" onclick="errorMsg('신고된 글입니다.')">
                    @else
                        <a href='{{url('thumb_up/'.$c->num)}}'><img width="15px" src="{{asset('img/thumbs-up.png')}}"></a>
                    @endif
                    <span class="span"><p><b>좋아요 {{$c->like}}</b>&nbsp;&nbsp;</p></span>
                    <!--댓글 단 날짜-->
                           <span>{{$c->created_at}}</span>
                    </span>
            </div>
        </div>
        <!--본인 댓글 삭제-->
        <span class="span">
            <p>{{$c->comment}}
            @if($c->id==\Auth::user()['email'])
                  <a href="{{url('comment/delete/'.$c->num)}}"  style="color:red" >x</a>
            @endif
        </span>
    </div>
@endforeach