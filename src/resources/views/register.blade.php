@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
<link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">

@endsection

@section('title')
register
@endsection

@section('content')
<div class="register-box">
    <div class="r-ttl">
    <p>Registration</p>
    </div>
    <div class="r-form">
        <form action="/register" method="POST">
        @csrf
        <i class="fa-solid fa-user"></i>
        <input type="text" name="name" placeholder="Username"><br>
            @if ($errors->has('name'))
            <p class="vali">{{$errors->first('name')}}</p>
            @endif
        <i class="fa-solid fa-envelope"></i>
        <input type="text" name="email" placeholder="Email"><br>
            @if ($errors->has('email'))
            <p class="vali">{{$errors->first('email')}}</p>
            @endif
        <i class="fa-solid fa-lock"></i>
        <input type="text" name="password" placeholder="Password"><br>
            @if ($errors->has('password'))
            <p class="vali">{{$errors->first('password')}}</p>
            @endif
        <div class="register-btn">
            <button type="submit" class="r-btn">登録</button>
        </div>
        </form>
    </div>
</div>

@endsection