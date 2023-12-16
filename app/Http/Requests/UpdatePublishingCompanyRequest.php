<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePublishingCompanyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255' ,
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
            'name.unique' => 'Tên đã tồn tại.',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại.',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.regex' => 'Địa chỉ email phải chứa ký tự @.',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.integer' => 'Số điện thoại phải là số.',
            'phone.digits' => 'Số điện thoại phải có 10 chữ số.',
            'address.required' => 'Vui lòng nhập địa chỉ',
        ];
    }

}
