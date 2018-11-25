<!--로그인 회원 정보-->
<div class="imfor-div" style="align-self: flex-start;">
    <img src="{{asset('img/member_image.png')}}" width="200px"><br>
    {{\Auth::user()['name']}}님,<br>
    ID : {{\Auth::user()['name']}}<br>
    <div class="span">
        <span><img src="{{asset('img/bamboo2.png')}}" width="20px"></span>
        <span>나의 죽순 : {{\Auth::user()['write_count']}}</span>
    </div>
    <br>
    <!--내가 쓴 글-->
    <a href="{{url('/mywriting/'.\Auth::user()['id'])}}">내가 쓴 글</a>
</div>