<?php

namespace App\Http\Services;

use App\Models\LoanSlip;

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
        $this->loanSlip->create([
            'name' => $request->name,
            'borrowed_days' => $request->borrowed_days,
            'returned_days' => $request->returned_days,
            'violated' => $request->violated,
        ]);
    }
    public function update($id, $request)
    {
        $loanSlip = $this->loanSlip->find($id);
        $loanSlip->update([
            'name' => $request->name,
            'borrowed_days' => $request->borrowed_days,
            'returned_days' => $request->returned_days,
            'violated' => $request->violated,
        ]);
        return $loanSlip;
    }
    public function delete($id)
    {
        $loanSlip = $this->loanSlip->find($id);
        $loanSlip->delete();
    }

}
