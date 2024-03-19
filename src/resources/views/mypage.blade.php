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

    <div class="user-name">
        {{$user->name}}さん
    </div>

<div class="reservation-likes">
    <div class="reservation-box">
        <h2 class="content-title">予約状況</h2>
            @foreach($user->reservations as $index => $reservation)
            @if($reservation->date > $today)
            <div class="r-content">
                <div class="reservation-info">
                <i class="fa-solid fa-clock"></i>
                <p>予約{{$index+1}}</p>
                <form action="{{route('delete', $reservation->id)}}" method="GET">
                    @csrf
                    <input type="hidden" name="id" value="{{$reservation->id}}"/>
                    <button type="submit" class="delete-btn">×</button>
                </form>
                </div>

                <table class="reservation-table">
                <form action="{{route('update')}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$reservation->id}}">
                    <tr>
                        <th>Shop</th>
                        <td>{{$reservation->shop->name}}</td>
                    </tr>
                    <tr>
                        <th>Date</th>
                        <td>
                        予約日:
                        <input type="date" name="date" class="up-date" value="{{$reservation->date}}">
                        </td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td>
                        予約時刻:
                        <select id="input_time" name="time" class="up-time">
                        @foreach($r_time as $r_val => $time)
                            <option value="{{$r_val}}" @if($reservation->time == $r_val) selected @endif>{{$time}}</option>
                        @endforeach
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Number</th>
                        <td>
                        予約人数:
                        <select id="input_number" name="number" class="up-number">
                        @foreach($r_number as $r_val => $number)
                            <option value="{{$r_val}}" @if($reservation->number == $r_val) selected @endif>{{$number}}</option>
                        @endforeach
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td><button type="submit" class="update-btn">予約変更</button></td>
                    </tr>
                </form>
                </table>
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
            </div>
            @endforeach
        </div>
    </div>
@endsection