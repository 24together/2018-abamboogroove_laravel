<!--별점 증가-->
    @csrf
    <span class="span">
        <!--별저으로 나타내기-->
        <?php
        //(별점 수 합/부여한 사람 수) 계산하여 별점 평균 내기
        if ($msg["stars"]>0 && $msg["setstar"]>0){
            $star = $msg["stars"]/$msg["setstar"];
        }else{
            $star = 0;
        }
        ?>
        @for($i=0; $i<5; $i++)
        @if($i < $star )<!--채워진 별사진-->
            <span><img src="{{asset('img/star2.png')}}" width="25px"></span>
        @else<!--빈 별사진-->
            <span><img src="{{asset('img/star.png')}}" width="25px"></span>
            @endif
        @endfor
    </span>
    <!--별점선택-->
    <span class="span">
        <select style="vertical-align:baseline" id="star" name="star" class="custom-select mb-3" >
            <option value="0">별별</option>
            <option value="1">★☆☆☆☆</option>
            <option value="2">★★☆☆☆</option>
            <option value="3">★★★☆☆</option>
            <option value="4">★★★★☆</option>
            <option value="5">★★★★★</option>
        </select>
    </span>
    <!--본인의 글에 에러-->
    <span class="span">
        @if(\Auth::user()['email']==$msg['id'])
            <button type="button" class="btn btn-success" onclick="errorMsg('자신의 글엔 별점을 줄 수 없습니다.')">별점주기</button>
        @else
            <button type="submit" class="btn btn-success" onclick="AjaxCall()">별점주기</button>
        @endif
    </span>