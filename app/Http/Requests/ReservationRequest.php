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
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reserve_start' => 'required',
            'reserve_end' => 'required',
            'reserve_start' => [
            new ReservationRule(
                $this->reserve_start, // 開始日時
                $this->reserve_end // 終了日時
            )
        ]
        ];
    }
}
