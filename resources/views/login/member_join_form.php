k<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>대나무숲::회원가입</title>
        <link href="./stylesheet.css" rel="stylesheet">
          <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
          <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
          <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body id = "LoginForm">
<!--상단바-->
        <nav class="navbar navbar-expand-sm bg-white navbar-white">
          <!-- Brand/logo -->
          <a class="navbar-brand" href="./main.php"style="color:gray">a bamboo grove</a>

          <!-- Links -->
          <ul class="navbar-nav">
            <li class="nav-item" >
              <a class="nav-link" href="#" style="color:gray">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"style="color:gray">Link 2</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"style="color:gray">Link 3</a>
            </li>
          </ul>
        </nav>

<!--회원수정폼-->
      <div class="container" style=" margin-top:50px ">
   <div class="login-form">
    <div class="main-div">
        <div class="panel">
       <h2>회원가입</h2>
       <p>회원 정보를 작성해주세요.</p>
       </div>
        <form id="Join" action="{{route('register')}}'" method="post">

            <div class="form-group">
                <span class="Logo" style="width:30%"><label for ="id">Id</label></span> 
                <span class="Logo"style="width:60% "><input style="margint-right:0px" type="text" class="form-control" id = "usr" name="email" placeholder="ID"></span>
            </div>

            <div class="form-group">
                <span class="Logo" style="width:30%"><label for="pw" style="margin-right :10px">Password </label></span>
                <span class="Logo" style="width:60% "><input type="password" class="form-control" id="pwd" name="password" placeholder="Password"></span>

            </div>
            <div class="form-group">
                <span class="Logo" style="width:30%"><label for="name" style="margin-right:10px">Name </label></span>
                <span class="Logo" style="width:60% "><input type="text" class="form-control" id="name" name="name" placeholder="Name"></span>

            </div>
            <div class="form-group">
                <label for="age">Age </label>
                    <select name="age" class="custom-select mb-3" >
                      <option value="0">나이대를 선택해 주세요</option>
                      <option value="10">10대</option>
                      <option value="20">20대</option>
                      <option value="30">30대</option>
                      <option value="40">40대</option>
                      <option value="50">50대</option>
                      <option value="60">60대</option>
                      <option value="70">70대</option>
                      <option value="80">80대</option>
                      <option value="90">90대</option>
                      <option value="100">100대</option>
                    </select>

            </div>

            <button type="submit" class="btn btn-primary">SignUp</button>

        </form>
        </div>

          </div> </div>      
    </body>
</html>