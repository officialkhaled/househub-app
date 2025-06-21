@extends('layouts.admin-layout')
@section('title', 'Utilities')
@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active" aria-current="page">Utilities</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title fw-bold">Utilities</h3>
                @can('create utility')
                    <a href="{{ route('utilities.create') }}" class="btn btn-primary">
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
                            <th>Flat</th>
                            <th>Name</th>
                            <th>Amount (BDT)</th>
                            {{--                            <th>Status</th>--}}
                            <th class="d-none d-sm-table-cell" style="width: 20%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($utilities as $utility)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td class="fw-semibold">{{ $utility->flat?->name }}</td>
                                <td class="fw-semibold">{{ $utility->name }}</td>
                                <td class="fw-semibold">{{ $utility->amount }}</td>
                                {{--                                <td class="fw-semibold">{{ $utility->status }}</td>--}}
                                <td class="d-none d-sm-table-cell">
                                    <div class="d-flex justify-content-center gap-2">
                                        @can('update utility')
                                            <a href="{{ route('utilities.edit', $utility->id) }}" class="btn btn-alt-success"
                                               data-bs-toggle="tooltip" data-bs-animation="true" data-bs-placement="top" title="Edit">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete utility')
                                            <form action="{{ route('utilities.destroy', $utility->id) }}" method="POST">
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
