@extends('layouts.admin-layout')
@php $month = now()->format('F - Y') @endphp
@section('title',  "Invoice for " . $month)
@section('content')

    @php
        $totalUtilitiesAmount = $invoice->flat?->utilities->sum('amount');
        $totalAmount = $invoice->flat?->rent_fee + $totalUtilitiesAmount;
    @endphp

    <div class="bg-body-light no-print">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Reports</li>
                        <li class="breadcrumb-item">Invoices</li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice for {{ $month }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title fw-bold">Billing Month: <span class="text-primary">{{ $month }}</span></h3>
                <div class="d-flex justify-content-between gap-2 no-print">
                    <a href="{{ route('invoices.index') }}" class="btn btn-alt-primary text-white">
                        <i class="fa-solid fa-circle-arrow-left"></i>
                    </a>
                    <button type="button" class="btn btn-primary" onclick="window.print()">
                        <i class="fa-solid fa-print me-1"></i>
                        Print
                    </button>
                </div>
            </div>

            <div class="block-content block-content-full overflow-x-auto">
                <div class="block block-rounded">
                    <div class="block-content text-center">
                        <div class="mb-3 py-2">
                            <div class="mb-3">
                                <img class="img-avatar img-avatar96" src="{{ asset('assets/media/avatars/avatar15.jpg') }}" alt="Avatar">
                            </div>
                            <h1 class="fs-lg mb-0">
                                {{ $invoice->renter?->name }}
                            </h1>
                            <p class="text-muted">
                                <i class="fa fa-phone text-warning me-1"></i>
                                {{ $invoice->renter?->phone }}
                            </p>
                        </div>
                    </div>

                    <div class="block-content bg-body-light text-center rounded">
                        <div class="row items-push text-uppercase">
                            <div class="col-6 col-md-3" style="border-right: 2px solid #343A40">
                                <div class="fw-semibold text-dark mb-1">House Rent</div>
                                <a class="link-fx fs-5" href="javascript:void(0)">{{ formatTaka($invoice->flat?->rent_fee) ?? 0 }}</a>
                            </div>
                            <div class="col-6 col-md-3" style="border-right: 2px solid #343A40">
                                <div class="fw-semibold text-dark mb-1">Previous Due</div>
                                <a class="link-fx fs-5" href="javascript:void(0)">{{ formatTaka(0) }}</a>
                            </div>
                            <div class="col-6 col-md-3" style="border-right: 2px solid #343A40">
                                <div class="fw-semibold text-dark mb-1">Balance</div>
                                <a class="link-fx fs-5" href="javascript:void(0)">{{ formatTaka(0) }}</a>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="fw-semibold text-dark mb-1">Total - To Pay</div>
                                <a class="link-fx fs-5" href="javascript:void(0)">{{ formatTaka($totalAmount) }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-rounded">
                    <div class="block-header block-header-default rounded">
                        <h3 class="block-title">Bill Breakdown</h3>
                    </div>
                    <div class="mt-4">
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <tbody>
                                <tr>
                                    <th class="text-center fs-md" width="40%">House Rent</th>
                                    <td class="d-none d-sm-table-cell text-center fs-md">{{ formatTaka($invoice->flat?->rent_fee) ?? 0 }}</td>
                                </tr>
                                @foreach($invoice->flat?->utilities as $utility)
                                    <tr>
                                        <th class="text-center fs-md" width="40%">{{ $utility->name ?? '' }}</th>
                                        <td class="d-none d-sm-table-cell text-center fs-md">{{ formatTaka($utility->amount) ?? 0 }}</td>
                                    </tr>
                                @endforeach

                                <tr class="table-active fs-lg">
                                    <th class="text-center" width="40%">Grand Total</th>
                                    <td class="d-none d-sm-table-cell text-center">{{ formatTaka($totalAmount) ?? 0 }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="block-content block-content-full text-center mt-3">
                <div class="d-flex justify-content-between gap-4 p-4">
                    <div>
                        <div style="border-top: 2px solid #343A40; width: 200px; margin: 0 auto;"></div>
                        <p class="mb-0 fw-semibold">Landlord Signature</p>
                    </div>
                    <div>
                        <div style="border-top: 2px solid #343A40; width: 200px; margin: 0 auto;"></div>
                        <p class="mb-0 fw-semibold">Renter Signature</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
