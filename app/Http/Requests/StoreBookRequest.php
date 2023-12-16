<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'publisher_id' => 'required|exists:publishing_companies,id',
            'condition_id' => 'required|exists:conditions,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên.',
            'name.max' => 'Vui lòng nhập tên nhỏ hơn 255 ký tự.',
            'name.unique' => 'tên đã tồn tại.',
            'category_id.required' => 'Vui lòng chọn thể loại.',
            'category_id.exists' => 'Thể loại không tồn tại.',
            'publisher_id.required' => 'Vui lòng chọn nhà xuất bản.',
            'publisher_id.exists' => 'Nhà xuất bản không tồn tại.',
            'statuses_id.required' => 'Vui lòng chọn trạng thái.',
            'statuses_id.exists' => 'Trạng thái không tồn tại.',
            'author_ids.required' => 'Vui lòng chọn tác giả.',
            'author_ids.exists' => 'Tác giả không tồn tại.',


        ];
    }

}
