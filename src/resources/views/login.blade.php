@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
<link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
@endsection

@section('title')
login
@endsection

@section('content')
<div class="login-box">
    <div class="login-ttl">
        <p>Login</p>
    </div>
    <div class="l-form">
        <form action="/login" method="POST">
        @csrf
        <i class="fa-solid fa-envelope"></i>
        <input type="text" name="email" placeholder="Email"><br>
            @if ($errors->has('email'))
            <p class="validation">{{$errors->first('email')}}</p>
            @endif
        <i class="fa-solid fa-lock"></i>
        <input type="text" name="password" placeholder="Password"><br>
            @if ($errors->has('password'))
            <p class="validation">{{$errors->first('password')}}</p>
            @endif
        <div class="login-btn">
            <button type="submit" class="l-btn">ログイン</button>
        </div>
        </form>
    </div>
</div>
@endsection