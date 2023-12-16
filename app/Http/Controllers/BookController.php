<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Services\AuthorService;
use App\Http\Services\BookService;
use App\Http\Services\CategoryService;
use App\Http\services\PublishingCompanyService;
use App\Http\Services\ConditionService;
use App\Models\Book;

class BookController extends Controller
{

    private BookService $bookService;
    private CategoryService $categoryService;
    private ConditionService $conditionService;
    private PublishingCompanyService $publishingCompanyService;
    private AuthorService $authorService;

    public function __construct(BookService $bookService, CategoryService $categoryService, ConditionService $conditionService, PublishingCompanyService $publishingCompanyService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->categoryService = $categoryService;
        $this->conditionService = $conditionService;
        $this->publishingCompanyService = $publishingCompanyService;
        $this->authorService = $authorService;

}


    public function index()
    {
        $books = $this->bookService->getAll();
        return view('admin.pages.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $books = $this->bookService->getAll();
        $categories = $this->categoryService->getAll();
        $publishingCompanies = $this->publishingCompanyService->getAll();
        $conditions = $this->conditionService->getAll();
        $authors = $this->authorService->getAll();
        return view('admin.pages.book.create', compact('books', 'categories', 'publishingCompanies', 'conditions', 'authors'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {

        $this->bookService->create($request);
        return redirect()->route('admin.books.index')->with('success', 'Thêm sách thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $books = $this->bookService->getAll();
        $categories = $this->categoryService->getAll();
        $publishingCompanies = $this->publishingCompanyService->getAll();
        $conditions = $this->conditionService->getAll();
        $authors = $this->authorService->getAll();
        $book = $this->bookService->getById($id);
        return view('admin.pages.book.edit', compact('books', 'categories', 'publishingCompanies', 'conditions', 'authors', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id , UpdateBookRequest $request)
    {
        $this->bookService->update($id, $request);
        return redirect()->route('admin.books.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->bookService->delete($id);
        return redirect()->route('admin.books.index')->with('success', 'Xóa sách thành công');
    }
}
