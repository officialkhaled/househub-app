@extends('layouts.admin-layout')
@section('title', 'Payments')
@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Payment Records</li>
                        <li class="breadcrumb-item active" aria-current="page">Payments</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title fw-bold">Payments</h3>
                @can('create payment')
                    <a href="{{ route('payments.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus me-1"></i>
                        Add
                    </a>
                @endcan
            </div>

            <div class="block-content">
                <div class="block-content block-content-full overflow-x-auto">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 10%;">ID</th>
                            <th>Name</th>
                            <th>Flat</th>
                            <th>Payment for Month</th>
                            @canany(['update payment', 'delete payment'])
                                <th class="d-none d-sm-table-cell" style="width: 20%;">Action</th>
                            @endcanany
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td class="fw-semibold">{{ $payment->renter?->name }}</td>
                                <td class="fw-semibold">
                                    {{ $payment->flat?->name . ' (Building: ' . $payment->flat?->building?->name . ', Floor: ' . $payment->flat?->floor?->floor_number . ')' }}
                                </td>
                                <td class="fw-semibold">{{ $payment->month->format('M, Y') }}</td>
                                @canany(['update payment', 'delete payment'])
                                    <td class="d-none d-sm-table-cell">
                                        <div class="d-flex justify-content-center gap-2">
                                            @can('update payment')
                                                <a href="{{ route('payments.edit', $payment->id) }}" class="btn btn-alt-success"
                                                   data-bs-toggle="tooltip" data-bs-animation="true" data-bs-placement="top" title="Edit">
                                                    <i class="fa-solid fa-edit"></i>
                                                </a>
                                            @endcan
                                            {{--                                        @can('delete payment')--}}
                                            {{--                                            <form action="{{ route('payments.destroy', $payment->id) }}" method="POST" data-confirm-delete>--}}
                                            {{--                                                @csrf--}}
                                            {{--                                                @method('DELETE')--}}
                                            {{--                                                <button type="submit" class="btn btn-alt-danger"--}}
                                            {{--                                                        data-bs-toggle="tooltip" data-bs-animation="true" data-bs-placement="top" title="Delete">--}}
                                            {{--                                                    <i class="fa-solid fa-trash"></i>--}}
                                            {{--                                                </button>--}}
                                            {{--                                            </form>--}}
                                            {{--                                        @endcan--}}
                                        </div>
                                    </td>
                                @endcanany
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
