<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvRequest extends FormRequest
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
            'programme_id' => 'required',
            'target_audience' => 'required',
            'period' => 'required',
            'day' => 'required',
            'date' => 'required',
            'course_name' => 'required',
            'course_period' => 'required',
            'from' => 'required',
            'to' => 'required',
            'teacher' => 'required',
            'price' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب',

        ];
    }
}