@extends('layouts.app', ['title' => 'HRI-HOTEL | Detail Category'])
@section('breadcrumb')
    <li class="breadcrumb-item">Category Detail</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <label class="col-md-2 col-form-label mb-4">Name</label>
                        <div class="col-sm-1 d-none d-md-block"><span>:</span></div>
                        <div class="col-md-9">
                            <p class="form-control" disabled>{{ $category->name }}</p>
                        </div>
                        <br>
                        <label class="col-md-2 col-form-label mb-4">Description</label>
                        <div class="col-sm-1 d-none d-md-block"><span>:</span></div>
                        <div class="col-md-9 for-light">
                            <textarea class="form-control mb-4" style="background-color:white;"
                                disabled>{{ $category->description }}</textarea>
                        </div>
                        <div class="col-md-9 for-dark">
                            <textarea class="form-control mb-4" style="background-color:dark; color: white;"
                                disabled>{{ $category->description }}</textarea>
                        </div>
                        <label class="col-md-2 col-form-label mb-4">Facility</label>
                        <div class="col-sm-1 d-none d-md-block"><span>:</span></div>
                        <div class="col-md-9">
                            <p class="form-control" disabled>{{ $category->facility }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
