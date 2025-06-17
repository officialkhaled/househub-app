@extends('layouts.admin-layout')
@section('title', 'Add Role-Permission')
@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Roles</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Role-Permission</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title fw-bold">Role:
                    <span class="badge bg-primary">
                        {{ $role->name }}
                    </span>
                </h3>
                @can('create role')
                    <a href="{{ route('roles.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-arrow-left me-1"></i>
                        Back
                    </a>
                @endcan
            </div>

            <div class="block-content block-content-full overflow-x-auto">
                <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-4">
                        <label class="mb-4 fw-bold">Permissions</label>

                        @foreach ($permissions as $permission)
                            <div class="col-md-2">
                                <label>
                                    <input
                                        type="checkbox"
                                        name="permission[]"
                                        value="{{ $permission->name }}"
                                        {{ in_array($permission->id, $rolePermissions) ? 'checked':'' }}
                                    />
                                    {{ $permission->name }}
                                </label>
                            </div>
                        @endforeach
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
