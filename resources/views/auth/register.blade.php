@extends('layouts.auth-layout')
@section('title', 'Register')
@section('content')

    <div class="bg-image" style="background-image: url('{{ asset('assets/media/photos/photo14@2x.jpg') }}');">
        <div class="row g-0 justify-content-center bg-black-75">
            <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                    <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-body-extra-light">
                        <div class="mb-2 text-center">
                            <a class="link-fx fw-bold fs-1" href="{{ url('/') }}">
                                <span class="text-dark">House</span><span class="text-primary">Hub</span>
                            </a>
                            <p class="text-uppercase fw-bold fs-sm text-muted">Create New Account</p>
                        </div>

                        <form class="js-validation-signup" action="{{ route('register') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <div class="input-group input-group-lg">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                    <span class="input-group-text">
                                            <i class="fa fa-user-circle"></i>
                                        </span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="input-group input-group-lg">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                    <span class="input-group-text">
                                            <i class="fa fa-envelope-open"></i>
                                        </span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="input-group input-group-lg">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                    <span class="input-group-text">
                                            <i class="fa fa-asterisk"></i>
                                        </span>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="input-group input-group-lg">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                                    <span class="input-group-text">
                                            <i class="fa fa-asterisk"></i>
                                        </span>
                                </div>
                            </div>

                            <div class="d-sm-flex justify-content-sm-between align-items-sm-center mb-4 bg-body rounded py-2 px-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="signup-terms" name="signup-terms">
                                    <label class="form-check-label" for="signup-terms">I agree</label>
                                </div>
                                <div class="fw-semibold fs-sm py-1">
                                    <a class="fw-semibold fs-sm" href="#" data-bs-toggle="modal" data-bs-target="#modal-terms">Terms &amp; Conditions</a>
                                </div>
                            </div>

                            <div class="text-center mb-2">
                                <button type="submit" class="btn btn-hero btn-primary">
                                    <i class="fa fa-fw fa-plus opacity-50 me-1"></i> Sign Up
                                </button>
                            </div>
                        </form>

                        <div class="d-sm-flex justify-content-sm-end align-items-sm-center text-center text-sm-start">
                            <div class="fs-sm py-1">
                                Already registered? <a class="fw-semibold" href="{{ route('login') }}">Sign In</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-terms" tabindex="-1" role="dialog" aria-labelledby="modal-terms" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-success">
                            <h3 class="block-title">Terms &amp; Conditions</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                            <p>Potenti elit lectus augue eget iaculis vitae etiam, ullamcorper etiam bibendum ad feugiat magna accumsan dolor, nibh molestie cras hac ac ad massa, fusce ante convallis ante urna molestie vulputate bibendum tempus ante justo arcu erat accumsan adipiscing risus, libero condimentum venenatis sit nisl nisi ultricies sed, fames aliquet consectetur consequat nostra molestie neque nullam scelerisque neque commodo turpis quisque etiam egestas vulputate massa, curabitur tellus massa venenatis congue dolor enim integer luctus, nisi suscipit gravida fames quis vulputate nisi viverra luctus id leo dictum lorem, inceptos nibh orci.</p>
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Done</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
