<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentRequest extends FormRequest
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
            'final_date' => 'required',
            'final_time' => 'required',
            'homework_number' => 'required',
            'file' => 'required_without:id|mimes:doc,pdf,docx,zip',

        ];
    }
    public function messages()
    {
        return [
            'required' => 'عذراً يجب تعبئة جميع الحقول',
            'file.mimes' => 'الصيغ المسموحة للملف هي: Zip, Word, PDF'
        ];
    }
}