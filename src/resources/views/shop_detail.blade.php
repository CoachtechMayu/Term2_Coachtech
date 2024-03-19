@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/shop_deatil.css')}}">
@endsection

@section('title')
shop_detail
@endsection

@section('content')
<div class="detail-content">
    <div class="shop-info">
        <div class="shop-ttl">
        <a href="/" class="back"><</a>
        <h3 class="shop-name">{{$shop->name}}</h3>
        </div>
        <img src="{{$shop->image_url}}">
        <p class="area_genre">#{{$shop->area->name}}#{{$shop->genre->name}}</p>
        <p class="shop-detail">{{$shop->content}}</p>
    </div>

    <div class="reservation">
        <h3 class="r-ttl">予約</h3>
        <form action="/reservation" method="POST">
        @csrf
        <input type="hidden" name="shop_id" value="{{$shop->id}}">
        <div class="r-input">
            <input type="date" name="date" id="input_date" class="input-date" />
            @if ($errors->has('date'))
                <p class="vali">{{$errors->first('date')}}</p>
            @endif
            <select id="input_time" name="time">
            <option value="17:00:00">17:00</option>
            <option value="17:30:00">17:30</option>
            <option value="18:00:00">18:00</option>
            <option value="18:30:00">18:30</option>
            <option value="19:00:00">19:00</option>
            <option value="19:30:00">19:30</option>
            <option value="20:00:00">20:00</option>
            <option value="20:30:00">20:30</option>
            <option value="21:00:00">21:00</option>
            </select>
            @if ($errors->has('time'))
                <p class="vali">{{$errors->first('time')}}</p>
            @endif
            <select id="input_number" name="number">
            <option value="1">1人</option>
            <option value="2">2人</option>
            <option value="3">3人</option>
            <option value="4">4人</option>
            <option value="5">5人</option>
            <option value="6">6人</option>
            <option value="7">7人</option>
            <option value="8">8人</option>
            <option value="9">9人</option>
            <option value="10">10人</option>
            </select>
            @if ($errors->has('number'))
                <p class="vali">{{$errors->first('number')}}</p>
            @endif
        </div>

        <div class="reservation-info">
            <table>
            <tr>
                <th>Shop</th>
                <td>{{$shop->name}}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td><div id="result_date"></div></td>
            </tr>
            <tr>
                <th>Time</th>
                <td><div id="result_time"></div></td>
            </tr>
            <tr>
                <th>Number</th>
                <td><div id="result_number"></div></td>
            </tr>
            </table>
        </div>

        <div class="r-btn">
            <button type="submit" class="reservation-btn">予約する</button>
        </div>
        </form>
    </div>
</div>
@endsection