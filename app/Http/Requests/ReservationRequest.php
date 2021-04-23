<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Rules\ReservationRule;

class ReservationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    
    public function all($keys = null)
    {
    $results = parent::all($keys);
    $results['reserve_start'] = $results['reserve_start_date'] .' '. $results['reserve_start_time'];
    $results['reserve_end'] = $results['reserve_end_date'] .' '. $results['reserve_end_time'];
    return $results;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reserve_start_date' => 'required|after_or_equal:"today"|before_or_equal:reserve_end_date',
            'reserve_start_time' => 'required|before_or_equal:reserve_end_time|after_or_equal:09:00',
            'reserve_end_date' => 'required|after_or_equal:reserve_start_date',
            'reserve_end_time' => 'required|after_or_equal:reserve_start_time|before_or_equal:20:00',
            'reserve_start' => [
            new ReservationRule(
                $this->reserve_start, // 開始日時
                $this->reserve_end// 終了日時
            )
            ]
        ];
    }
}
