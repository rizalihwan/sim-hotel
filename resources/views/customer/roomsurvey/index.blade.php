@extends('layouts.app', ['title' => 'HRI-HOTEL | Room Survey'])
@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <span>
                    <h3><u>Room Survey</u></h3> 
                </span>
                <div class="btn-group">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-filter"></i> 
                    </button>
                    </button>
                    <div class="dropdown-menu">
                    <small class="dropdown-item text-secondary" aria-disabled="true">View based on</small>
                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.account.register.index') }}">Default</a>
                        <a class="dropdown-item" href="{{ route('admin.account.latest') }}">Latest</a>
                        <a class="dropdown-item" href="{{ route('admin.account.asc') }}">Alphabet(A-Z)</a>
                        <a class="dropdown-item" href="{{ route('admin.account.desc') }}">Alphabet(Z-A)</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($rooms as $room)
                    <div class="col-xl-3 xl-50 col-md-6">
                        <div class="card features-faq product-box mb-3" style="height: 530px; border: 0.1px solid gray;">
                            <div class="faq-image product-img my-3">
                                <center>
                                    <img class="img-fluid" src="{{ $room->RoomThumbnail }}" style="width: 250px; height: 250px; object-fit: cover; object-position: center;" alt="roomthumbnail">
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
                                        <div>
                                            <p>Category : {{ $room->category->name }}</p>
                                        </div>
                                        <p>Description : {{ $room->category->description }}</p>
                                    </div>
                                </div>
                            <div class="card-footer">
                                <span class="badge badge-light">Published On : {{ $room->created_at->format('d, M Y') }}</span><span class="pull-right">{!! $room->RatingCount !!}</span>
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
@endsection