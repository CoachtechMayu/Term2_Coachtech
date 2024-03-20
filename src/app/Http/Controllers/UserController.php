<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Reservation;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $shop = Shop::find($user->id);
        $reservation = Reservation::find($user->id);
        /* お気に入り */
        $user_id = Auth::id();
        $shops = Shop::whereHas('likes', function($query) use($user_id){
            $query->where('user_id', $user_id);
        })->get();

        $reservation_time = config('reservation_time');
        $reservation_number = config('reservation_number');

        return view('mypage', [
            'user' => $user,
            'shops' => $shops,
            'reservation' => $reservation,
            'reservation_time' => $reservation_time,
            'reservation_number' => $reservation_number,
        ]);
    }
}
