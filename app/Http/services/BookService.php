<?php

namespace App\Http\Services;

use App\Models\Book;
use App\Models\LoanSlip;

class BookService
{
    private Book $book;
     private AuthorService $authorService;

     private PaymentSlipService $paymentSlipService;

     private LoanSlipService $loanSlipService;

    public function __construct(Book $book, AuthorService $authorService, PaymentSlipService $paymentSlipService, LoanSlipService $loanSlipService)
    {
        $this->book = $book;
        $this->authorService = $authorService;
        $this->paymentSlipService = $paymentSlipService;
        $this->loanSlipService = $loanSlipService;
    }

    public function getAll()
    {
        return $this->book->all();
    }

    public function getByName($name)
    {
        // TODO: Implement getByName() method.
    }


    public function getById($id)
    {
        return $this->book->find($id);
    }


}
