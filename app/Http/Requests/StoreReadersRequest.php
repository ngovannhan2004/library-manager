<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReadersRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'reader_code' => 'required|unique:readers,reader_code',
            'email' => 'required|email|unique:readers,email',
            'phone' => 'required|digits:10',
            'address' => 'required',
            'gender' => 'required',
            'year_birth' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Vui lòng nhập tên nhỏ hơn 255 ký tự.',
            'reader_code.required' => 'Vui lòng nhập mã độc giả',
            'reader_code.unique' => 'Mã độc giả đã tồn tại.',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại.',
            'email.email' => 'Email không đúng định dạng.',
            'email.regex' => 'Địa chỉ email phải chứa ký tự @.',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.integer' => 'Số điện thoại phải là số.',
            'phone.digits' => 'Số điện thoại  phải có 10 chữ số.',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'gender.required' => 'Vui lòng chọn giới tính',
            'year_birth.required' => 'Vui lòng nhập năm sinh',



        ];
    }

}
