@extends('default-form')

@section('title')
회원가입
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
@section('main_div')
    main-div
@endsection
@section('content')
        <div class="panel">
            <h2>회원가입</h2>
            <p>회원 정보를 작성해주세요.</p>
        </div>
        <form id="Login" action="{{route('register')}}" method="post">
            @csrf
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

@endsection
@section('footer')
    @include('footer')
@endsection