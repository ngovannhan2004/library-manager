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
            'name.required' => 'Vui lòng nhập tên.',
            'name.unique' => 'Tên này đã tồn tại.',
        ];
    }

}
