<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::id();

        $shops = Shop::with(['likes' => function($query) use($user_id){
            $query->where('user_id', $user_id);
        }])->get();

        return view('shop', ['shops' => $shops]);
    }
    public function detail($shop_id)
    {
        $shop = Shop::find($shop_id);
        return view('shop_detail', ['shop' => $shop]);
    }

    public function search(Request $request)
    {
        $query = Shop::query();

        $area_id = $request->input('area_id');
        $genre_id = $request->input('genre_id');
        $name = $request->input('name');

        if(!empty($area_id)){
            $query->where('area_id', $area_id);
        }
        if(!empty($genre_id)){
            $query->where('genre_id', $genre_id);
        }
        if(!empty($name)){
            $query->where('name', 'LIKE', '%'.$name.'%');
        }

        $shops = $query->get();

        return view('shop_all', ['shops' => $shops]);
    }
}
