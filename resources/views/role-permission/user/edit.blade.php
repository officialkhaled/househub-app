@extends('layouts.admin-layout')
@section('title', 'Edit User')
@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Users</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title fw-bold">Edit User</h3>
                <a href="{{ route('users.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Back
                </a>
            </div>

            <div class="block-content block-content-full overflow-x-auto">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-6 offset-3 mb-4">
                            <label>Name</label>
                            <input type="text" class="form-control form-control-alt" id="name"
                                   name="name" value="{{ old('name', $user->name) }}" required>
                        </div>
                        <div class="col-6 offset-3 mb-4">
                            <label>Email</label>
                            <input type="email" class="form-control form-control-alt" id="email"
                                   name="email" value="{{ old('email', $user->email) }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 offset-3 mb-4">
                            <label>Password</label>
                            <input type="password" class="form-control form-control-alt" id="password"
                                   name="password">
                        </div>
                        <div class="col-6 offset-3 mb-4">
                            <label>Roles</label>
                            <select class="js-select2 form-select" id="roles"
                                    name="roles[]" style="width: 100%;" data-placeholder="Choose one..">
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}" {{ in_array($role, $userRoles) ? 'selected' : '' }}>
                                        {{ $role }}
                                    </option>
                                @endforeach
                            </select>
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
