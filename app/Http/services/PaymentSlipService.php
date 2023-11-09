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
        $this->paymentSlip->create([
            'name' => $request->name,
            'borrowed_days' => $request->borrowed_days,
            'returned_days' => $request->returned_days,
            'violated' => $request->violated,
        ]);

    }

    public function update($id, $request)
    {
        $paymentSlip = $this->paymentSlip->find($id);
        $paymentSlip->update([
            'name' => $request->name,
            'borrowed_days' => $request->borrowed_days,
            'returned_days' => $request->returned_days,
            'violated' => $request->violated,
        ]);
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
