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

    function getAll(): Collection
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
            'condition_id' => $request->condition_id
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
            'condition_id' => $request->statuses_id
        ]);
        $book->authors()->sync($request->author_ids);
        return $book;


    }

    function delete($id)
    {
        $book = $this->book->find($id);
        if ($book) {
            $book->delete();
        }
    }

    function search($value)
    {

    }

    function getBooksByAvailable()
    {
        return $this->book->where('available', 'yes')->get();
    }

    function updateBookLoan($ids)
    {

        $books = $this->book->whereIn('id', $ids);
        $books->update([
            'available' => 'no'
        ]);

    }

}
