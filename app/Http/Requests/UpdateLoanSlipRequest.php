<?php

namespace App\Http\Requests;

class UpdateLoanSlipRequest extends FormRequest
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
     *
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
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Vui lòng nhập tên nhỏ hơn 255 ký tự.',
            'name.unique' => 'Tên đã tồn tại.',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại.',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.integer' => 'Số điện thoại phải là số.',

        ];
    }

}
