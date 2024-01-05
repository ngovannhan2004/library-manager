<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReadersRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255' ,
            'reader_code' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'year_birth' => 'required',


        ];

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Vui lòng nhập tên nhỏ hơn 255 ký tự.',
            'reader_code.required' => 'Vui lòng nhập mã độc giả',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng.',
            'email.regex' => 'Địa chỉ email phải chứa ký tự @.',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'gender.required' => 'Vui lòng chọn giới tính',
            'year_birth.required' => 'Vui lòng nhập năm sinh',

        ];
    }



}
