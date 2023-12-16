<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLoanSlipRequest extends FormRequest
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
     *  Get the validation rules that apply to the request.
     *
     */
    public function rules(): array
    {
        return [

        ];
    }

    public function messages()
    {
        return [
            'borrowed_days.required' => 'Vui lòng nhập  ngày muượn',
        ];
    }

}
