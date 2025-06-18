@extends('layouts.admin-layout')
@section('title', 'Maintenance Mode | HouseHub')
@section('content')

    <div class="bg-image" style="background-image: url('{{ asset('assets/media/photos/photo24@2x.jpg') }}');">
        <div class="hero bg-black-90">
            <div class="hero-inner">
                <div class="content content-full">
                    <div class="px-3 py-5 text-center">
                        <div class="mb-3">
                            <a class="link-fx fw-bold fs-1" href="{{ url('/') }}">
                                <span class="text-white">House</span><span class="text-primary">Hub</span>
                            </a>
                            <p class="text-uppercase fw-bold fs-sm text-muted">Maintenance Mode</p>
                        </div>

                        <h1 class="text-white fw-bold mt-5 mb-3">Working on some stuff..</h1>
                        <h2 class="h3 text-white-75 fw-normal text-muted mb-5">Don’t worry though, we’ll be back soon!</h2>
                        <a class="btn btn-hero btn-primary mb-3" href="#">
                            <i class="fa fa-flask opacity-50 me-1"></i> Check out Status Page
                        </a>

                        <br>

                        <a class="btn btn-sm btn-secondary" href="{{ url('/') }}">
                            <i class="fa fa-arrow-left opacity-50 me-1"></i> Go Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
