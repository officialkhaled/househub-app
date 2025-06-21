<?php

namespace App\Http\Controllers;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = [];

        return view('invoices.index', [
            'invoices' => $invoices,
        ]);
    }

    public function generateInvoice()
    {

    }

    public function destroy()
    {

    }
}
