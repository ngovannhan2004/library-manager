<?php

namespace App\Http\Services;

use App\Models\PaymentSlip;

class PaymentSlipService
{

    private PaymentSlip $paymentSlip;
    private BookService $bookService;
    private ReadersService $readersService;

    public function __construct(PaymentSlip $paymentSlip, BookService $bookService, ReadersService $readersService)
    {
        $this->paymentSlip = $paymentSlip;
        $this->bookService = $bookService;
        $this->readersService = $readersService;
    }

    public function getAll()
    {
        return $this->paymentSlip->all();
    }
    public function getById($id)
    {
        return $this->paymentSlip->find($id);
    }

    public function getByName($name)
    {
        // TODO: Implement getByName() method.
    }

    public function create($request)
    {
        $paymentSlip = new PaymentSlip();
        $paymentSlip->name = $request->name;
        $paymentSlip->borrowed_days = $request->borrowed_days;
        $paymentSlip->returnd_days = $request->returnd_days;
        $paymentSlip->violated = $request->violated;
        $paymentSlip->save();
//
//        $book = $this->bookService->getById($request->book_id);
//        $book->payment_slips()->attach($paymentSlip);
//        $reader = $this->readersService->getById($request->reader_id);
//        $reader->payment_slips()->attach($paymentSlip);

        return $paymentSlip;
    }

    public function update($id, $request)
    {
        $paymentSlip = $this->paymentSlip->find($id);
        $paymentSlip->name = $request->name;
        $paymentSlip->borrowed_days = $request->borrowed_days;
        $paymentSlip->returnd_days = $request->returnd_days;
        $paymentSlip->violated = $request->violated;
        $paymentSlip->save();
    }

    public function delete($id)
    {
        $paymentSlip = $this->paymentSlip->find($id);
        if ($paymentSlip) {
            $paymentSlip->delete();
        }
    }

}
