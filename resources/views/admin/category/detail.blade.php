@extends('layouts.app', ['title' => 'HRI-HOTEL | Detail Category'])
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
                        <div class="col-md-9">
                            <textarea class="form-control mb-4" disabled>{{ $category->description }}</textarea>
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
    </div>
@endsection
