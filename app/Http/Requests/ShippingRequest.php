<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class ShippingRequest extends FormRequest
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
            'id'   =>   'required|exists:settings',
            'value' =>    'required',
            'plain_value' =>    'required|nullable|numeric'
        ];
    }
    public function messages()
    {
        return [
            'id.required' => 'معرف غير موجود',
            'value.required' => 'يجب إدخال اسم وسيلة التوصيل',
            'plain_value.required' => 'يجب إدخال قيمة التوصيل'
        ];
    }
}
