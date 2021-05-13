@extends('layouts.app', ['title' => 'HRI-HOTEL | Pay Booking'])
@section('style')
    <style>
        .yel {
            font-size: 1rem;
            text-align: center;
        }

    </style>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">Booking Payment</li>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                @if (request()->routeIs('customer.refresh'))
                    <h1><i class="fa fa-shopping-cart mr-2"></i></h1>
                    <h5>Booking Payment - Step 2</h5>
                    <div>
                        <small class="text-secondary">Please fill in / upload the proof of your booking payment
                            field.</small>
                    </div>
                @else
                    <h1><i class="fa fa-shopping-cart mr-2"></i></h1>
                    <h5>Booking Payment - Step 1</h5>
                    <div>
                        <small class="text-secondary">Please fill in the fields below and complete your payment.</small>
                    </div>
                @endif
            </div>
            <div class="card-body">
                @if (request()->routeIs('customer.refresh'))
                    @php
                        $check_out = date_create(request('check_out'));
                        $check_in = date_create(request('check_in'));
                        $calculate = date_diff($check_out, $check_in);
                        $day = $calculate->format('%a');
                        $price = $day * $room->price;
                    @endphp
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h5>Total : {{ 'Rp. ' . number_format($price, 0, ',', '.') }}</h5>
                            <span class="badge badge-danger mb-1"
                                style="font-size: 13px; color: #ffffff;"><b>{{ $day }}
                                    @if ($day == 1) Day @else Days @endif {{ '(' . $room->name . ' / ' . $room->category->name . ')' }}
                                    [Fasilitas &rightarrow;
                                    {{ $room->category->facility }}]
                                </b></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="{{ route('customer.booking.pay') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                {{-- customer data --}}
                                <input type="hidden" name="nik" value="{{ request('nik') }}">
                                <input type="hidden" name="first_name" value="{{ request('first_name') }}">
                                <input type="hidden" name="last_name" value="{{ request('last_name') }}">
                                <input type="hidden" name="phone" value="{{ request('phone') }}">
                                <input type="hidden" name="address" value="{{ request('address') }}">
                                {{-- booking data --}}
                                <input type="hidden" name="booking_code" value="{{ $now . '-' . $kode }}">
                                <input type="hidden" name="check_in" value="{{ request('check_in') }}">
                                <input type="hidden" name="check_out" value="{{ request('check_out') }}">
                                <input type="hidden" name="room_id" value="{{ $room->id }}">
                                <input type="hidden" name="payment_type" value="Now">
                                <input type="hidden" name="status" value="3">
                                <div class="dropzone" id="singleFileUpload">
                                    <div class="dz-message needsclick">
                                        <div>
                                            <input type="file" name="thumbnail" required>
                                        </div>
                                        <h6>Drop files here or click to upload.</h6><span class="note needsclick">(This form
                                            is for
                                            uploading evidence only. Please upload your proof file
                                            <strong>here.</strong>)</span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('customer.booking', $room->id) }}"
                                        class="btn btn-light for-light">Back</a>
                                    <a href="{{ route('customer.booking', $room->id) }}"
                                        class="btn btn-secondary for-dark">Back</a>
                                    <button class="btn btn-primary" type="submit">Send
                                        <i class="fa fa-check"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <form action="{{ route('customer.refresh', $room->id) }}" id="confirmation-booking" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-4">
                                    <h6><i class="fa fa-user mr-2" style="color: red;"></i>Your Personal Data</h6>
                                </div>
                                <div class="form-group">
                                    <label for="nik">Nik:</label>
                                    <input type="text" name="nik" id="nik"
                                        class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}"
                                        placeholder="your nik" autofocus>
                                    @error('nik')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <label for="first_name">First Name:</label>
                                        <input type="text" name="first_name" id="first_name"
                                            class="form-control @error('nik') is-invalid @enderror"
                                            value="{{ old('first_name') }}" placeholder="first name">
                                        @error('first_name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="last_name">Last Name:</label>
                                        <input type="text" name="last_name" id="last_name"
                                            class="form-control @error('last_name') is-invalid @enderror"
                                            value="{{ old('last_name') }}" placeholder="last name">
                                        @error('last_name')
                                            <span class="invalid-feedback">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="number" name="phone" id="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') }}" placeholder="your phone">
                                    @error('phone')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input type="text" name="address" id="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        value="{{ old('address') }}" placeholder="your address">
                                    @error('address')
                                        <span class="invalid-feedback">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="checkout-details">
                                    <div class="order-box">
                                        <div class="title-box mb-3">
                                            <div class="checkbox-title">
                                                <h6></h6><small><u>#{{ $now . '-' . $kode }}</u></small>
                                            </div>
                                        </div>
                                        <ul class="qty">
                                            <li>Price/Day: <span class="badge badge-danger"
                                                    style="font-size: 13px; color: #ffffff;"><b>{{ 'Rp. ' . number_format($room->price, 0, ',', '.') }}</b></span>
                                            </li>
                                            <li>Room: <span class="badge badge-info"
                                                    style="font-size: 13px; color: #ffffff;"><b>{{ $room->name }}</b></span>
                                            </li>
                                            <li>Room Category: <span class="badge badge-success"
                                                    style="font-size: 13px; color: #ffffff;"><b>{{ $room->category->name }}</b></span>
                                            </li>
                                        </ul>
                                        <div class="form-group">
                                            <label class="col-form-label" for="check_in">Check in:</label>
                                            <input
                                                class="datepicker-here form-control @error('check_in') is-invalid @enderror"
                                                type="text" name="check_in" id="check_in" value="{{ old('check_in') }}"
                                                placeholder="check in" data-language="en">
                                            @error('check_in')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label" for="check_out">Check out:</label>
                                            <input
                                                class="datepicker-here form-control @error('check_out') is-invalid @enderror"
                                                type="text" name="check_out" id="check_out"
                                                value="{{ old('check_out') }}" placeholder="check out"
                                                data-language="en">
                                            @error('check_out')
                                                <span class="invalid-feedback">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="modal-footer">
                                            <a href="{{ route('customer.survey') }}"
                                                class="btn btn-light for-light">Back</a>
                                            <a href="{{ route('customer.survey') }}"
                                                class="btn btn-secondary for-dark">Back</a>
                                            <button class="btn btn-primary" type="button" onclick="confirmation()">Next Step
                                                <i class="fa fa-chevron-circle-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <script>
        function confirmation() {
            Swal.fire({
                title: 'Message Information!',
                text: 'Are you sure the fields you have entered are correct?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, Next!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Is continuing steps...",
                        showConfirmButton: false,
                        timer: 2300,
                        timerProgressBar: true,
                        onOpen: () => {
                            document.getElementById('confirmation-booking').submit();
                            Swal.showLoading();
                        }
                    });
                }
            })
        }

    </script>
@endsection
