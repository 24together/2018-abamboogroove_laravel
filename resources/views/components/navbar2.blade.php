<nav class="navbar navbar-inverse" style="border:0px none white">
    <div class="container-fluid" style="background-color:white">

        <div class="navbar-header">
            <a class="navbar-brand" href="{{url('/')}}" style="color:gray">a bamboo grove</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{url('/')}}"style="color:gray">Home</a></li>
            <li><a href="{{route('board.index',['category'=>2,'page'=>1])}}" style="color:gray">자유 게시판</a></li>
            <li><a href="{{route('board.create',['category'=>2,'page'=>1])}}" style="color:gray">글쓰기</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        </ul>
    </div>
</nav>
