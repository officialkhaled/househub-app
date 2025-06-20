@extends('layouts.admin-layout')
@section('title', 'Edit Profile')
@section('content')

    <div class="bg-image" style="background-image: url('{{ asset('assets/media/photos/photo17@2x.jpg') }}');">
        <div class="bg-black-75">
            <div class="content content-full">
                <div class="py-5 text-center">
                    <a class="img-link" href="#">
                        <img class="img-avatar img-avatar96 img-avatar-thumb"
                             src="{{ auth()->user()->avatar ? storageAsset(auth()->user()->avatar) : asset('assets/media/avatars/avatar1.jpg') }}"
                             alt="Profile Image">
                    </a>
                    <h1 class="fw-bold my-2 text-white">Edit Account</h1>
                    <h2 class="h4 fw-bold text-white-75">
                        {{ auth()->user()->name }}
                    </h2>
                    <a class="btn btn-secondary" href="{{ route('dashboard') }}">
                        <i class="fa fa-fw fa-arrow-left opacity-50"></i> Back to Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="content content-full content-boxed">
        <div class="block block-rounded">
            <div class="block-content">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" onsubmit="return false;">
                    @csrf
                    @method('PATCH')

                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-user-circle text-muted me-1"></i> User Profile
                    </h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Your account’s vital info. Your username will be publicly visible.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                       placeholder="Enter your name.." value="{{ old('name', auth()->user()->name) }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="email">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email"
                                       placeholder="Enter your email.." value="{{ old('email', auth()->user()->email ?? '') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone"
                                       placeholder="Add your phone number.." value="{{ old('phone', auth()->user()->phone ?? '') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Your Avatar</label>
                                <div class="push">
                                    <img class="img-avatar" src="{{ auth()->user()->avatar ? storageAsset(auth()->user()->avatar) : asset('assets/media/avatars/avatar1.jpg') }}"
                                         alt="Avatar">
                                </div>
                                <label class="form-label" for="avatar">Choose a new avatar</label>
                                <input class="form-control" type="file" id="avatar">
                            </div>
                        </div>
                    </div>

                    <h2 class="content-heading pt-0">
                        <i class="fa fa-fw fa-asterisk text-muted me-1"></i> Change Password
                    </h2>
                    <div class="row push">
                        <div class="col-lg-4">
                            <p class="text-muted">
                                Changing your sign in password is an easy way to keep your account secure.
                            </p>
                        </div>
                        <div class="col-lg-8 col-xl-5">
                            <div class="mb-4">
                                <label class="form-label" for="password">Current Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="password-new">New Password</label>
                                    <input type="password" class="form-control" id="password-new" name="password-new">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="password-new-confirm">Confirm New Password</label>
                                    <input type="password" class="form-control" id="password-new-confirm" name="password-new-confirm">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row push">
                        <div class="col-lg-8 col-xl-5 offset-lg-4">
                            <div class="mb-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-circle opacity-50 me-1"></i> Update Profile
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Profile') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">--}}
{{--            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">--}}
{{--                <div class="max-w-xl">--}}
{{--                    @include('profile.partials.update-profile-information-form')--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">--}}
{{--                <div class="max-w-xl">--}}
{{--                    @include('profile.partials.update-password-form')--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">--}}
{{--                <div class="max-w-xl">--}}
{{--                    @include('profile.partials.delete-user-form')--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}
