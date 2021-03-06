<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignmentUploadRequest extends FormRequest
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
            'upload_file' => 'required|mimes:doc,pdf,docx,zip',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'عذراً يجب تعبئة جميع الحقول',
            'upload_file.mimes' => 'الصيغ المسموحة للملف هي: Zip, Word, PDF'
        ];
    }
}