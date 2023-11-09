<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email',
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
//            'name.required' => 'Vui lòng nhập tên.',
//            'name.unique' => 'User này đã tồn tại.',
//            'email.required' => 'Vui lòng nhập email.',
//            'email.unique' => 'Email này đã tồn tại.',
//            'password.required' => 'Vui lòng nhập mật khẩu.',
//            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
//            'role.required' => 'Vui lòng chọn quyền.',
        ];
    }



}
