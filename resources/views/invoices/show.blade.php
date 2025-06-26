@extends('layouts.admin-layout')
@php $month = now()->format('F - Y') @endphp
@section('title',  "Invoice for " . $month)
@section('content')

    <div class="bg-body-light">
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
                <div class="d-flex gap-2">
                    <a href="{{ route('invoices.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-arrow-left me-1"></i>
                        Back
                    </a>
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

                    <div class="block-content bg-body-light text-center">
                        <div class="row items-push text-uppercase">
                            <div class="col-6 col-md-3">
                                <div class="fw-semibold text-dark mb-1">House Rent</div>
                                <a class="link-fx fs-3" href="javascript:void(0)">${{ number_format($invoice->flat?->rent_fee, 2) ?? 0 }}</a>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="fw-semibold text-dark mb-1">Previous Due</div>
                                <a class="link-fx fs-3" href="javascript:void(0)">${{ number_format(0, 2) }}</a>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="fw-semibold text-dark mb-1">Balance</div>
                                <a class="link-fx fs-3" href="javascript:void(0)">${{ number_format(0, 2) }}</a>
                            </div>
                            <div class="col-6 col-md-3">
                                <div class="fw-semibold text-dark mb-1">Total - To Pay</div>
                                <a class="link-fx fs-3" href="javascript:void(0)">${{ number_format(($invoice->flat?->rent_fee + 500 + 1080), 2) }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Bill Breakdown</h3>
                    </div>
                    <div class="mt-4">
                        <div class="table-responsive">
                            <table class="table table-bordered table-vcenter">
                                <thead class="table-info">
                                <tr>
                                    <th class="text-center" style="width: 100px;">ID</th>
                                    <th class="d-none d-sm-table-cell text-center">Added</th>
                                    <th class="d-none d-md-table-cell">Product</th>
                                    <th>Status</th>
                                    <th class="d-none d-sm-table-cell text-end">Value</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-center fs-sm">
                                        <a class="fw-semibold" href="#">
                                            PID.0154 </a>
                                    </td>
                                    <td class="d-none d-sm-table-cell text-center fs-sm">02/05/2024</td>
                                    <td class="d-none d-md-table-cell fs-sm">
                                        <a class="fw-semibold" href="#">Product #4</a>
                                    </td>
                                    <td>
                                        <span class="badge bg-success">Available</span>
                                    </td>
                                    <td class="text-end d-none d-sm-table-cell fs-sm">
                                        <strong>$95,00</strong>
                                    </td>
                                    <td class="text-center fs-sm">
                                        <a class="btn btn-sm btn-alt-secondary" href="#">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)">
                                            <i class="fa fa-fw fa-times text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
