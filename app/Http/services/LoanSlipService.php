<?php

namespace App\Http\Services;

use App\Models\LoanSlip;
use App\Models\User;

class LoanSlipService
{

    private BookService $bookService;
    private ReadersService $readersService;
    private LoanSlip $loanSlip;

    public function __construct(BookService $bookService, ReadersService $readersService, LoanSlip $loanSlip)
    {
        $this->bookService = $bookService;
        $this->readersService = $readersService;
        $this->loanSlip = $loanSlip;
    }

    public function getAll()
    {
        return $this->loanSlip->all();
    }

    public function getById($id)
    {
        return $this->loanSlip->find($id);
    }

    public function create($request)
    {

        $loanSlip = $this->loanSlip->create([
            'borrowed_days' => $request->borrowed_days,
            'reader_id' => $request->reader_id
        ]);
        $loanSlip->books()->attach($request->book_ids);
        $this->bookService->updateBookLoan($request->book_ids);
        return $loanSlip;


    }

    public function update($id, $request)
    {
        $loanSlip = $this->loanSlip->find($id);
        $loanSlip->update([
            'borrowed_days' => $request->borrowed_days,
        ]);
        $loanSlip->readers()->attach($request->reader_id);
        $loanSlip->books()->attach($request->book_ids);
        return $loanSlip;
    }

    public function delete($id)
    {
        $loanSlip = $this->loanSlip->find($id);
        $loanSlip->delete();
    }

    public function getReaderHaveBookBackMore0()
    {
        $usersWithBorrows = User::whereHas('loanSlips.borrows', function ($query) {
            $query->where('back', false);
        })->get();

        dd($usersWithBorrows);
        return $usersWithBorrows;
    }
}
