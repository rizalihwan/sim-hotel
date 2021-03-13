@extends('layouts.app', ['title' => 'HRI-HOTEL | Detail Costumer'])
@section('breadcrumb')
    <li class="breadcrumb-item">Customer Detail</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <label class="col-md-2 col-form-label mb-4">NIK</label>
                        <div class="col-sm-1 d-none d-md-block"><span>:</span></div>
                        <div class="col-md-9">
                            <span class="badge badge-pill badge-light form-control" disabled>
                                <p disabled>{{ $customer->nik }}</p>
                            </span>
                        </div>
                        <label class="col-md-2 col-form-label mb-4">Full Name</label>
                        <div class="col-sm-1 d-none d-md-block"><span>:</span></div>
                        <div class="col-md-9">
                            <p class="form-control" disabled>{{ $customer->FullName }}</p>
                        </div>
                        <label class="col-md-2 col-form-label mb-4">Address</label>
                        <div class="col-sm-1 d-none d-md-block"><span>:</span></div>
                        <div class="col-md-9 for-light">
                            <textarea class="form-control mb-4" style="background-color:white;"
                                disabled>{{ $customer->address }}</textarea>
                        </div>
                        <div class="col-md-9 for-dark">
                            <textarea class="form-control mb-4" style="background-color:dark; color: white;"
                                disabled>{{ $customer->address }}</textarea>
                        </div>
                        <label class="col-md-2 col-form-label mb-4">Phone</label>
                        <div class="col-sm-1 d-none d-md-block"><span>:</span></div>
                        <div class="col-md-9">
                            <p class="form-control" disabled>{{ $customer->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
