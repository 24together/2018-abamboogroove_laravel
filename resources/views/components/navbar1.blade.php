<nav class="navbar navbar-expand-sm bg-white navbar-white">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="{{url('/')}}"style="color:gray">a bamboo grove</a>

    <!-- Links -->
    <ul class="navbar-nav">
        <li class="nav-item" >
            <a class="nav-link" href="{{url('/')}}" style="color:gray">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('board.index',['category'=>1,'page'=>1])}}"style="color:gray">익명게시판</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('board.create',['category'=>1,'page'=>1])}}"style="color:gray">글쓰기</a>
        </li>
    </ul>
</nav>