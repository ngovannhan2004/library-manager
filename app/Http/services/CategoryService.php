<?php

namespace App\Http\Services;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryService implements DAOInterface
{
    private Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    function getAll()
    {
        return $this->category->all();
    }

    function getById($id)
    {
        return $this->category->find($id);
    }

    function getByName($name)
    {
        // TODO: Implement getByName() method.
    }

    function create($request)
    {
        return $this->category->create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description ?? null,
            'parent_id' => $request->parent_id != "None" ? $request->parent_id : null,
        ]);

    }

    function update($id, $request)
    {
        $category = $this->category->find($id);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description ?? null,
            'parent_id' => $request->parent_id ?? 0,
        ]);
        return $category;
    }

    function delete($id)
    {
        $category = $this->category->find($id);

        if ($category) {
            // Xóa menu
            $category->delete();

            // Tùy chọn, bạn có thể thực hiện các hành động bổ sung sau khi xóa,
            // như xóa các bản ghi liên quan hoặc cập nhật dữ liệu khác.

            return redirect()->back()->with('success', 'Xóa category thành công.');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy category.');
        }
    }

    function search($value)
    {
        // TODO: Implement search() method.
    }

    public function restore($id)
    {
        $category = $this->category->withTrashed()->find($id);

        if ($category && $category->trashed()) {
            $category->restore();
            $category->update([
                'condition' => 1
            ]);
        }
        $category->restore();
    }
}
