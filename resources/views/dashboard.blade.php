@extends('layouts.admin-layout')
@section('title', 'Dashboard')
@section('content')

    <div class="content">
        <div class="row items-push mt-3">
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="#">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-primary mb-1">78</div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            Pending Orders
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold text-success mb-1">26%</div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            Profit
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold mb-1">126</div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            Orders Today
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-lg-3">
                <a class="block block-rounded block-link-shadow text-center h-100 mb-0" href="javascript:void(0)">
                    <div class="block-content py-5">
                        <div class="fs-3 fw-semibold mb-1">$16.485</div>
                        <p class="fw-semibold fs-sm text-muted text-uppercase mb-0">
                            Earnings Today
                        </p>
                    </div>
                </a>
            </div>
        </div>

        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Orders Overview</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                        <i class="si si-refresh"></i>
                    </button>
                </div>
            </div>
            <div class="block-content block-content-full">
                <!-- Chart.js is initialized in js/pages/be_pages_ecom_dashboard.min.js which was auto compiled from _js/pages/be_pages_ecom_dashboard.js) -->
                <!-- For more info and examples you can check out http://www.chartjs.org/docs/ -->
                <canvas id="js-chartjs-overview" style="height: 420px;"></canvas>
            </div>
        </div>
    </div>

@endsection
