@extends('layouts.app', ['title' => 'HRI-HOTEL | Room Survey'])
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mx-3">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <span>
                        <h5>| Semua Paket Kamar</h5> 
                    </span>
                    <div>
                        <span class="badge badge-pill badge-success">&middot;</span>
                        <small class="text-secondary mr-2">Empty Room</small>
                        <span class="badge badge-pill badge-danger">&middot;</span>
                        <small class="text-secondary">Room Filled</small>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($rooms as $room)
                        <div class="col-xl-3 xl-50 col-md-6">
                            <div class="card features-faq product-box mb-3" style="height: 530px; border: 1px solid rgba(15, 7, 7, 0.082);">
                                <div class="faq-image product-img p-2">
                                    <center>
                                        <img class="img-fluid" src="{{ $room->RoomThumbnail }}" style="width: 100%; height: 250px; object-fit: cover; object-position: center;" alt="roomthumbnail">
                                    </center>        
                                </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="text-secondary">{{ Str::upper($room->name) }}</h6>
                                            @if($room->status === 1)
                                                <span class="badge badge-success p-2">EMPTY ROOM</span>
                                            @else
                                                <span class="badge badge-danger p-2">ROOM FILLED<span>
                                            @endif
                                        </div>
                                        <div class="mb-4 mt-4">
                                            <div class="mb-2">
                                            Jenis Paket : <p>{{ $room->category->name }} [Fasilitas &rightarrow; {{ $room->category->facility }}]</p> 
                                            </div>
                                            <div>
                                                Deskripsi : {!! Str::limit($room->category->description, 200) !!}
                                            </div>
                                        </div>
                                    </div>
                                <div class="card-footer">
                                    <span class="badge badge-light">Published On : {{ $room->created_at->format('d M, Y') }}</span><span class="pull-right">{!! $room->RatingCount !!}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
                {{ $rooms->links() }}
            </div>
        </div>        
    </div>
</div>
@endsection