<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
    ];
    /* 主(user)テーブル取得 */
    public function user()
    {   //usersテーブルとのリレーションを定義するuserメソッド
        return $this->belongsTo(User::class);
    }
    /* 主(shop)テーブル取得 */
    public function shop()
    {   //reviewsテーブルとのリレーションを定義するreviewメソッド
        return $this->belongsTo(Shop::class);
    }

    // //いいねされているかを判定するメソッド。 bool=true（真）およびfalse（偽）という値を持つデータ型
    // public function isLikedBy($user): bool {
    //     return Like::where('user_id', $user->id)->where('shop_id', $this->id)->first() !==null;
    // }
}