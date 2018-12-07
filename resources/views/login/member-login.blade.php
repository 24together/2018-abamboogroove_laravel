<!--로그인 페이지-->
@extends('default-form')

@section('title')
    로그인
@endsection
@section('form')
    LoginForm
@endsection
@section('nav_bar')
    @include('components.navbar1')
@endsection
@section('style1')
    @include('components.style1')
@endsection
@section('kakao_head')
    @include('login.kakao_head')
@endsection
@section('main_div')
    main-div
@endsection
@section('content')
    <!--설명-->
    <div class="panel">
        <h2>Admin Login</h2>
        <p>Please enter your ID and password</p>
    </div>
    <!--auth 컨트롤러를 사용한 로그인 폼-->
    <form id="Login" action="{{route('login')}}" method="post">
        @csrf
        <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="ID">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
        <!--카카오 로그인 버튼-->
        <div class="form-group">
            @include('login.kakao_login')
        </div>
        <button type="submit" class="btn btn-primary">Login</button>

    </form>
@endsection
@section('logo')
    <!-- 왼쪽 상단 로고-->
<span class="logo">
    <img src="{{asset('img/Bamboo.png')}}" width="30px" height="30px" ></span>
<span class="logo">
    <a href="{{asset('/')}}" style="text-decoration:none">
        <h1 class="form-heading">a bamboo grove</h1></a>
    </span>
@endsection
@section('footer')
    @include('footer')
@endsection