@extends('default-form')

@section('title')
    회원정보수정
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
@section('head')
    @include('login.login_check')
@endsection
@section('content')
        <div class="panel">
            <h2>회원 정보 수정</h2>
            <p>회원정보 수정 후 수정버튼을 눌러주세요.</p>
        </div>
        <form id="Login" action="{{ route('password.update') }}" method="post">

            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <span class="Logo" style="width:30%"><label for ="id">Id</label></span>
                <span class="Logo"style="width:60% "><input style="margint-right:0px" type="text" class="form-control" id = "usr" name="id" value="{{\Auth::user()['email']}}" readonly></span>
            </div>

            <div class="form-group">
                <span class="Logo" style="width:30%"><label for="pw" style="margin-right :10px">Password </label></span>
                <span class="Logo" style="width:60% "><input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="pwd" name="pw" value="{{\Auth::user()['password']}}"></span>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <span class="Logo" style="width:30%"><label for="name" style="margin-right:10px">Name </label></span>
                <span class="Logo" style="width:60% "><input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{\Auth::user()['name']}}"></span>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="age">Age </label>
                <select name="age" class="custom-select mb-3" >
                    <option value="0" @if(\Auth::user()['age']==0) selected @endif >나이대를 선택해 주세요</option>
                @for($i=10; $i<=100;$i=$i+10)
                        <option value="{{$i}}" @if(\Auth::user()['age']==$i) selected @endif>{{$i}}대</option>
                @endfor
                </select>
            </div>

            <button type="submit" class="btn btn-primary">수정</button>

        </form>
@endsection
@section('logo')
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