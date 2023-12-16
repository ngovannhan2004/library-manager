<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends FormRequest
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
            'name.max' => 'Vui lòng nhập tên nhỏ hơn 255 ký tự.',
            'email.required' => 'Vui lòng nhập email',
            'email.unique' => 'Email đã tồn tại.',
        ];
    }
}
