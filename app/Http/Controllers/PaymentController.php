<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Flat;
use App\Models\Renter;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::query()
            ->with(['renter', 'flat'])
            ->latest()
            ->get();

        return view('payments.index', [
            'payments' => $payments,
        ]);
    }

    public function create()
    {
        $renters = Renter::query()->latest()->get();

        return view('payments.create', [
            'renters' => $renters,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'renter_id' => 'required',
                'flat_id' => 'required',
                'month' => 'required',
                'payment_date' => 'required',
                'amount' => 'required',
            ], [
                'renter_id.required' => 'Renter is Required',
                'flat_id.required' => 'Flat is Required',
                'month.required' => 'Month is Required',
                'payment_date.required' => 'Payment Date is Required',
                'amount.required' => 'Amount is Required',
            ]);

            DB::beginTransaction();

            $monthInput = $request->input('month');
            $monthDate = Carbon::createFromFormat('m-Y', $monthInput)->startOfMonth();

            Payment::create([
                'renter_id' => $request->renter_id,
                'flat_id' => $request->flat_id,
                'month' => $monthDate,
                'payment_date' => $request->payment_date,
                'amount' => $request->amount,
                'note' => $request->note,
            ]);

            notyf()->addSuccess('Payment Added Successfully.');

            DB::commit();

            return redirect()->route('payments.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError($th->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function edit(Payment $payment)
    {
        $renters = Renter::query()->latest()->get();

        return view('payments.edit', [
            'renters' => $renters,
            'payment' => $payment,
        ]);
    }

    public function update(Request $request, Payment $payment)
    {
        try {
            $request->validate([
                'renter_id' => 'required',
                'flat_id' => 'required',
                'month' => 'required',
                'payment_date' => 'required',
                'amount' => 'required',
            ], [
                'renter_id.required' => 'Renter is Required',
                'flat_id.required' => 'Flat is Required',
                'month.required' => 'Month is Required',
                'payment_date.required' => 'Payment Date is Required',
                'amount.required' => 'Amount is Required',
            ]);

            DB::beginTransaction();

            $endMonth = Carbon::parse($request->end_month);
            $currentMonth = now()->startOfMonth();

            $flatStatus = $endMonth->isSameMonth($currentMonth)
                ? 'available'
                : 'leaving_soon';

            $payment->update([
                'end_month' => $request->end_month,
            ]);

            Flat::find($payment->flat_id)?->update([
                'status' => $flatStatus,
            ]);

            notyf()->addSuccess('Renter-Flat Updated Successfully.');

            DB::commit();

            return redirect()->route('payments.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError($th->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(Payment $payment)
    {
        try {
            DB::beginTransaction();

            $payment->delete();

            notyf()->addSuccess('Payment Deleted Successfully.');

            DB::commit();

            return redirect()->route('payments.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            notyf()->addError($th->getMessage());

            return redirect()->back();
        }
    }
}
