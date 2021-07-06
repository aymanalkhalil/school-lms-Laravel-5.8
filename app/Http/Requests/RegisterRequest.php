<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required|arabic',
            'email' => 'required|unique:users',
            'national_id' => 'required|numeric|min:10',
            'city' => 'required|arabic',
            'phone' => 'required|numeric|min:10',
            'course' => 'required',
            'sana_drsia' => 'required_without:courses',
            'courses' => 'required_without:sana_drsia',
            'qualification' => 'required',
            'dob' => 'required',
            'note' => 'required|arabic',
            'c-password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'name_arabda' => 'required|arabic',
            'phone_arabda' => 'required|numeric|min:10',
            'arabda' => 'required',

        ];
    }

    public function messages()
    {
        return [];
    }
}