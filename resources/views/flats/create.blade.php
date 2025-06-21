@extends('layouts.admin-layout')
@section('title', 'Add Flat')
@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Building Management</li>
                        <li class="breadcrumb-item">Flats</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Flat</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title fw-bold">Add Flat</h3>
                <a href="{{ route('flats.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Back
                </a>
            </div>

            <div class="block-content block-content-full overflow-x-auto">
                <form action="{{ route('flats.store') }}" method="POST">
                    @csrf

                    <div class="row mb-4">
                        <div class="col-4">
                            <label class="mb-1">Building</label>
                            <select class="js-select2 form-select" id="building_id"
                                    name="building_id" style="width: 100%;" data-placeholder="Select a Building..">
                                <option value="" disabled selected>Select a Building..</option>
                                @foreach ($buildings as $building)
                                    <option value="{{ $building->id }}" {{ old('building_id') === $building->id ? 'selected' : '' }}>
                                        {{ $building->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="mb-1">Floor</label>
                            <select class="js-select2 form-select" id="floor_id"
                                    name="floor_id" style="width: 100%;" data-placeholder="Select a Floor..">
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="mb-1">Flat Name</label>
                            <input type="text" class="form-control form-control-alt" id="name"
                                   name="name" value="{{ old('name') }}" placeholder="Flat Name" required>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-4">
                            <label class="mb-1">Number of Rooms</label>
                            <input type="number" class="form-control form-control-alt" id="number_of_rooms"
                                   name="number_of_rooms" value="{{ old('number_of_rooms') }}" placeholder="Number of Rooms" required>
                        </div>
                        <div class="col-4">
                            <label class="mb-1">Size (Sq. Ft.)</label>
                            <input type="number" class="form-control form-control-alt" id="sqft_size"
                                   name="sqft_size" value="{{ old('sqft_size') }}" placeholder="Size (Sq. Ft.)" required>
                        </div>
                        <div class="col-4">
                            <label class="mb-1">Rent Fee (BDT)</label>
                            <input type="number" class="form-control form-control-alt" id="rent_fee"
                                   name="rent_fee" value="{{ old('rent_fee') }}" placeholder="Rent Fee" required>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-12">
                            <label class="mb-1">Description</label>
                            <textarea class="js-simplemde" id="description" name="description"
                                      placeholder="Description">{{ old('description') }}</textarea>
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

@section('scripts')

    <script>
        $(document).ready(function () {
            $('#building_id').on('change', function () {
                var building_id = $(this).val();

                if (building_id) {
                    $.ajax({
                        url: "{{ route('api.get-floors') }}",
                        type: "GET",
                        data: {
                            building_id: building_id
                        },
                        success: function (response) {
                            $('#floor_id').empty();
                            $('#floor_id').append('<option value="">Select Floor</option>');

                            $.each(response.data, function (key, floor) {
                                $('#floor_id').append('<option value="' + floor.id + '">' + floor.floor_number + '</option>');
                            });
                        },
                        error: function () {
                            alert('Failed to load floors. Please try again.');
                        }
                    });
                } else {
                    $('#floor_id').empty().append('<option value="">Select Floor</option>');
                }
            });
        });
    </script>

@endsection
