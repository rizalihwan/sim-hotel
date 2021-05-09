@extends('layouts.app', ['title' => 'HRI-HOTEL | Room Survey'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mx-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between mb-4">
                        <div>
                            <span>
                                <h5>
                                    @if (request('query'))
                                        Search : "{{ request('query') }}"
                                    @else
                                        | All Room Packages
                                    @endif
                                </h5>
                            </span>
                        </div>
                        <div>
                            <form action="{{ route('customer.searchroom') }}" method="GET">
                                <div class="input-group">
                                    <input class="form-control" id="validationTooltip02" type="search" name="query"
                                        placeholder="Find a room..." @if (request('query')) value="{{ request('query') }}" @endif required>
                                    <div class="valid-tooltip">Search</div>
                                    <button type="submit" class="btn btn-secondary ml-2"><i
                                            class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        {{-- <div>
                            <span class="badge badge-pill badge-success">&middot;</span>
                            <small class="text-secondary mr-2">Empty Room</small>
                            <span class="badge badge-pill badge-danger">&middot;</span>
                            <small class="text-secondary">Room Filled</small>
                        </div> --}}
                    </div>
                    @if (request('query'))
                        <a href="{{ route('customer.survey') }}" class="btn btn-light mb-2"><i
                                class="fa fa-arrow-left"></i></a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse ($rooms as $room)
                            <div class="col-xl-3 xl-50 col-md-6">
                                <div class="card features-faq product-box mb-3"
                                    style="height: 570px; border: 1px solid rgba(15, 7, 7, 0.082);">
                                    <div class="faq-image product-img p-2">
                                        <center>
                                            <img class="img-fluid" src="{{ $room->RoomThumbnail }}"
                                                style="width: 100%; height: 250px; object-fit: cover; object-position: center;"
                                                alt="roomthumbnail">
                                        </center>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="text-secondary">{{ Str::upper($room->name) }}</h6>
                                            {{-- @if ($room->status === 1)
                                                <span class="badge badge-success p-2">EMPTY</span>
                                            @else
                                                <span class="badge badge-danger p-2">FILLED<span>
                                            @endif --}}
                                        </div>
                                        <div class="mb-4 mt-4">
                                            <div class="mb-2">
                                                Jenis Paket : <p>{{ $room->category->name }} [Fasilitas &rightarrow;
                                                    {{ $room->category->facility }}]</p>
                                            </div>
                                            <div>
                                                Deskripsi : {!! Str::limit($room->category->description, 200) !!}
                                            </div>
                                            <div class="my-3">
                                                <center>
                                                    @if ($room->status === 1)
                                                        <a href="{{ route('customer.booking', $room->id) }}" class="btn btn-secondary"><i class="fa fa-lock"></i>
                                                            Book
                                                            Now</a>
                                                    @endif
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer my-2">
                                        <span
                                            class="badge badge-light">{{ 'Rp. ' . number_format($room->price, 0, ',', '.') }}/Day</span><span
                                            class="pull-right">{!! $room->RatingCount !!}</span>
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
                </div>
                <div class="card-footer">
                    {{ $rooms->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
