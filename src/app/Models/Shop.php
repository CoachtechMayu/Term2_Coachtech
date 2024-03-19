<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'area_id',
        'genre_id',
        'image_url',
        'content'
    ];
    /* 主(Area)テーブル取得 */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    /* 主(Genre)テーブル取得 */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    /* reservationsテーブルリレーション定義 */
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
    /* likesテーブルリレーション定義 */
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
