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
@section('content')
        <div class="panel">
            <img src="{{asset('img/free_logo.png')}}" width="120px">
            <p>사람들의 이야기에 귀기울여 보세요.</p>
        </div>
        <!--게시판 내용-->
        <div class="content" align="justify">
            <div>
                <h5>{{$msg["title"]}}</h5>
                <p>{{$msg["writer"]}}님의 대나무숲</p>
                <br>
                <div align="right">
                    <form id="Login" action="./star_up.php?num=<?=$num?>&page=<?=$page?>" method="post">

                       <span class="span">
                                <?php
                           if ($msg["stars"]>0 && $msg["setstar"]>0){
                               $star = $msg["stars"]/$msg["setstar"];
                           }else{
                               $star = 0;
                           }
                           ?>
                           @for($i=0; $i<5; $i++){
                           @if($i < $star )
                           <span><img src="{{asset('img/star2.png')}}" width="25px"></span>
                           @else
                           <span><img src="{{asset('img.star.png')}}" width="25px"></span>
                           @endif
                           @endfor
                            </span>
                        <span class="span">
                             <select style="vertical-align:baseline" name="star" class="custom-select mb-3" >

                              <option value="0">별별</option>
                              <option value="1">★☆☆☆☆</option>
                              <option value="2">★★☆☆☆</option>
                              <option value="3">★★★☆☆</option>
                              <option value="4">★★★★☆</option>
                              <option value="5">★★★★★</option>
                            </select>
                        </span>
                        <span class="span">
                        <button type="submit" class="btn btn-success">별점주기</button>
                        </span>
                    </form>
                </div>
                <div style="max-height:450px;width:100% ;border: 1px solid gray; overflow:scroll">
                    {{$msg["content"]}}
                </div>
                <div align="right">
                    <input type="button" onclick="location.href='board.php?page=<?=$page ?>'"  class="btn btn-light" value="목록보기">
                    <?php
/////////////////////////////////////////////////////////////////////
                    if(\Auth::["email"]==$msg["id"]){
                    ?>
                    <button class="btn btn-light" onclick="location.href='modify_form.php?num=<?= $msg["Num"] ?>&page=<?=$page?>'">수정</button>
                    <input type="submit"
                           onclick="processDelete(<?= $msg["Num"] ?>)"
                           class="btn btn-light" value="삭제">
                    <?php } ?>
                </div>
            </div>
        </div>
@endsection
@section('footer')
    @include('footer')
@endsection
