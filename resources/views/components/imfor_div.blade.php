<!--로그인 회원 정보-->
<div class="imfor-div" style="align-self: flex-start;">
    <img src="{{asset('img/member_image.png')}}" width="200px"><br>
    @if(\Auth::check())
    {{\Auth::user()['name']}}님의 대나무숲<br>
    ID : {{\Auth::user()['email']}}<br>
    <div class="span">
        <span><img src="{{asset('img/bamboo2.png')}}" width="20px"></span>
        <span>나의 죽순 : {{\Auth::user()['write_count']}}</span>
    </div>
    <br>
    <!--내가 쓴 글-->
    <div class="span">
   <span>
       <a href="{{url('/mywriting/'.\Auth::user()['id'])}}">내가 쓴 글</a>&nbsp;&nbsp;
   </span>
   <span>
        <form action="{{route('logout')}}" method="post" style="display:inline-block" >
            @csrf
            <input type="submit" class="form-control" value="로그아웃">
        </form>
   </span>
    </div>
    @else
    당신의 대나무숲을 만드세요<br>
        <input type ="button" class="form-control" style="display:inline-block" value=" login " onclick="location.href='{{url('member/login')}}'">
        <input type="button" class="form-control" style="display:inline-block" value=" Sign Up " onclick="location.href='{{url('member/join')}}'">
    @endif
</div>