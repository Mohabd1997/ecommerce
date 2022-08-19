<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'   =>   'required',
            'email' =>    'required|email|unique:admins,email',
            'password' =>    'nullable|confirmed|min:8'

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'يجب إدخال اسم المستخدم',
            'email.required' => 'يجب إدخال البريد الالكتروني',
            'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
            'password.confirmed' => 'يرجى تأكيد كلمة المرور',
        ];
    }
}
