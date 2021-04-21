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
    
    protected $guarded = ['id'];

    // Scope
    public function scopeWhereHasReservation($query, $start, $end) {
        
        //チェックしたい時間帯の中から始まる予約がある
        $query->where(function($q) use($start, $end) { 

            $q->where('reserve_start', '>=', $start)
                ->where('reserve_start', '<', $end);

        })
        //チェックしたい時間帯の中で終わる予約がある
        ->orWhere(function($q) use($start, $end) { 

            $q->where('reserve_end', '>', $start)
                ->where('reserve_end', '<=', $end);

        })
        //チェックしたい時間帯の中にすっぽり入る予約がある
        ->orWhere(function($q) use ($start, $end) { 

            $q->where('reserve_start', '<', $start)
                ->where('reserve_end', '>', $end);

        });

    }
}
