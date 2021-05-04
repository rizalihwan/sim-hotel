@extends('layouts.app', ['title' => 'HRI-HOTEL | Booking'])
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @include('layouts.partials.error')
                    <div class="d-flex justify-content-between">
                        <div>
                            <button type="submit" class="btn btn-primary btn-md" data-toggle="modal"
                                data-target="#addModal"><i class="fa fa-plus"></i></button>
                            <a href="{{ route('admin.report.booking.excell') }}" class="btn btn-success"><i
                                    class="fa fa-print"></i> Excell</a>
                        </div>
                        <div class="d-flex">
                            <button type="submit" onclick="refreshBooking()" class="btn btn-secondary btn-sm mr-2"><i
                                    class="fa fa-refresh"></i></button>
                            <form action="{{ route('admin.booking.refresh') }}" method="post" id="RefreshBooking">
                                @csrf
                                @method('PATCH')
                            </form>
                            <div class="mr-2">
                                <span>&#10072;</span>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-light btn-sm for-light" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-filter"></i>
                                </button>
                                <button type="button" class="btn btn-secondary btn-sm for-dark" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-filter"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <small class="dropdown-item text-secondary" aria-disabled="true">Filter Payment
                                        Status</small>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('admin.booking.index') }}">Default</a>
                                    <a class="dropdown-item" href="{{ route('admin.booking.already_paid') }}">Already
                                        Paid</a>
                                    <a class="dropdown-item" href="{{ route('admin.booking.not_paid') }}">Not Yet Paid</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
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
                                        @if ($booking->status == 0)
                                            <a href="{{ route('admin.booking.edit', $booking->id) }}"
                                                style="float: left;" class="mr-1"><i class="fa fa-pencil-square-o"
                                                    style="color: rgb(0, 241, 12);"></i></a>
                                        @endif
                                        <button type="submit" onclick="deleteBooking('{{ $booking->id }}')"
                                            style="background-color: transparent; border: none;"><i class="icon-trash"
                                                style="color: red;"></i></button>
                                        <form action="{{ route('admin.booking.destroy', $booking->id) }}" method="post"
                                            id="DeleteBooking{{ $booking->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        {{-- @if ($booking->status == 1)   
                                            <form action="{{ route('admin.booking.destroy', $booking->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-refresh"></i></button>     
                                            </form>
                                        @endif --}}
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-2"><u>Room Status</u></h6>
                    <div>
                        <span class="badge badge-pill badge-success">&middot;</span>
                        <small class="text-secondary mr-2">Empty Room</small>
                        <span class="badge badge-pill badge-danger">&middot;</span>
                        <small class="text-secondary">Room Filled</small>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($check_room as $room)
                        @if ($room->status === 0)
                            <span style="margin: 0;" class="badge badge-danger">{{ $room->room_code }}</span>
                        @endif
                        @if ($room->status === 1)
                            <span style="margin: 0;" class="badge badge-success">{{ $room->room_code }}</span>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- add data modal --}}
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Add New Booking</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('admin.booking.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="code">Booking Code:</label>
                                    <input class="form-control" type="text" value="{{ $now . '-' . $kode }}"
                                        name="booking_code" id="code" placeholder="booking code" readonly required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="customer_id">Customer:</label>
                                    <select name="customer_id" id="customer_id" class="form-control custom-select" required>
                                        <option disabled selected>Select Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">
                                                {{ '(' . $customer->nik . ')' . ' - ' . Str::upper($customer->FullName) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="check_in">Check in:</label>
                                    <input class="form-control" type="date" name="check_in" id="check_in"
                                        placeholder="check in" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="check_out">Check out:</label>
                                    <input class="form-control" type="date" name="check_out" id="check_out"
                                        placeholder="check out" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="room_id">Room:</label>
                                    <select name="room_id" id="room_id" class="form-control custom-select" required>
                                        <option disabled selected>Select Room</option>
                                        @foreach ($rooms as $room)
                                            <option value="{{ $room->id }}">
                                                {{ $room->room_code . ' - ' . $room->name . ' (' . $room->category->name . ')' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="payment_type">Payment Type:</label>
                                    <select name="payment_type" id="payment_type" class="form-control custom-select"
                                        required>
                                        <option disabled selected>Select Payment Type</option>
                                        <option value="Now">Now</option>
                                        <option value="Checkout">Checkout</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light for-light" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-secondary for-dark" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
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

    function refreshBooking() {
        Swal.fire({
            title: 'Are you sure?',
            text: "Refresh booking will update the room status to filled, are you sure?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, refresh it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Refresh Booking...",
                    showConfirmButton: false,
                    timer: 2300,
                    timerProgressBar: true,
                    onOpen: () => {
                        document.getElementById('RefreshBooking').submit();
                        Swal.showLoading();
                    }
                });
            }
        })
    }

</script>
@endsection
