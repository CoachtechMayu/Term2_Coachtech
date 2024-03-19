<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Shop;
use App\Models\User;
use App\Http\Requests\ReservationRequest;
use Illuminate\Support\Facades\Auth;/* 認証しているユーザーを取得 */


class ReservationController extends Controller
{
    /* 予約完了画面 */
    public function done(Request $request)
    {
        return view('done');
    }
    /* 予約保存 */
    public function store(ReservationRequest $request)
    {
        /* 予約テーブルへ保存 */
        Reservation::create([
            'shop_id' => $request->shop_id,
            'user_id' => Auth::id(),
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number,
        ]);
        /* 予約完了画面へ */
        return redirect('/done');
    }
    /* 予約削除 */
    public function destroy(Request $request)
    {
        Reservation::find($request->id)->delete();

        return back();
    }
    /* 予約更新 */
    public function update(ReservationRequest $request)
    {
        Reservation::find($request->id)->update([
            'date' => $request->date,
            'time' => $request->time,
            'number' => $request->number,
        ]);

        return back();
    }
}
