@extends('layouts.admin-layout')
@section('title', 'Assign Renter-Flat')
@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Configurations</li>
                        <li class="breadcrumb-item active" aria-current="page">Assign Renter-Flat</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title fw-bold">Assign Renter-Flat</h3>
                @can('create renter-flat-assign')
                    <a href="{{ route('renter-flat-assign.create') }}" class="btn btn-primary">
                        <i class="fa-solid fa-plus me-1"></i>
                        Assign
                    </a>
                @endcan
            </div>

            <div class="block-content">
                <div class="block-content block-content-full overflow-x-auto">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 10%;">ID</th>
                            <th>Renter Name</th>
                            <th>Flat Name</th>
                            <th>Start Month</th>
                            <th>End Month</th>
                            <th>Status</th>
                            <th class="d-none d-sm-table-cell" style="width: 20%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($renterFlatAssigns as $renterFlatAssign)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td class="fw-semibold">{{ $renterFlatAssign->renter?->name }}</td>
                                <td class="fw-semibold">{{ $renterFlatAssign->flat?->name }}</td>
                                <td class="fw-semibold">{{ $renterFlatAssign->start_month }}</td>
                                <td class="fw-semibold">{{ $renterFlatAssign->end_month ?? '' }}</td>
                                <td class="fw-semibold">
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" value="active"
                                               id="status" name="status" checked>
                                        <label class="form-check-label" for="status">
                                            @php
                                                $status = match ($renterFlatAssign->flat?->status) {
                                                    'available' => 'Available',
                                                    'rented' => 'Rented',
                                                    'leaving_soon' => 'Leaving Soon',
                                                    default => 'Unknown',
                                                };
                                            @endphp
                                            {{ $status }}
                                        </label>
                                    </div>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <div class="d-flex justify-content-center gap-2">
                                        @if($renterFlatAssign->end_month == null)
                                            @can('update renter-flat-assign')
                                                <a href="{{ route('renter-flat-assign.edit', $renterFlatAssign->id) }}" class="btn btn-alt-success"
                                                   data-bs-toggle="tooltip" data-bs-animation="true" data-bs-placement="top" title="Edit">
                                                    <i class="fa-solid fa-edit"></i>
                                                </a>
                                            @endcan
                                        @endif
                                        @can('delete renter-flat-assign')
                                            <form action="{{ route('renter-flat-assign.destroy', $renterFlatAssign->id) }}" method="POST">
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
