<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadDiplomeBillRequest extends FormRequest
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

    public function rules()
    {
        return [
            'upload_file' => 'required|mimes:doc,pdf,docx,zip,png,jpeg,jpg',
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