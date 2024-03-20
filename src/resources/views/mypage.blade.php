@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/my_page.css')}}">
    <link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title')
mypage
@endsection

@section('content')
<h2 class="name">
    {{$user->name}}さん
</h2>
<div class="reservation">
    <div class="reservation-box">
        <h2 class="reservation-status">予約状況</h2>
            @foreach($user->reservations as $key => $reservation)
                <table>
                <div class="reservation-content">
                    <div class="reservation-info">
                        <i class="fa-solid fa-clock"></i>
                        <p>予約{{$key+1}}</p>
                        <form action="{{route('delete', $reservation->id)}}" method="GET">
                            @csrf
                            <input type="hidden" name="id" value="{{$reservation->id}}"/>
                            <button type="submit" class="delete-btn">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </form>
                    </div>
                </div>
                </table>
            @endforeach
    </div>
    <div class="like-shops">
        <h2 class="content-title">お気に入り店舗</h2>
        <div class="like-content">
            @foreach($shops as $shop)
            <div class="likes">
                <img src="{{$shop->image_url}}" class="img">
                <p class="shop-name">{{$shop->name}}</p>
                <p>#{{$shop->area->name}}#{{$shop->genre->name}}</p>
                <div class="detail-heart">
                    <a href="{{route('shop.detail', $shop->id)}}" class="shop-d">詳しくみる</a>
                    @if($shop->likes->isEmpty())<!-- isEmpty 空判定 == true -->
                        <form action="{{route('shop.like')}}" method="GET">
                        @csrf
                        <input type="hidden" name="shop_id" value="{{$shop->id}}">
                        <button type="submit" class="unlike-heart">
                            <i class="fa-solid fa-heart" style="color:gray;"></i>
                        </button>
                        </form>
                        @else<!-- isEmpty 空判定 == false -->
                        <form action="{{route('shop.unlike')}}" method="GET">
                        @csrf
                        <input type="hidden" name="shop_id" value="{{$shop->id}}">
                        <button type="submit" class="like-heart">
                            <i class="fa-solid fa-heart" style="color:red;"></i>
                        </button>
                        </form>
                        @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection