<?php

namespace App\Http\Controllers;

use App\Events\PaymentViolationEvent;
use App\Http\Requests\StorePaymentSlipRequest;
use App\Http\Requests\UpdatePaymentSlipRequest;
use App\Http\Services\PaymentSlipService;
use App\Models\PaymentSlip;
use Illuminate\Http\Request;

class PaymentSlipController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private PaymentSlipService $paymentSlipService;

    public function __construct(PaymentSlipService $paymentSlipService)
    {
        $this->paymentSlipService = $paymentSlipService;
    }
    public function index()
    {
        $payment_slips = $this->paymentSlipService->getAll();
       return view('admin.pages.payment_slip.index', compact('payment_slips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $payment_slips = $this->paymentSlipService->getAll();
        return view('admin.pages.payment_slip.create', compact('payment_slips'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentSlipRequest $request)
    {
        $this->paymentSlipService->create($request);
        return redirect()->route('admin.payment_slips.index')->with('success', 'Thêm phiếu thu thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentSlip $paymentSlip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)

    {
        $payment_slips = $this->paymentSlipService->getAll();
        $payment_slip = $this->paymentSlipService->getById($id);
        return view('admin.pages.payment_slip.edit', compact('payment_slips', 'payment_slip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentSlipRequest $request, PaymentSlip $paymentSlip)
    {
        $this->paymentSlipService->update($request, $paymentSlip);
        return redirect()->route('admin.payment_slips.index')->with('success', 'Cập nhật phiếu thu thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->paymentSlipService->delete($id);
        return redirect()->route('admin.payment_slips.index')->with('success', 'Xóa phiếu thu thành công');
    }


}
