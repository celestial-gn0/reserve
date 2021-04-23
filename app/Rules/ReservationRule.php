<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use App\Reservation;

class ReservationRule implements Rule
{
    
    private $_reserve_start,
            $_reserve_end;
    
    /**
     * 新しいルールインスタンスを作成します。
     *
     * @return void
     */
    public function __construct($reserve_start, $reserve_end)
    {
        $this->_reserve_start = $reserve_start;
        $this->_reserve_end = $reserve_end;
    }

    /**
     * 検証ルールが通るかどうかを判断します。
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return \App\Reservation::whereHasReservation($this->_reserve_start, $this->_reserve_end)->doesntExist();
    }

    /**
     * バリデーションのエラーメッセージを取得します。
     *
     * @return string
     */
    public function message()
    {
        return '他の予約が入っています。';
    }
}
