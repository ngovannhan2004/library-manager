<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'name' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Vui lòng nhập tên nhỏ hơn 255 ký tự.',
            'name.string' => 'Vui lòng nhập tên là chuỗi.',
            'author_id.required' => 'Vui lòng nhập tác giả',
            'category_id.required' => 'Vui lòng nhập thể loại',
            'publisher_id.required' => 'Vui lòng nhập năm xuất bản',
            'condition_id.required' => 'Vui lòng nhập tình trạng',
        ];
    }

}
