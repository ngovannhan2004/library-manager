<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanSlipRequest;
use App\Http\Requests\UpdateLoanSlipRequest;
use App\Http\Services\BookService;
use App\Http\Services\LoanSlipService;
use App\Http\Services\ReadersService;
use App\Models\LoanSlip;
use Illuminate\Http\Request;

class LoanSlipController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private LoanSlipService $loanSlipService;
    private BookService $bookService;
    private ReadersService $readersService;


    public function __construct(LoanSlipService $loanSlipService, BookService $bookService, ReadersService $readersService)
    {

        $this->loanSlipService = $loanSlipService;
        $this->bookService = $bookService;
        $this->readersService = $readersService;
    }
    public function index()
    {
        $ok = $this->loanSlipService->getReaderHaveBookBackMore0();
        $loan_slips = $this->loanSlipService->getAll();
        $books = $this->bookService->getAll();
        $readers = $this->readersService->getAll();
        return view('admin.pages.loan_slip.index', compact('loan_slips', 'books', 'readers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $loan_slips = $this->loanSlipService->getAll();
        $books = $this->bookService->getBooksByAvailable();
        $books = $this->bookService->getAll();
        $readers = $this->readersService->getAll();
        return view('admin.pages.loan_slip.create', compact('loan_slips', 'books', 'readers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanSlipRequest $request)
    {
        $this->loanSlipService->create($request);
        return redirect()->route('admin.loan_slips.index')->with('success', 'Thêm phiếu mượn thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanSlip $loanSlip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $loan_slips = $this->loanSlipService->getAll();
        $books = $this->bookService->getAll();
        $readers = $this->readersService->getAll();
        $book = $this->bookService->getById($id);
        return view('admin.pages.loan_slip.edit', compact('loan_slips', 'books', 'readers', 'book'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, UpdateLoanSlipRequest $request)
    {
        $this->loanSlipService->update($id, $request);
        return redirect()->route('admin.loan_slips.index')->with('success', 'Cập nhật phiếu mượn thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->loanSlipService->delete($id);
        return redirect()->route('admin.loan_slips.index')->with('success', 'Xóa phiếu mượn thành công');
    }


}
