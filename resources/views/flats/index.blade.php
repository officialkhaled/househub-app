@extends('layouts.admin-layout')
@section('title', 'Flats')
@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active" aria-current="page">Flats</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title fw-bold">Flats</h3>
                @can('create flat')
                    <a href="{{ route('flats.create') }}" class="btn btn-primary">
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
                            <th>Building</th>
                            <th>Floor</th>
                            <th>Name</th>
                            <th>Number of Rooms</th>
                            <th>SQFT Size</th>
                            <th>Rent Fee</th>
                            {{--                            <th>Status</th>--}}
                            <th class="d-none d-sm-table-cell" style="width: 20%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($flats as $flat)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td class="fw-semibold">{{ $flat->building?->name }}</td>
                                <td class="fw-semibold">{{ $flat->floor?->floor_number }}</td>
                                <td class="fw-semibold">{{ $flat->name }}</td>
                                <td class="fw-semibold">{{ $flat->number_of_rooms }}</td>
                                <td class="fw-semibold">{{ $flat->sqft_size }}</td>
                                <td class="fw-semibold">{{ $flat->rent_fee }}</td>
                                {{--                                <td class="fw-semibold">{{ $flat->status }}</td>--}}
                                <td class="d-none d-sm-table-cell">
                                    <div class="d-flex justify-content-center gap-2">
                                        @can('update flat')
                                            <a href="{{ route('flats.edit', $flat->id) }}" class="btn btn-alt-success"
                                               data-bs-toggle="tooltip" data-bs-animation="true" data-bs-placement="top" title="Edit">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete flat')
                                            <form action="{{ route('flats.destroy', $flat->id) }}" method="POST">
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
