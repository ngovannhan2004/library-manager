<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Services\AuthorService;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    private AuthorService $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }
    public function index()
    {
        $authors = $this->authorService->getAll();
        return view('admin.pages.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authors = $this->authorService->getAll();
        return view('admin.pages.author.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorService->create($request);
        return redirect()->route('admin.authors.index')->with('success', 'Thêm tác giả thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $authors = $this->authorService->getAll();
        $author = $this->authorService->getById($id);
        return view('admin.pages.author.edit', compact('authors', 'author'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateAuthorRequest $request)
    {
        $this->authorService->update($id, $request);
        return redirect()->route('admin.authors.index')->with('success', 'Cập nhật tác giả thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->authorService->delete($id);
        return redirect()->route('admin.authors.index')->with('success', 'Xóa tác giả thành công');

    }
}
