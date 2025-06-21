@extends('layouts.admin-layout')
@section('title', 'Add Building')
@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Building Management</li>
                        <li class="breadcrumb-item">Buildings</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Building</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title fw-bold">Add Building</h3>
                <a href="{{ route('buildings.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Back
                </a>
            </div>

            <div class="block-content block-content-full overflow-x-auto">
                <form action="{{ route('buildings.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-4 mb-4">
                            <div class="input-group">
                                <span class="input-group-text input-group-text-alt">
                                   Building Name
                                </span>
                                <input type="text" class="form-control form-control-alt" id="name"
                                       name="name" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="col-4 mb-4">
                            <div class="input-group">
                                <span class="input-group-text input-group-text-alt">
                                   House Number
                                </span>
                                <input type="text" class="form-control form-control-alt" id="house_number"
                                       name="house_number" value="{{ old('house_number') }}" required>
                            </div>
                        </div>
                        <div class="col-4 mb-4">
                            <div class="input-group">
                                <span class="input-group-text input-group-text-alt">
                                   Total Floors (optional)
                                </span>
                                <input type="text" class="form-control form-control-alt" id="total_floors"
                                       name="total_floors" value="{{ old('total_floors') }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-4">
                            <label class="mb-1">Address</label>
                            <textarea class="js-simplemde" id="address" name="address" placeholder="Type here...">{{ old('address') }}</textarea>
                        </div>
                        <div class="col-6 mb-4">
                            <label class="mb-1">Description (optional)</label>
                            <textarea class="js-simplemde" id="description" name="description" placeholder="Type here...">{{ old('description') }}</textarea>
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

