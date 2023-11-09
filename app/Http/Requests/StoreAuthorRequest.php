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
        ];
    }

    public function messages()
    {
        return [
//            'name.required' => 'Vui lòng nhập tên',
//            'name.max' => 'Vui lòng nhập tên nhỏ hơn 255 ký tự.',
//            'name.unique' => 'Tên đã tồn tại.',
//            'address.required' => 'Vui lòng nhập địa chỉ',
//            'gender.required' => 'Vui lòng chọn giới tính',
//            'phone.required' => 'Vui lòng nhập số điện thoại',
//            'phone.integer' => 'Số điện thoại phải là số.',
//            'phone.digits' => 'Số điện thoại phải có đúng 10 chữ số.',
//            'email.required' => 'Vui lòng nhập email',
//            'email.unique' => 'Email đã tồn tại.',
//            'email.email' => 'Vui lòng nhập một địa chỉ email hợp lệ.',
//            'email.regex' => 'Địa chỉ email phải chứa ký tự @.',
        ];
    }
}
