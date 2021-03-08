@extends('layouts.app', ['title' => 'HRI-HOTEL | Pay'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.booking.update', $booking->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Booking Code:</label>
                                        <span class="form-control">{{ $booking->booking_code }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Customer:</label>
                                        <span class="form-control">{{ $booking->customer->FullName }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Check in:</label>
                                        <span class="form-control">{{ $booking->check_in }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Check out:</label>
                                        <span class="form-control">{{ $booking->check_out }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Payment Type:</label>
                                        <span class="form-control">{{ $booking->payment_type }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('admin.payment.index') }}" class="btn btn-light for-light">Back</a>
                            <a href="{{ route('admin.payment.index') }}" class="btn btn-secondary for-dark">Back</a>
                            <button class="btn btn-primary" type="submit">PAY</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection