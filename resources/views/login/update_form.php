<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>대나무숲::회원정보수정</title>
        <?php require_once("./style.php"); ?>
    </head>
    <?php
        require_once("./MemberDao.php");
        require_once("./tools.php");
        
        session_start();
        
        $uid = isset($_SESSION["uid"])?$_SESSION["uid"]:"";
    
        $mdao = new MemberDao();
        $member = $mdao->getMember($uid);
    
        $age = $member["age"];
        if(!$member){
            errorBack("$uid 로그인 해주세요");
            exit();
        }
    
    
    ?>
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
       <h2>회원 정보 수정</h2>
       <p>회원정보 수정 후 수정버튼을 눌러주세요.</p>
       </div>
        <form id="Login" action="update.php" method="post">

            <div class="form-group">
                <span class="Logo" style="width:30%"><label for ="id">Id</label></span> 
                <span class="Logo"style="width:60% "><input style="margint-right:0px" type="text" class="form-control" id = "usr" name="id" value="<?= $member["id"]?>" readonly></span>
            </div>

            <div class="form-group">
                <span class="Logo" style="width:30%"><label for="pw" style="margin-right :10px">Password </label></span>
                <span class="Logo" style="width:60% "><input type="password" class="form-control" id="pwd" name="pw" value="<?= $member["pw"]?>"></span>

            </div>
            <div class="form-group">
                <span class="Logo" style="width:30%"><label for="name" style="margin-right:10px">Name </label></span>
                <span class="Logo" style="width:60% "><input type="text" class="form-control" id="name" name="name" value="<?= $member["name"]?>"></span>

            </div>
            <div class="form-group">
                <label for="age">Age </label>
                    <select name="age" class="custom-select mb-3" >
                      <option value="0" <?php if($age==0){ ?>  selected <?php } ?> >나이대를 선택해 주세요</option>
                      <option value="10" <?php if($age==10){ ?>  selected <?php } ?>>10대</option>
                      <option value="20"<?php if($age==20){ ?>  selected <?php } ?>>20대</option>
                      <option value="30"<?php if($age==30){ ?>  selected <?php } ?>>30대</option>
                      <option value="40"<?php if($age==40){ ?>  selected <?php } ?>>40대</option>
                      <option value="50"<?php if($age==50){ ?>  selected <?php } ?>>50대</option>
                      <option value="60"<?php if($age==60){ ?>  selected <?php } ?>>60대</option>
                      <option value="70"<?php if($age==70){ ?>  selected <?php } ?>>70대</option>
                      <option value="80"<?php if($age==80){ ?>  selected <?php } ?>>80대</option>
                      <option value="90"<?php if($age==90){ ?>  selected <?php } ?>>90대</option>
                      <option value="100"<?php if($age==100){ ?>  selected <?php } ?>>100대</option>
                    </select>

            </div>

            <button type="submit" class="btn btn-primary">수정</button>

        </form>
        </div>
    <p class="botto-text" style="text-align: center"> 영진전문대학교 2WDJ 김민영</p>
          </div> </div>      
    </body>
</html>