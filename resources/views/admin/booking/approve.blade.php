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
                                    <th>Booking Code</th>
                                    <th>Payment Status</th>
                                    <th>Checkin</th>
                                    <th>Checkout</th>
                                    <th>Room</th>
                                    <th>Customer</th>
                                    <th>Payment Type</th>
                                    <th>Action</th>
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
                                            class="badge badge-info">{{ Str::upper($booking->room->name . ' (' . $booking->room->category->name . ')') }}<span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-warning">{{ Str::upper($booking->customer->FullName) }}<span>
                                    </td>
                                    <td>
                                        <span class="badge badge-light">{{ Str::upper($booking->payment_type) }}<span>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-primary btn-sm"
                                            onclick="deleteBooking('{{ $booking->id }}')"><i class="fa fa-check"></i>
                                            Approve</button>
                                        <form action="{{ route('admin.booking.destroy', $booking->id) }}" method="post"
                                            id="DeleteBooking{{ $booking->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
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
@stop
@section('script')
<script>
    function deleteBooking(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "is Removing Booking",
                    showConfirmButton: false,
                    timer: 2300,
                    timerProgressBar: true,
                    onOpen: () => {
                        document.getElementById(`DeleteBooking${id}`).submit();
                        Swal.showLoading();
                    }
                });
            }
        })
    }

</script>
@endsection
