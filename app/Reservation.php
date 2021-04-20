<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
     protected $fillable = ['reserve_start','reserve_end','approval'];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
