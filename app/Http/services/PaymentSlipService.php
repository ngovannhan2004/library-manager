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

        $paymentSlip = $this->paymentSlip->create([
            'returned_days' => $request->returned_days,
            'reader_id' => $request->reader_id
        ]);
        $paymentSlip->books()->attach($request->book_ids);
        $this->bookService->updateBookReturn($request->book_ids);
        return $paymentSlip;


    }

    public function update($id, $request)
    {
        $paymentSlip = $this->paymentSlip->find($id);
        $paymentSlip->update([

            'returned_days' => $request->returned_days,
            'reader_id' => $request->reader_id
        ]);

        $paymentSlip->books()->sync($request->book_ids);
        $this->bookService->updateBookReturn($request->book_ids);
        return $paymentSlip;
    }

    public function delete($id)
    {
        $paymentSlip = $this->paymentSlip->find($id);
        if ($paymentSlip) {
            $paymentSlip->delete();
        }
    }


}
