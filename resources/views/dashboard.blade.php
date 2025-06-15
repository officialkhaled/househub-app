@extends('layouts.admin-layout')
@section('title', 'Dashboard')
@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row items-push">
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

        <div class="row">
            <div class="col-xl-6">
                <!-- Top Products -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Top Products</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-striped table-vcenter fs-sm">
                            <tbody>
                            <tr>
                                <td class="text-center" style="width: 100px;">
                                    <a class="fw-semibold" href="#">PID.965</a>
                                </td>
                                <td>
                                    <a class="fw-medium" href="#">Diablo III</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end text-nowrap">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" style="width: 100px;">
                                    <a class="fw-semibold" href="#">PID.154</a>
                                </td>
                                <td>
                                    <a class="fw-medium" href="#">Control</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end text-nowrap">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" style="width: 100px;">
                                    <a class="fw-semibold" href="#">PID.523</a>
                                </td>
                                <td>
                                    <a class="fw-medium" href="#">Minecraft</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end text-nowrap">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" style="width: 100px;">
                                    <a class="fw-semibold" href="#">PID.423</a>
                                </td>
                                <td>
                                    <a class="fw-medium" href="#">Hollow Knight</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end text-nowrap">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" style="width: 100px;">
                                    <a class="fw-semibold" href="#">PID.391</a>
                                </td>
                                <td>
                                    <a class="fw-medium" href="#">Sekiro: Shadows Die Twice</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end text-nowrap">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" style="width: 100px;">
                                    <a class="fw-semibold" href="#">PID.218</a>
                                </td>
                                <td>
                                    <a class="fw-medium" href="#">NBA 2K20</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end text-nowrap">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" style="width: 100px;">
                                    <a class="fw-semibold" href="#">PID.995</a>
                                </td>
                                <td>
                                    <a class="fw-medium" href="#">Forza Motorsport 7</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end text-nowrap">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" style="width: 100px;">
                                    <a class="fw-semibold" href="#">PID.761</a>
                                </td>
                                <td>
                                    <a class="fw-medium" href="#">Minecraft</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end text-nowrap">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" style="width: 100px;">
                                    <a class="fw-semibold" href="#">PID.860</a>
                                </td>
                                <td>
                                    <a class="fw-medium" href="#">Dark Souls III</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end text-nowrap">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center" style="width: 100px;">
                                    <a class="fw-semibold" href="#">PID.952</a>
                                </td>
                                <td>
                                    <a class="fw-medium" href="#">Age of Mythology</a>
                                </td>
                                <td class="d-none d-sm-table-cell text-end text-nowrap">
                                    <div class="text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Top Products -->
            </div>
            <div class="col-xl-6">
                <!-- Latest Orders -->
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Latest Orders</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <table class="table table-borderless table-striped table-vcenter fs-sm">
                            <tbody>
                            <tr>
                                <td class="fw-semibold text-center" style="width: 100px;">
                                    <a href="#">ORD.7116</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-medium" href="#">Sara Fields</a>
                                </td>
                                <td>
                                    <span class="badge bg-success">Delivered</span>
                                </td>
                                <td class="fw-semibold text-end">$549,00</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-center">
                                    <a href="#">ORD.7115</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-medium" href="#">Brian Cruz</a>
                                </td>
                                <td>
                                    <span class="badge bg-danger">Canceled</span>
                                </td>
                                <td class="fw-semibold text-end">$649,00</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-center">
                                    <a href="#">ORD.7114</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-medium" href="#">Carol Ray</a>
                                </td>
                                <td>
                                    <span class="badge bg-success">Delivered</span>
                                </td>
                                <td class="fw-semibold text-end">$405,00</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-center">
                                    <a href="#">ORD.7113</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-medium" href="#">Carol Ray</a>
                                </td>
                                <td>
                                    <span class="badge bg-warning">Processing</span>
                                </td>
                                <td class="fw-semibold text-end">$820,00</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-center">
                                    <a href="#">ORD.7112</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-medium" href="#">Melissa Rice</a>
                                </td>
                                <td>
                                    <span class="badge bg-success">Delivered</span>
                                </td>
                                <td class="fw-semibold text-end">$583,00</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-center">
                                    <a href="#">ORD.7111</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-medium" href="#">Barbara Scott</a>
                                </td>
                                <td>
                                    <span class="badge bg-warning">Processing</span>
                                </td>
                                <td class="fw-semibold text-end">$967,00</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-center">
                                    <a href="#">ORD.7110</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-medium" href="#">Betty Kelley</a>
                                </td>
                                <td>
                                    <span class="badge bg-success">Delivered</span>
                                </td>
                                <td class="fw-semibold text-end">$692,00</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-center">
                                    <a href="#">ORD.7109</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-medium" href="#">Betty Kelley</a>
                                </td>
                                <td>
                                    <span class="badge bg-warning">Processing</span>
                                </td>
                                <td class="fw-semibold text-end">$573,00</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-center">
                                    <a href="#">ORD.7108</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-medium" href="#">Lori Grant</a>
                                </td>
                                <td>
                                    <span class="badge bg-success">Delivered</span>
                                </td>
                                <td class="fw-semibold text-end">$401,00</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold text-center">
                                    <a href="#">ORD.7107</a>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <a class="fw-medium" href="#">Melissa Rice</a>
                                </td>
                                <td>
                                    <span class="badge bg-danger">Canceled</span>
                                </td>
                                <td class="fw-semibold text-end">$334,00</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END Latest Orders -->
            </div>
        </div>
    </div>

@endsection
