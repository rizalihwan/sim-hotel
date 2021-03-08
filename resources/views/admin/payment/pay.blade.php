@extends('layouts.app', ['title' => 'HRI-HOTEL | Pay'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="#">
                        {{-- @csrf
                        @method('patch') --}}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Customer:</label>
                                        <span class="form-control">{{ $booking->customer->FullName }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Booking Code:</label>
                                        <span class="form-control">{{ $booking->booking_code }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Payment Type:</label>
                                        <span class="form-control">{{ $booking->payment_type }}</span>
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
                                @php
                                    $check_out = date_create($booking['check_out']);
                                    $check_in = date_create($booking['check_in']);
                                    $calculate = date_diff($check_out, $check_in);
                                    $day = $calculate->format("%a");
                                    $price = $day * $booking->room->price;
                                @endphp
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Total:</label>
                                        <input type="number" value="{{ $price }}" readonly class="form-control" required id="total">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Money:</label>
                                        <input type="number" class="form-control" required id="money">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Return:</label>
                                        <input type="number" value="0" class="form-control" required readonly id="return">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('admin.payment.index') }}" class="btn btn-light for-light">Back</a>
                            <a href="{{ route('admin.payment.index') }}" class="btn btn-secondary for-dark">Back</a>
                            <button class="btn btn-primary" type="submit" id="button">PAY</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>      
    window.onload = function() {
        document.getElementById('button').disabled = true
    }
    const pay = document.querySelector('#money');
    pay.addEventListener('keyup', function(){
        let returns = document.getElementById("return");
        let money = document.getElementById("money");
        let total = document.getElementById("total");
        returns.value = parseInt(money.value) - parseInt(total.value);
        if(isNaN(returns.value))
        {
            returns.value = "0";
        }
        if (parseInt(returns.value) < 0 || money.value == 0) {
            document.getElementById('button').disabled = true
        } else {
            document.getElementById('button').disabled = false
        }
    });
    </script>
@endsection