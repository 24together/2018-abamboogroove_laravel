
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>대나무숲::글작성</title>
        <!-- include libraries(jQuery, bootstrap) -->
        @yield('style1')

    </head>
    <?php

    
    
    ?>
   <!-- <script type="text/javascript" src="../editor/js/HuskyEZCreator.js" charset="utf-8"></script>-->
    <body id = "LoginForm">
<!--상단바-->
        <nav class="navbar navbar-expand-sm bg-white navbar-white">
          <!-- Brand/logo -->
          <a class="navbar-brand" href="{{url('/')}}"style="color:gray">a bamboo grove</a>

              <!-- Links -->
              <ul class="navbar-nav">
                <li class="nav-item" >
                  <a class="nav-link" href="{{url('/')}}" style="color:gray">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"style="color:gray">Link 2</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"style="color:gray">Link 3</a>
                </li>
              </ul>
            </nav>
<!--메인 -->
        <div class="container" style=" margin-top:50px ">
         <div class="login-form">
                <div class="board-main-div">
                <div class="panel">
               <img src="{{asset('img/logo5.png')}}" width="150px">
               <p>이야기를 들려주세요.</p>
               </div>
                  <form action="write.php" method="post">
                   <div>
                    <!--<form action="write.php" method="post">-->
                        <div class="form-group">
                           <span class="span" style="width:20%">
                                <label for="title">제목: </label>
                            </span>
                            <span class="span" style="width:70%">
                                <input type="text" id="title" name="title" class="form-control" required>
                            </span>
                        </div>

                        <div class="form-group">
                            <span class="span" style="width:20%">
                                <label for="writer">작성자: </label>
                            </span>
                            <span name="name" class="span" style="width:70%">
                                <p><?php //echo$_SESSION["name"]?></p>
                            </span>
                        </div>

                        <div class="form-group">
                            <span class="span" style="width:20%">
                                <label for="content">내용</label>
                            </span>
                            <span name="content" class="span" style="width:70%">
                                <textarea class="form-control" style="overflow:visible; height:400px" cols="50" id="content" name="content"></textarea>

                            </span>
                        </div>
                        <div class="form-group">
                            <span class="span">
                                <button class="btn btn-light" type="submit" >공유하기</button>
                            </span>
                            <span class="span">
                                <button class="btn btn-light" onclick="location.href='board.blade.phpboard.blade.php'" >목록보기</button>
                            </span>
                        </div>
                      </div> 
                      </form>

                      </div>  
                    </div>
                </div> 
        @yield('footer')
    </body>
    
</html>