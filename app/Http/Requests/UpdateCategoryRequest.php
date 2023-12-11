<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
     * @return array<string, mixed>
     */

    public function rules()
    {
        return [
            'name' => 'required|string|max:255' ,
            'parent_id' => 'required|integer|exists:categories,id',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên.',
            'name.string' => 'Tên phải là một chuỗi.',
            'name.max' => 'Tên không được vượt quá :max ký tự.',
            'parent_id.required' => 'Vui lòng chọn danh mục cha.',
            'parent_id.integer' => 'Danh mục cha phải là một số nguyên.',
            'parent_id.exists' => 'Danh mục cha không tồn tại.',
        ];
    }

}
