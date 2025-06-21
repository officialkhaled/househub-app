@extends('layouts.admin-layout')
@section('title', 'Edit Floor')
@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Building Management</li>
                        <li class="breadcrumb-item">Floors</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Floor</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title fw-bold">Edit Floor</h3>
                <a href="{{ route('floors.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Back
                </a>
            </div>

            <div class="block-content block-content-full overflow-x-auto">
                <form action="{{ route('floors.update', $floor->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-6 mb-4">
                            <label class="mb-1">Building</label>
                            <select class="js-select2 form-select" id="building_id"
                                    name="building_id" style="width: 100%;" data-placeholder="Select a Building..">
                                @foreach ($buildings as $building)
                                    <option value="{{ $building->id }}" {{ $floor->building_id === $building->id ? 'selected' : '' }}>
                                        {{ $building->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6 mb-4">
                            <label class="mb-1">Floor Number</label>
                            <input type="text" class="form-control form-control-alt" id="floor_number"
                                   name="floor_number" value="{{ old('floor_number', $floor->floor_number) }}" placeholder="Floor Number" required>
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
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

