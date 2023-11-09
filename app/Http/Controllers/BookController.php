<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Services\AuthorService;
use App\Http\Services\BookService;
use App\Http\services\PublishingCompanyService;
use App\Http\Services\StatusService;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private BookService $bookService;
    private AuthorService $authorService;

    private PublishingCompanyService $publishingCompanyService;

    private StatusService $statusService;

    public function __construct(BookService $bookService, AuthorService $authorService, PublishingCompanyService $publishingCompanyService, StatusService $statusService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
        $this->publishingCompanyService = $publishingCompanyService;
        $this->statusService = $statusService;
    }
    public function index()
    {
        $publishing_companies = $this->publishingCompanyService->getAll();
        $statuses = $this->statusService->getAll();
        $authors = $this->authorService->getAll();
        $books = $this->bookService->getAll();
        return view('admin.pages.book.index', compact('books', 'authors', 'publishing_companies', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $publishing_companies = $this->publishingCompanyService->getAll();
        $statuses = $this->statusService->getAll();
        $authors = $this->authorService->getAll();
        $books = $this->bookService->getAll();
        return view('admin.pages.book.create', compact('books', 'authors', 'publishing_companies', 'statuses'));
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

        $publishing_companies = $this->publishingCompanyService->getAll();
        $statuses = $this->statusService->getAll();
        $authors = $this->authorService->getAll();
        $books = $this->bookService->getAll();
        $book = $this->bookService->getById($id);
        return view('admin.pages.book.edit', compact('books', 'authors', 'book', 'publishing_companies', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $this->bookService->update($request, $book);
        return redirect()->route('admin.books.index')->with('success', 'Sửa sách thành công');
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
