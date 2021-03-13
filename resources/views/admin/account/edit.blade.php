@extends('layouts.app', ['title' => 'HRI-HOTEL | Edit Account'])
@section('breadcrumb')
    <li class="breadcrumb-item">
        @if($user->hasRole('admin')) Admin Account Edit @endif
        @if($user->hasRole('boss')) Manager Account Edit @endif
        @if($user->hasRole('customer')) Customer Account Edit @endif
    </li>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.account.register.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        @include('admin.account.form-control')
                        <div class="modal-footer">
                            <a href="{{ route('admin.account.register.index') }}" class="btn btn-light for-light">Back</a>
                            <a href="{{ route('admin.account.register.index') }}" class="btn btn-secondary for-dark">Back</a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection