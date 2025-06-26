@extends('layouts.admin-layout')
@section('title', 'Invoices')
@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Reports</li>
                        <li class="breadcrumb-item">Invoices</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ now()->format('F - Y') }}'s Invoice</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title fw-bold">Invoice</h3>
                <div class="d-flex gap-2">
                    <a href="{{ route('invoices.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-arrow-left me-1"></i>
                        Back
                    </a>
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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
