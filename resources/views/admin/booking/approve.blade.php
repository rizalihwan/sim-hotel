@extends('layouts.app', ['title' => 'HRI-HOTEL | Approve'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="my-4">
                        <span class="badge badge-secondary pt-2">
                            <h6>&middot; Approve Bookings</h6>
                        </span>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Booking Code</th>
                                    <th>Proof of Payment</th>
                                    <th>Checkin</th>
                                    <th>Checkout</th>
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
                                    $day = $calculate->format('%a');
                                    $price = $day * $booking->room->price;
                                @endphp
                                <tbody>
                                    <th>{{ $loop->iteration + $bookings->firstItem() - 1 . '.' }}</th>
                                    <td>
                                        <span class="badge badge-light">
                                            {{ $booking->user->email }}
                                        </span>
                                    </td>
                                    <td><u>{{ $booking->booking_code }}</u></td>
                                    <td>
                                        <a href="{{ route('admin.booking.detail', $booking->id) }}"
                                            class="modal-show-detail">
                                            <img src="{{ $booking->ProofThumbnail }}"
                                                style="width: 70px; height: 70px; object-fit: cover; object-position: center;"
                                                alt="thumbnail">
                                        </a>
                                    </td>
                                    <td>{{ $booking->check_in }}</td>
                                    <td>{{ $booking->check_out }}</td>
                                    <td>
                                        <span
                                            class="badge badge-info">{{ Str::upper($booking->room->name . ' (' . $booking->room->category->name . ')') }}<span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-warning">{{ Str::upper($booking->customer->FullName) }}<span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-light">{{ 'Rp. ' . number_format($price, 0, ',', '.') }}<span>
                                    </td>
                                    <td>
                                        <button type="submit"
                                            onclick="approveBooking('{{ $booking->id }}', '{{ $booking->customer->FullName }}')"
                                            class="btn btn-primary btn-xs mb-1"><i class="fa fa-check"></i> Approve</button>
                                        <button type="submit" onclick="declineBooking('{{ $booking->id }}')"
                                            class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Decline</button>
                                        <form action="{{ route('admin.booking.approve.success', $booking->id) }}"
                                            method="post" id="ApproveBooking{{ $booking->id }}">
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        <form action="{{ route('admin.booking.decline', $booking->id) }}" method="post"
                                            id="DeclineBooking{{ $booking->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tbody>
                            @empty
                                <tbody>
                                    <tr>
                                        <th colspan="10" style="color: red; text-align: center;">Data Empty!</th>
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
    {{-- detail modal approve --}}
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" id="modal-header">
                    <h5 class="modal-title" id="modal-title">Detail Data Approved</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body my-2" id="modal-body">

                </div>
            </div>
        </div>
    </div>
    {{-- end modal --}}
@stop
@section('script')
<script>
    function approveBooking(id, name) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Will you be approved for this booking?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Approved it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: `is Approving Booking ${name}`,
                    showConfirmButton: false,
                    timer: 2300,
                    timerProgressBar: true,
                    onOpen: () => {
                        document.getElementById(`ApproveBooking${id}`).submit();
                        Swal.showLoading();
                    }
                });
            }
        })
    }

    function declineBooking(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Decline it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: `is Decline Booking`,
                    showConfirmButton: false,
                    timer: 2300,
                    timerProgressBar: true,
                    onOpen: () => {
                        document.getElementById(`DeclineBooking${id}`).submit();
                        Swal.showLoading();
                    }
                });
            }
        })
    }

</script>
@endsection
