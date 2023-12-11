<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
//            'name.required' => 'Vui lòng nhập tên',
//            'name.max' => 'Vui lòng nhập tên nhỏ hơn 255 ký tự.',
//
//            'name.string' => 'Vui lòng nhập tên là chuỗi.',
//            'email.required' => 'Vui lòng nhập email.',
//            'email.unique' => 'Email này đã tồn tại.',
//            'password.required' => 'Vui lòng nhập mật khẩu.',
//            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
//            'role.required' => 'Vui lòng chọn quyền.',
        ];
    }

}
