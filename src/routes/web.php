<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ReservationController;

/* 会員登録 */
Route::get('/register', [AuthenticationController::class, 'showRegister']);
Route::post('/register', [AuthenticationController::class, 'register']);
Route::get('/thanks', [AuthenticationController::class, 'thanks']);
/* ログイン・ログアウト */
Route::get('/login', [AuthenticationController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthenticationController::class, 'login']);
Route::get('/logout', [AuthenticationController::class, 'logout']);

/* ログイン後処理 */
Route::group(['middleware' => 'auth'], function(){
    Route::get('/mypage/{user_id}', [UserController::class, 'index'])->name('mypage');
    /* いいね管理 */
    Route::get('/shop/like', [LikeController::class, 'like'])->name('shop.like');
    Route::get('/shop/unlike', [LikeController::class, 'unlike'])->name('shop.unlike');
    /* 予約管理 */
    Route::post('/reservation', [ReservationController::class, 'store']);
    Route::get('/done', [ReservationController::class, 'done']);
    /* 予約消去 */
    Route::get('/reservation/{reservation_id}', [ReservationController::class, 'destroy'])->name('delete');
    /* 予約更新 */
    Route::post('/reservation/update', [ReservationController::class, 'update'])->name('update');

});

/* shop表示 */
Route::get('/', [ShopController::class, 'index'])->name('shop.all');
Route::get('/detail/{shop_id}', [ShopController::class, 'detail'])->name('shop.detail');
/* 検索 */
Route::get('/shop/search', [ShopController::class, 'search']);
