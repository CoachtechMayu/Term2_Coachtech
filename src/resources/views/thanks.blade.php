@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/thanks.css')}}">
@endsection

@section('title')
thanks
@endsection

@section('content')
<div class="thanks-box">
    <p>会員登録ありがとうございます</p>
    <div class="login-btn">
        <a href="/login" class="l-btn">ログインする</a>
    </div>
</div>

@endsection