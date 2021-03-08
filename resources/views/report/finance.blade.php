@extends('layouts.app', ['title' => 'HRI-HOTEL | FinanceReport'])
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
                                    <th>Total</th>
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
                                    <td>
                                        <span class="badge badge-light">{{ "Rp. " . number_format($price, 0,',','.') }}<span>
                                    </td>
                                </tbody>
                            @empty
                                <tbody>
                                    <tr>
                                        <th colspan="3" style="color: red; text-align: center;">Data Empty!</th>
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