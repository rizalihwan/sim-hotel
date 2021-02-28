@extends('layouts.app', ['title' => 'HRI-HOTEL | Profile'])
@section('content')
    <div class="row p-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body card-block">
                    <center>
                        <img src="{{ asset('assets/images/pw.png') }}" alt="Pw image" srcset="">
                    </center>
                </div>
                <div class="card-footer">
                    <a href="{{ route('password.edit') }}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-lock"></i><br />
                        Change Password
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data"
                class="form-horizontal">
                @csrf
                @method('PATCH')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Edit Profile</h4>
                    </div>
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="avatar" class=" form-control-label">Image</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <img src="{{ auth()->user()->ImgProfile }}"
                                    style="width: 100px; height: 100px; object-fit: cover; object-position: center;"
                                    class="mb-2" alt="Img Profile" srcset="">
                                <input type="file" id="avatar" name="avatar" class="form-control-file">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="name" class=" form-control-label">Name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="name" name="name" value="{{ auth()->user()->name ?? old('name') }}"
                                    placeholder="Nama" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="email" class=" form-control-label">Email</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="email" id="email" name="email"
                                    value="{{ auth()->user()->email ?? old('email') }}" placeholder="user@email.com"
                                    class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="username" class=" form-control-label">Username</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="username" name="username"
                                    value="{{ auth()->user()->username ?? old('username') }}" placeholder="Admin2325"
                                    class="form-control @error('username') is-invalid @enderror">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('home') }}" class="btn btn-light btn-sm mr-1">
                            Back
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
