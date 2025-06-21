@extends('layouts.admin-layout')
@section('title', 'Edit Renter-Flat Assign')
@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Configuration</li>
                        <li class="breadcrumb-item">Assign Renter-Flat</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Renter-Flat Assign</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title fw-bold">Edit Renter-Flat Assign</h3>
                <a href="{{ route('renter-flat-assign.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Back
                </a>
            </div>

            <div class="block-content block-content-full overflow-x-auto">
                <form action="{{ route('renter-flat-assign.update', $renterFlatAssign->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="mb-1">Renter</label>
                            <input type="text" class="form-control" value="{{ $renterFlatAssign->renter?->name }}"
                                   id="renter_id" name="renter_id" disabled>
                        </div>
                        <div class="col-6">
                            <label class="mb-1">Flat</label>
                            <input type="text" class="form-control" value="{{ $renterFlatAssign->flat?->name }} (Building: {{ $renterFlatAssign->flat?->building?->name }}, Floor: {{ $renterFlatAssign->flat?->floor?->floor_number }})"
                                   id="flat_id" name="flat_id" disabled>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="form-label">Start Month</label>
                            <input type="text" class="form-control" value="{{ $renterFlatAssign->start_month }}"
                                   id="start_month" name="start_month" disabled>
                        </div>
                        <div class="col-6">
                            <label class="form-label">End Month</label>
                            <input type="text" class="js-flatpickr form-control"
                                   id="end_month" name="end_month" placeholder="Select End Month">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12 text-end">
                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" class="btn btn-alt-secondary" onclick="pageRefresh()">
                                    <i class="fa-solid fa-refresh me-1"></i>
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-save me-1"></i>
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

