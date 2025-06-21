@extends('layouts.admin-layout')
@section('title', 'Invoices')
@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active" aria-current="page">Invoices</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row items-push">
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-primary mb-1">{{ date('F, Y') }}</div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            Current Month
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold mb-1 text-success">89,000 BDT</div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            This Month Earnings
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold mb-1 text-warning">110,000 BDT</div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            Last Month Earnings
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold mb-1">12</div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            Renters Count
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title fw-bold">Invoices</h3>
                <div class="d-flex gap-2">
                    @can('generate invoice')
                        <a href="{{ route('invoices.generate-invoice') }}" class="btn btn-alt-primary">
                            <i class="fa-solid fa-gear me-1"></i>
                            Configure Invoice
                        </a>
                    @endcan
                    @can('generate invoice')
                        <a href="{{ route('invoices.generate-invoice') }}" class="btn btn-primary">
                            <i class="fa-solid fa-wand-magic-sparkles me-1"></i>
                            Generate Invoice
                        </a>
                    @endcan
                </div>
            </div>

            <div class="block-content">
                <div class="block-content block-content-full overflow-x-auto">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 10%;">ID</th>
                            <th>Month</th>
                            <th class="d-none d-sm-table-cell" style="width: 20%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($invoices as $invoice)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td class="fw-semibold">{{ $invoice->month }}</td>
                                <td class="d-none d-sm-table-cell">
                                    <div class="d-flex justify-content-center gap-2">
                                        @can('update invoice')
                                            <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-alt-success"
                                               data-bs-toggle="tooltip" data-bs-animation="true" data-bs-placement="top" title="Edit">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete invoice')
                                            <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-alt-danger"
                                                        data-bs-toggle="tooltip" data-bs-animation="true" data-bs-placement="top" title="Delete">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
