<?php

namespace App\Http\Controllers;

use App\Http\Services\BookBackService;

class BookBackController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    private BookBackService $bookBackService;

    public function __construct(BookBackService $bookBackService)
    {
        $this->bookBackService = $bookBackService;
    }

    public function index()
    {
        $pays = $this->bookBackService->getAll();
        return view('admin.pages.payment_slip.index', compact('pays'));
    }

}
