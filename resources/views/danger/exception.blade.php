@extends('layouts.loglayout', ['title' => 'Error Page'])
@section('content')
    <div class="row ml-2">
        <div class="col-md-12">
            <h1 style="color: red;">something is wrong because of that : {{ Str::upper($message) }}</h1>
        </div>
        <div class="col-md-12">
            <a href="{{ URL::previous() }}" class="btn btn-danger">Back</a>
        </div>
    </div>
@endsection
