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
                        <table class="table table-hover" width="100%">
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
                            <tbody>
                            </tbody>
                            {{-- @forelse ($bookings as $booking)
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
                                    </td>
                                </tbody>
                            @empty
                                <tbody>
                                    <tr>
                                        <th colspan="8" style="color: red; text-align: center;">Data Empty!</th>
                                    </tr>
                                </tbody>
                            @endforelse --}}
                        </table>
                    </div>
                </div>
                {{-- <div class="card-footer">
                    {{ $bookings->links() }}
                </div> --}}
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
                                <div class="select2-drpdwn">
                                    <div class="mb-2">
                                        <div class="col-form-label">Customer:</div>
                                        <select name="customer_id" style="width: 100%;" class="select2 col-sm-12" required>
                                            <optgroup label="CHOOSE">
                                                <option disabled selected>Customer</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">
                                                        {{ '(' . $customer->nik . ')' . ' - ' . Str::upper($customer->FullName) }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="check_in">Check in:</label>
                                    <input class="datepicker-here form-control" type="text" name="check_in" id="check_in"
                                        placeholder="check in" data-language="en" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-form-label" for="check_out">Check out:</label>
                                    <input class="datepicker-here form-control" type="text" name="check_out" id="check_out"
                                        placeholder="check out" data-language="en" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="select2-drpdwn">
                                    <div class="mb-2">
                                        <div class="col-form-label">Room:</div>
                                        <select name="room_id" style="width: 100%;" class="select2 col-sm-12" required>
                                            <optgroup label="CHOOSE">
                                                <option disabled selected>Room</option>
                                                @foreach ($rooms as $room)
                                                    <option value="{{ $room->id }}">
                                                        {{ $room->room_code . ' - ' . $room->name . ' (' . $room->category->name . ')' }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="select2-drpdwn">
                                    <div class="mb-2">
                                        <div class="col-form-label">Payment Type:</div>
                                        <select name="payment_type" style="width: 100%;" class="select2 col-sm-12" required>
                                            <optgroup label="CHOOSE">
                                                <option disabled selected>Type</option>
                                                <option value="Now">Now</option>
                                                <option value="Checkout">Checkout</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer mt-3">
                            <button class="btn btn-light for-light" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-secondary for-dark" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@stop
@push('datatable')
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js "></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        @if (request()->is('admin/booking'))
            const dataUrl = '{{ route('admin.booking.index') }}'
        @endif
        @if (request()->is('admin/already_paid'))
            const dataUrl = '{{ route('admin.booking.already_paid') }}'
        @endif
        @if (request()->is('admin/not_yet_paid'))
            const dataUrl = '{{ route('admin.booking.not_paid') }}'
        @endif

        const csrf = '{{ csrf_token() }}'

        jQuery(function($) {
            const table = $("table").DataTable({
                responsive: true,
                serverSide: true,
                processing: true,
                ajax: {
                    url: dataUrl,
                    type: "get",
                    error: (response) => {
                        console.log(response);
                    },
                },
                searching: true,
                columns: [{
                        data: null,
                        sortable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    },
                    {
                        data: "booking_code"
                    },
                    {
                        data: "PaymentStatus",
                        sortable: false,
                        searchable: false,
                    },
                    {
                        data: "check_in"
                    },
                    {
                        data: "check_out"
                    },
                    {
                        data: "room_id"
                    },
                    {
                        data: "customer_id"
                    },
                    {
                        data: "payment_type"
                    },
                    {
                        data: "action",
                        sortable: false,
                        searchable: false,
                    },
                ],
            });

        });

    </script>
@endpush
@section('script')
    <script>
        $(".select2").select2({
            dropdownParent: $('#addModal')
        });

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
