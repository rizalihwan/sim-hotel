@extends('layouts.app', ['title' => 'HRI-HOTEL | Register'])
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.account.register.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="col-form-label" for="avatar">Image (Nullable):</label>
                                    <input class="form-control" type="file" name="avatar" id="avatar">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="col-form-label" for="name">Name:</label>
                                    <input class="form-control" type="text" name="name" value="{{ $user->name }}" id="name" placeholder="your name" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label class="col-form-label" for="role">Role:</label>
                                    <select name="role" id="role" class="form-control custom-select" required>
                                        <option disabled selected>Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="customer">Customer</option>
                                        <option value="boss">Boss</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="col-form-label" for="email">E-Mail:</label>
                                    <input class="form-control" type="email" name="email" value="{{ $user->email }}" id="email" placeholder="your email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="col-form-label" for="username">Username:</label>
                                    <input class="form-control" type="text" name="username" value="{{ $user->username }}" id="username" placeholder="username" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="{{ route('admin.account.register.index') }}" class="btn btn-light">Back</a>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection