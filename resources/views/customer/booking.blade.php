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
                <h1><i class="fa fa-shopping-cart mr-2"></i></h1><h5>Booking Payment - Step 1</h5>
                <div>
                   <small class="text-secondary">Please fill in the fields below and complete your payment.</small>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="mb-4">
                            <h6><i class="fa fa-user mr-2" style="color: red;"></i>Your Personal Data</h6>
                        </div>
                        <div class="form-group">
                            <label for="nik">Nik:</label>
                            <input type="text" name="nik" id="nik" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="first_name">First Name:</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="last_name">First Name:</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="number" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" name="address" id="address" class="form-control" required>
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
                                    <li>Room: <span class="badge badge-secondary"
                                            style="font-size: 13px; color: #ffffff;"><b>{{ $room->name }}</b></span>
                                    </li>
                                    <li>Room Category: <span class="badge badge-success"
                                            style="font-size: 13px; color: #ffffff;"><b>{{ $room->category->name }}</b></span>
                                    </li>
                                </ul>
                                <div class="form-group">
                                    <label class="col-form-label" for="check_in">Check in:</label>
                                    <input class="datepicker-here form-control" type="text" name="check_in"
                                        id="check_in" placeholder="check in" data-language="en" required>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label" for="check_out">Check out:</label>
                                    <input class="datepicker-here form-control" type="text" name="check_out"
                                        id="check_out" placeholder="check out" data-language="en" required>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('customer.survey') }}" class="btn btn-light for-light">Back</a>
                                    <a href="{{ route('customer.survey') }}" class="btn btn-secondary for-dark">Back</a>
                                    <button class="btn btn-primary" type="submit" id="button">Next Step <i class="fa fa-chevron-circle-right"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
