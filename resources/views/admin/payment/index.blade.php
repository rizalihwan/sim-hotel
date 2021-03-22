@extends('layouts.app', ['title' => 'HRI-HOTEL | Payment'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Booking Code</th>
                                    <th>Checkin</th>
                                    <th>Checkout</th>
                                    <th>Length Of Stay</th>
                                    <th>Room</th>
                                    <th>Customer</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @forelse ($bookings as $booking)
                                @php
                                    $check_out = date_create($booking['check_out']);
                                    $check_in = date_create($booking['check_in']);
                                    $calculate = date_diff($check_out, $check_in);
                                    $day = $calculate->format("%a");
                                    $price = $day * $booking->room->price;
                                @endphp
                                <tbody>
                                    <th>{{ $loop->iteration + $bookings->firstItem() - 1 . '.' }}</th>
                                    <td><u>{{ $booking->booking_code }}</u></td>
                                    <td>{{ $booking->check_in }}</td>
                                    <td>{{ $booking->check_out }}</td>
                                    <td>
                                        <span class="badge badge-danger">{{ $day . " " . "Day" }}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{ Str::upper($booking->room->name . " (" . $booking->room->category->name . ")") }}<span>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">{{ Str::upper($booking->customer->FullName) }}<span>
                                    </td>
                                    <td>
                                        <span class="badge badge-light">{{ "Rp. " . number_format($price, 0,',','.') }}<span>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.payment.pay', $booking->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>  Pay</a>
                                    </td>
                                </tbody>
                            @empty
                                <tbody>
                                    <tr>
                                        <th colspan="9" style="color: red; text-align: center;">Data Empty!</th>
                                    </tr>
                                </tbody>
                            @endforelse
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection