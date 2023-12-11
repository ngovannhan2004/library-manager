<?php

namespace App\Http\Requests;

class UpdatePaymentSlipRequest extends FormRequest
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
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Vui lòng nhập tên nhỏ hơn 255 ký tự.',
            'name.unique' => 'Tên đã tồn tại.',
            'borrowed_days.required' => 'Vui lòng nhập ngày mượn',
            'returned_days.required' => 'Vui lòng nhập trả ngày',
        ];
    }

}
