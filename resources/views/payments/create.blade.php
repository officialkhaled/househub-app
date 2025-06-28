@extends('layouts.admin-layout')
@section('title', 'Add Payment')
@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                <nav class="flex-shrink-0 my-2 my-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item">Payment Records</li>
                        <li class="breadcrumb-item">Payments</li>
                        <li class="breadcrumb-item active" aria-current="page">Add Payment</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title fw-bold">Add Payment</h3>
                <a href="{{ route('payments.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-arrow-left me-1"></i>
                    Back
                </a>
            </div>

            <div class="block-content block-content-full overflow-x-auto">
                <form action="{{ route('payments.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-4 mb-4">
                            <label class="mb-1">Renter</label>
                            <select class="js-select2 form-select" id="renter_id"
                                    name="renter_id" style="width: 100%;" data-placeholder="Select a Renter..">
                                <option value="" disabled selected>Select a Renter..</option>
                                @foreach ($renters as $renter)
                                    <option value="{{ $renter->id }}">
                                        {{ $renter->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4 mb-4">
                            <label class="mb-1">Flat</label>
                            <input type="text" class="form-control form-control-alt" id="flat_name" disabled
                                   value="{{ old('flat_id') }}" placeholder="Renter" required>
                            <input type="hidden" id="flat_id" name="flat_id" value="{{ old('flat_id') }}">
                        </div>
                        <div class="col-4 mb-4">
                            <label class="mb-1">Month</label>
                            <input type="text" class="js-flatpickr-month form-control"
                                   id="month" name="month" placeholder="Select Month">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 mb-4">
                            <label class="mb-1">Payment Date</label>
                            <input type="text" class="js-flatpickr form-control"
                                   id="payment_date" name="payment_date"
                                   placeholder="Payment Date" value="{{ old('payment_date') }}">
                        </div>
                        <div class="col-6 mb-4">
                            <label class="mb-1">Amount (BDT)</label>
                            <input type="text" class="form-control form-control-alt" id="amount"
                                   name="amount" value="{{ old('amount') }}" placeholder="Amount" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-4">
                            <label class="mb-1">Note</label>
                            <textarea class="js-simplemde" id="note" name="note" placeholder="Type your note.."></textarea>
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
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            flatpickr(".js-flatpickr-month", {
                dateFormat: "m-Y",
                plugins: [
                    new monthSelectPlugin({
                        shorthand: true,
                        dateFormat: "m-Y",
                        altFormat: "F Y"
                    })
                ]
            });

            $('#renter_id').on('change', function () {
                var renter_id = $(this).val();

                if (renter_id) {
                    $.ajax({
                        url: "{{ route('api.get-renter-flat') }}",
                        type: "GET",
                        data: {
                            renter_id: renter_id
                        },
                        success: function (response) {
                            $('#flat_id').val(response.data.flat.id || '');
                            $('#flat_name').val(response.data.flat.name || 'N/A');
                        },
                        error: function () {
                            alert('Failed to load flat. Please try again.');
                        }
                    });
                } else {
                    $('#flat_id').val('');
                    $('#flat_name').val('');
                }
            });
        });
    </script>
@endsection
