<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends FormRequest
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
     *
     * get the validation rules that apply to the request.
     */

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
            'address' => 'required',
            'gender' => 'required',
            'phone' => 'required|digits:10',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại.',
            'email.email' => 'Vui lòng nhập một địa chỉ email hợp lệ.',
            'email.regex' => 'Địa chỉ email phải chứa ký tự @.',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'gender.required' => 'Vui lòng chọn giới tính',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.digits' => 'Số điện thoại phải có đúng 10 chữ số.',

        ];
    }
}
