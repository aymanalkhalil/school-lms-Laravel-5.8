<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'subject' => 'required',
            'section' => 'required',
            'exam_number' => 'required',
            'grade' => 'required',
            'exam_date' => 'required',
            'exam_open' => 'required',
            'exam_close' => 'required',
            'exam_period' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'يجب تعبئة جميع الحقول ',
        ];
    }
}