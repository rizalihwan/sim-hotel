@extends('layouts.app', ['title' => 'HRI-HOTEL | BookingReport'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        @if (request('startDate') && request('endDate'))
                            <a href="@role('admin') {{ route('admin.report.booking') }} @endrole @role('boss') {{ route('manager.report.booking') }} @endrole"
                                class="btn btn-danger btn-md"><i class="fa fa-arrow-left"></i></a>
                        @endif
                        @if (request('startDate') && request('endDate'))
                            <a href="@role('admin') {{ route('admin.report.booking.pdf', ['startDate' => $startDate, 'endDate' => $endDate]) }} @endrole @role('boss') {{ route('manager.report.booking.pdf', ['startDate' => $startDate, 'endDate' => $endDate]) }} @endrole"
                                class="btn btn-danger" target="_blank"><i class="fa fa-print"></i> Pdf</a>
                        @else
                            <a href="@role('admin') {{ route('admin.report.booking.pdf') }} @endrole @role('boss') {{ route('manager.report.booking.pdf') }} @endrole"
                                class="btn btn-danger" target="_blank"><i class="fa fa-print"></i> Pdf</a>
                            @role('boss')
                            <a href="{{ route('manager.report.booking.excell') }}" class="btn btn-success"><i
                                    class="fa fa-print"></i> Excell</a>
                            @endrole
                        @endif
                    </div>
                    <form
                        action="@role('admin') {{ route('admin.report.booking.cari') }} @endrole @role('boss') {{ route('manager.report.booking.cari') }} @endrole"
                        method="GET">
                        @csrf
                        <div class="d-flex justify-content-end mx-2">
                            <label for="startDate" class="mr-2">Start Date</label>
                            <input type="date" class="form-control @error('startDate') is-invalid @enderror"
                                name="startDate" id="startDate" required>
                            @error('startDate')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <h3 class="mx-3">-</h3>
                            <label for="endDate" class="mr-2">End Date</label>
                            <input type="date" class="form-control @error('endDate') is-invalid @enderror mr-2"
                                name="endDate" id="endDate" required>
                            @error('endDate')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                            <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-search"></i>
                                Cari</button>
                        </div>
                    </form>
                </div>
                @if (request('startDate') && request('endDate'))
                    <span class="badge badge-light mx-5 mt-3">
                        <h6 class="p-1">Laporan From : {{ $startDate }} &middot; To : {{ $endDate }}</h6>
                    </span></th>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Booking Code</th>
                                    <th>Payment Status</th>
                                    <th>Checkin</th>
                                    <th>Checkout</th>
                                    <th>Room</th>
                                    <th>Customer</th>
                                    <th>Payment Type</th>
                                </tr>
                            </thead>
                            @forelse ($bookings as $booking)
                                <tbody>
                                    <th>{{ $loop->iteration + $bookings->firstItem() - 1 . '.' }}</th>
                                    <td><u>{{ $booking->booking_code }}</u></td>
                                    <td>{!! $booking->PaymentStatus !!}</td>
                                    <td>{{ $booking->check_in }}</td>
                                    <td>{{ $booking->check_out }}</td>
                                    <td>
                                        <span
                                            class="badge badge-light">{{ Str::upper($booking->room->name . ' (' . $booking->room->category->name . ')') }}<span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-light">{{ Str::upper($booking->customer->FullName) }}<span>
                                    </td>
                                    <td>
                                        <span class="badge badge-light">{{ Str::upper($booking->payment_type) }}<span>
                                    </td>
                                </tbody>
                            @empty
                                <tbody>
                                    <tr>
                                        <th colspan="8" style="color: red; text-align: center;">Data Empty!</th>
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
