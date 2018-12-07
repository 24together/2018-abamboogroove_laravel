<!--검색폼-->

<div class="span">
    <span class="span">
        <!--익명 게시판-->
        @if(isset($category)&&$category==1)
             <select id="inputState" name="range" class="custom-select mr-sm-2">
        <!--자유 게시판-->
        @elseif(isset($category)&&$category==2)
             <select id="inputState" name="range" class="form-control">
             <option value="writer">글쓴이</option>
        <!--회원 게시판-->
        @else
             <select id="inputState" name="range" class="form-control">
        @endif
            <option value="title">제목</option>
            <option value="content">내용</option>
            <option value="titleAndcontent">제목+내용</option>
        </select>
    </span>
    <span class="span">
        @if(isset($category)&&$category==1)
                <div class="col-xs-7">
        @else
            <div>
        @endif
            <input id="inputText" name="search" class="form-control" >
        </div>
    </span>
    <span class="span">
        @if(isset($category)&&$category==1)
                <button class="btn btn-light" onclick="searchBtn({{$page}})">검색</button>
        @else
            <button class="form-control" onclick="searchBtn({{$page}})">검색</button>
        @endif
    </span>

</div>