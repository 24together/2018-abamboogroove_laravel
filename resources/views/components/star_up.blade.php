    @csrf
    <span class="span">
        <?php
        if ($msg["stars"]>0 && $msg["setstar"]>0){
            $star = $msg["stars"]/$msg["setstar"];
        }else{
            $star = 0;
        }
        for($i=0; $i<5; $i++){
        if($i < $star ){
        ?>
        <span><img src="{{asset('img/star2.png')}}" width="25px"></span>
        <?php
        }else{
        ?>
        <span><img src="{{asset('img/star.png')}}" width="25px"></span>
        <?php
        }

        }?>
                                </span>
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
    <span class="span">
                            <button type="submit" class="btn btn-success" onclick="AjaxCall()">별점주기</button>
                            </span>