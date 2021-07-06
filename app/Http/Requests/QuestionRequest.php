<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionRequest extends FormRequest
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
            'question_true' => 'required_without:question_mul',
            'question_mul' => 'required_without:question_true',
            'correct_answer_true' => 'required_without:correct_answer_mul',
            'correct_answer_mul' => 'required_without:correct_answer_true',
            'mark_true' => 'required_without:mark_mul',
            'mark_mul' => 'required_without:mark_true',
            'answer_mul' => 'required_without:answer_true',
            'answer_true' => 'required_without:answer_mul',
        ];
    }
    public function messages()
    {
        return ['required_without' => 'يجب تعبئة جميع الحقول'];
    }
}