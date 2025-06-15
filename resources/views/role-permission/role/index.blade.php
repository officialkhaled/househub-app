@extends('layouts.admin-layout')
@section('title', 'Roles')
@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active" aria-current="page">Roles</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Roles</h3>
                @can('create role')
                    <a href="{{ route('roles.create') }}" class="btn btn-primary">
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
                            <th class="d-none d-sm-table-cell" style="width: 35%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                <td class="fw-semibold">{{ $role->name }}</td>
                                <td class="d-none d-sm-table-cell">
                                    <div class="d-flex justify-content-center gap-2">
                                        @can('create role')
                                            <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="btn btn-alt-warning">
                                                <i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add/Edit Role Permission
                                            </a>
                                        @endcan
                                        @can('update role')
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-alt-success"
                                               data-bs-toggle="tooltip" data-bs-animation="true" data-bs-placement="top" title="Edit">
                                                <i class="fa-solid fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('delete role')
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
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
