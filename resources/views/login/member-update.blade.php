@extends('default-form')


@section('title')
    회원정보수정
@endsection
@section('form')
    LoginForm
@endsection
@section('style1')
    @include('components.style1')
@endsection

@section('content')
    <div class="main-div">
        <div class="panel">
            <h2>회원 정보 수정</h2>
            <p>회원정보 수정 후 수정버튼을 눌러주세요.</p>
        </div>
        <form id="Login" action="{{}}" method="post">

            <div class="form-group">
                <span class="Logo" style="width:30%"><label for ="id">Id</label></span>
                <span class="Logo"style="width:60% "><input style="margint-right:0px" type="text" class="form-control" id = "usr" name="id" value="<?php //echo $member["id"]?>" readonly></span>
            </div>

            <div class="form-group">
                <span class="Logo" style="width:30%"><label for="pw" style="margin-right :10px">Password </label></span>
                <span class="Logo" style="width:60% "><input type="password" class="form-control" id="pwd" name="pw" value="<?php //echo $member["pw"]?>"></span>

            </div>
            <div class="form-group">
                <span class="Logo" style="width:30%"><label for="name" style="margin-right:10px">Name </label></span>
                <span class="Logo" style="width:60% "><input type="text" class="form-control" id="name" name="name" value="<?php //echo $member["name"]?>"></span>

            </div>
            <div class="form-group">
                <label for="age">Age </label>
                <select name="age" class="custom-select mb-3" >

                </select>

            </div>

            <button type="submit" class="btn btn-primary">수정</button>

        </form>
    </div>
@endsection
@section('footer')
    @include('footer')
@endsection