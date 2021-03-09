@extends('layouts.app', ['title' => 'HRI-HOTEL | Pay'])
@section('style')
    <style>
        .yel
        {
            font-size: 1rem;
            text-align: center;
        }
        .addrh
        {
            height: 150px;
        }
    </style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h5>Checkout</h5>
      </div>
      <div class="card-body">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="form-group">
                  <label>Nik:</label>
                  <span class="form-control p-2 yel">{{ $booking->customer->nik }}</span>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label>Customer:</label>
                        <span class="form-control">{{ $booking->customer->FullName }}</span>
                    </div>
                    <div class="form-group col-sm-6">
                        <label>Phone:</label>
                        <span class="form-control">{{ $booking->customer->phone }}</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <span class="form-control addrh">{{ $booking->customer->address }}</span>
                </div>    
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="checkout-details">
            <div class="order-box">
                <div class="title-box mb-3">
                    <div class="checkbox-title">
                        <h6></h6><small><u>#{{ $booking->booking_code }}</u></small>
                    </div>
                        </div>
                            <form action="{{ route('admin.payment.success', $booking->id) }}" method="POST">
                                @csrf
                                @method('patch')
                                <ul class="qty">
                                    <li>Room: <span class="badge badge-warning" style="font-size: 13px;">{{ $booking->room->name }}</span></li>
                                    <li>Room Category: <span class="badge badge-success" style="font-size: 13px;">{{ $booking->room->category->name }}</span></li>
                                    @php
                                        $check_out = date_create($booking['check_out']);
                                        $check_in = date_create($booking['check_in']);
                                        $calculate = date_diff($check_out, $check_in);
                                        $day = $calculate->format("%a");
                                        $price = $day * $booking->room->price;
                                    @endphp                                
                                    <li>Length Of Stay: <span class="badge badge-danger" style="font-size: 13px;">{{ $day . " " . "Day" }}</span></li>
                                    <li>Check in: <span style="font-size: 13px;">{{ $booking->check_in }}</span></li>
                                    <li>Check out: <span style="font-size: 13px;">{{ $booking->check_out }}</span></li>
                                </ul>
                                <ul class="sub-total">
                                    <li><p style="font-size: 15px;">Subtotal</p> <input type="number" value="{{ $price }}" readonly class="form-control" required id="total"></li>
                                </ul>
                                <ul class="sub-total total">
                                    <li style="font-size: 14px;">Money: <input type="number" class="form-control" required id="money"></li>
                                    <li style="font-size: 14px;">Return: <input type="number" value="0" readonly class="form-control" required id="return"></li>
                                </ul>
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
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>      
    let btn = document.getElementById('button');
    window.onload = function() {
        btn.hidden = true
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
            btn.hidden = true
        } else {
            btn.hidden = false
        }
    });
    </script>
@endsection