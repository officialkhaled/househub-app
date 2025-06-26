<?php

namespace App\Http\Controllers;

use App\Models\RenterFlatAssign;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = RenterFlatAssign::query()
            ->with(['flat', 'renter'])
            ->latest()
            ->get();

        return view('invoices.index', [
            'invoices' => $invoices,
        ]);
    }

    public function generateInvoice()
    {

    }

    public function show(RenterFlatAssign $invoice)
    {
        return view('invoices.show', [
            'invoice' => $invoice,
        ]);
    }
}
