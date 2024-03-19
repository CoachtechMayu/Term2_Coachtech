<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'number' => 'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'date.required' => '※予約日を入力してください',
            'date.date' => '※日付の形式で入力してください',
            'time.required' => '※予約時間を入力してください',
            'time.date_format' => '※時間の形式で入力してください',
            'number.required' => '※人数を入力してください',
            'number.integer' => '※人数は整数で入力してください',
        ];
    }
}
