<?php

namespace App\Http\Services;


use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;

class BookService implements DAOInterface

{
    private Book $book;
    private CategoryService $categoryService;
    private AuthorService $authorService;
    private ConditionService $statusService;
    private PublishingCompanyService $publishingCompanyService;

    public function __construct(Book $book, AuthorService $authorService, CategoryService $categoryService, ConditionService $statusService, PublishingCompanyService $publishingCompanyService)
    {
        $this->book = $book;
        $this->authorService = $authorService;
        $this->categoryService = $categoryService;
        $this->statusService = $statusService;
        $this->publishingCompanyService = $publishingCompanyService;

    }

    function getAll()
    {
        return $this->book->all();
    }


    function getById($id)
    {
        return $this->book->find($id);
    }

    function getByName($name)
    {
        // TODO: Implement getByName() method.
    }

    function create($request)
    {
        $book = $this->book->create([
            'name' => $request->name,
            'publisher_id' => $request->publisher_id,
            'category_id' => $request->category_id,
            'condition_id' => $request->condition_id,
            'quantity' => $request->quantity,
            'book_code' => strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, 6)),
        ]);
        $book->authors()->attach($request->author_ids);

        return $book;


    }

    function update($id, $request)

    {

        $book = $this->book->find($id);
        $book->update([
            'name' => $request->name,
            'publisher_id' => $request->publisher_id,
            'category_id' => $request->category_id,
            'condition_id' => $request->condition_id,
            'quantity' => $request->quantity,
            'book_code' => $request->book_code,
        ]);
        $book->authors()->sync($request->author_ids);
        return $book;


    }

    function delete($id)
    {
        $book = $this->book->find($id);
        $book->delete();
    }

    function search($value)
    {
    }
    public function getBookLoan(){
        return $this->book->where('quantity', '>', 0)->get();
    }

    function updateBookLoan($ids)
    {
            // Giảm số lượng sách cho những sách vẫn còn trong phiếu mượn
            for ($i = 0; $i < count($ids); $i++) {
                $book = $this->book->where('id', $ids[$i])->first();
                $newQuantity = $book->quantity - 1;
                $book->update([
                    'quantity' => $newQuantity
                ]);
            }
        }


    function updateBookReturn($ids)
    {
        for ($i = 0; $i < count($ids); $i++) {
            $book = $this->book->where('id', $ids[$i])->first();
            $newQuantity = $book->quantity + 1;
            $book->update([
                'quantity' => $newQuantity
            ]);
        }
    }


}
