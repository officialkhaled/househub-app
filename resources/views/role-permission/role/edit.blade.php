@extends('layouts.admin-layout')
@section('title', 'Edit Role')
@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Roles</li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit Role</h3>
                @can('create role')
                    <a href="{{ route('roles.index') }}" class="btn btn-primary">
                        <i class="fa-solid fa-arrow-left me-1"></i>
                        Back
                    </a>
                @endcan
            </div>

            <div class="block-content block-content-full overflow-x-auto">
                <form action="{{ route('roles.update', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row mb-4">
                        <div class="col-6 offset-3">
                            <div class="input-group">
                                    <span class="input-group-text input-group-text-alt">
                                       Permission Name
                                    </span>
                                <input type="text" class="form-control form-control-alt" id="name"
                                       name="name" value="{{ old('name', $role->name) }}" required>
                            </div>
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


<x-app-layout>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">

                @if ($errors->any())
                    <ul class="alert alert-warning mt-2">
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h2><b>Edit Role</b>
                            <a href="{{ url('roles') }}" class="btn btn-sm btn-danger float-end">
                                <i class="fa-solid fa-circle-chevron-left opacity-75"></i>&nbsp;&nbsp;Back
                            </a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('roles/'.$role->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name">Role Name</label>
                                <input type="text" name="name" value="{{ $role->name }}" class="form-control"/>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-floppy-disk opacity-75"></i>&nbsp;&nbsp;Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
