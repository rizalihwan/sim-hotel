@include('layouts.landing.header')

<div class="container">
    <h2>Rooms & Tariff</h2>
    <!-- form -->
    <div class="row">
        @forelse ($rooms as $room)
        <div class="col-sm-6 wowload fadeInUp">
            <div class="rooms"><img class="img-fluid" src="{{ $room->RoomThumbnail }}"
                    style="width: 100%; height: 200px; object-fit: cover; object-position: center;" alt="roomthumbnail">
                <div class="info">
                    <div class="d-flex justify-content-between">
                        <h3 class="text-secondary">{{ Str::upper($room->name) }}</h3>
                        {{-- @if ($room->status === 1)
                                                <span class="badge badge-success p-2">EMPTY</span>
                                            @else
                                                <span class="badge badge-danger p-2">FILLED<span>
                                            @endif --}}
                    </div>
                    <div class="mb-2">
                        Package type : <p>{{ $room->category->name }} [Facility &rightarrow;
                            {{ $room->category->facility }}]</p>
                    </div>
                    <div>
                        Description : {!! Str::limit($room->category->description, 200) !!}
                    </div>
                    <span
                        class="badge badge-light">{{ 'Rp. ' . number_format($room->price, 0, ',', '.') }}/Day</span><span
                        class="pull-right">{!! $room->RatingCount !!}</span>
                    <div class="my-3">
                        <center>
                            @if ($room->status === 1)
                            <a href="{{ route('customer.booking', $room->id) }}" class="btn btn-default"><i
                                    class="fa fa-lock"></i>
                                Book
                                Now</a>
                            @else
                            <span class="badge badge-light">Filled</span>
                            @endif
                        </center>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <center>
                <h3 style="color: red;">Data Empty!</h3>
            </center>
        </div>
        @endforelse
    </div>

    <div class="text-center">
        <ul class="pagination">
            {{ $rooms->links() }}
        </ul>
    </div>


</div>
@include('layouts.landing.footer')
