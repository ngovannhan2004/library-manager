<?php

namespace App\Http\Services;

use App\Models\LoanSlip;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Carbon;

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
            'reader_id' => $request->reader_id,
            'payment_deadline' => $request->payment_deadline,
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
            'reader_id' => $request->reader_id,
            'payment_deadline' => $request->payment_deadline,
        ]);
        $loanSlip->books()->sync($request->book_ids);
        $this->bookService->updateBookLoan($request->book_ids);
        return $loanSlip;
    }

    public function delete($id)
    {
        $loanSlip = $this->loanSlip->find($id);
        $loanSlip->delete();
    }

    public function search($request)
    {


    }

    public function getLateDaysOrRemainingDays($payment_deadline)
    {
        // Parse ngày hết hạn từ chuỗi hoặc từ thuộc tính trong model
        $payment_deadline = Carbon::parse($payment_deadline);
        // Lấy ngày hiện tại
        $today = Carbon::now();
        // Tính số ngày trễ hạn hoặc số ngày còn lại
        $daysDifference = $today->diffInDays($payment_deadline, false);
        return $daysDifference;
    }



}
