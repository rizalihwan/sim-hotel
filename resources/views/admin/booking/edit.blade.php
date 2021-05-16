@extends('layouts.app', ['title' => 'HRI-HOTEL | Edit Booking'])
@section('breadcrumb')
    <li class="breadcrumb-item">Edit Booking</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-form-label" for="customer_id">Customer:</label>
                                        <select name="customer_id" id="customer_id" class="form-control custom-select"
                                            required>
                                            @foreach ($customers as $customer)
                                                <option {{ $customer->id == $booking->customer_id ? 'selected' : '' }}
                                                    value="{{ $customer->id }}">{{ $customer->FullName }}</option>
                                            @endforeach
                                        </select>
                                        @error('customer_id')
                                            <span>
                                                <strong style="color: red;">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="check_in">Check in:</label>
                                        <input class="datepicker-here form-control @error('check_in') is-invalid @enderror"
                                            type="text"
                                            value="{{ Str::limit($booking->check_in, 10, '') ?? old('check_in') }}"
                                            name="check_in" id="check_in" placeholder="check in" data-language="en"
                                            required>
                                        @error('check_in')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="check_out">Check out:</label>
                                        <input class="datepicker-here form-control @error('check_out') is-invalid @enderror"
                                            type="text"
                                            value="{{ Str::limit($booking->check_out, 10, '') ?? old('check_out') }}"
                                            name="check_out" id="check_out" placeholder="check out" data-language="en"
                                            required>
                                        @error('check_out')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="code">Booking Code:</label>
                                        <input class="form-control @error('booking_code') is-invalid @enderror" type="text"
                                            value="{{ $booking->booking_code ?? old('booking_code') }}"
                                            name="booking_code" id="code" placeholder="booking code" readonly required>
                                        @error('booking_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label" for="payment_type">Payment Type:</label>
                                        <select name="payment_type" id="payment_type" class="form-control custom-select"
                                            required>
                                            <option @if ($booking->payment_type == 'Now') selected @endif value="Now">Now</option>
                                            <option @if ($booking->payment_type == 'Checkout') selected @endif value="Checkout">Checkout</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="room_id" value="{{ $booking->room_id }}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('admin.booking.index') }}" class="btn btn-light for-light">Back</a>
                            <a href="{{ route('admin.booking.index') }}" class="btn btn-secondary for-dark">Back</a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
