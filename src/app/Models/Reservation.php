<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'shop_id',
        'date',
        'time',
        'number'
    ];

    /* 主(User)テーブル取得 */
    public function area()
    {
        return $this->belongsTo(User::class);
    }
    /* 主(Shop)テーブル取得 */
    public function genre()
    {
        return $this->belongsTo(Shop::class);
    }
}
