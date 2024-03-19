@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/shop.css')}}">
<link href="https://use.fontawesome.com/releases/v6.2.0/css/all.css" rel="stylesheet">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title')
shop_all
@endsection

@section('content')
<div class="shop-search">
    <form action="/shop/search" method="GET" id="search_form">
        @csrf
        <select  name="area_id" class="area-select" id="input_area" onchange="submit(this.form)">
        <option value="0">All area</option>
        <option value="1">東京都</option>
        <option value="2">大阪府</option>
        <option value="3">福岡県</option>
        </select>

        <select name="genre_id" class="genre-select" id="input_genre" onchange="submit(this.form)">
        <option value="0">All genre</option>
        <option value="1">寿司</option>
        <option value="2">焼肉</option>
        <option value="3">居酒屋</option>
        <option value="4">イタリアン</option>
        <option value="5">ラーメン</option>
        </select>
        <input type="text" placeholder="🔍Search ..." name="name" class="name-find" value="{{ old('name')
        }}" id="input_name" onchange="submit(this.form)" >
    </form>
</div>

<div class="shops">
    <!-- foreach 文 配列の要素の数だけ処理が繰り返し行う -->
    @foreach($shops as $shop)
    <div class="detail">
        <div class="detail-flex">
            <img src="{{$shop->image_url}}" class="img"/>
            <div class="detail-block">
            <p class="name">{{$shop->name}}</p>
            <div class="area-genre">
                <p>#{{$shop->area->name}}</p>
                <p>#{{$shop->genre->name}}</p>
            </div>
            <div class="detail-heart">
                <a href="{{route('shop.detail', $shop->id)}}" class="shop-d">詳しくみる</a>
                <!-- isEmpty 空判定 == true -->
                @if($shop->likes->isEmpty())
                    <form action="{{route('shop.like')}}" method="GET">
                    @csrf
                        <input type="hidden" name="shop_id" value="{{$shop->id}}">
                        <button type="submit" class="unlike-heart">
                            <i class="fa-solid fa-heart" style="color:gray; Font-size: large;"></i>
                        </button>
                    </form>
                @else<!-- isEmpty 空判定 == false -->
                    <form action="{{route('shop.unlike')}}" method="GET">
                    @csrf
                        <input type="hidden" name="shop_id" value="{{$shop->id}}">
                        <button type="submit" class="like-heart">
                            <i class="fa-solid fa-heart" style="color:red; Font-size: large;"></i>
                        </button>
                        </form>
                @endif
            </div>
        </div>
    </div>
</div>
    @endforeach
</div>
@endsection