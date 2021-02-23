@extends('layouts.app', ['title' => 'Profile'])
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
                <a href="{{ route('password.edit') }}" style="width: 100%;" class="btn btn-primary btn-sm">
                    <i class="fa fa-lock"></i>  Ganti Password
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('PATCH')
            <div class="card">
                <div class="card-header">
                    <strong>Profile Saya</strong>
                </div>
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="avatar" class=" form-control-label">Foto</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <img src="{{ auth()->user()->ImgProfile }}" style="width: 100px; height: 100px; object-fit: cover; object-position: center;" class="mb-2" alt="Img Profile" srcset="">
                            <input type="file" id="avatar" name="avatar" class="form-control-file">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="name" class=" form-control-label">Nama</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="name" name="name" value="{{ auth()->user()->name ?? old('name') }}" placeholder="Nama" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('home') }}" class="btn btn-danger btn-sm">
                        <i class="fa fa-step-backward"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-save"></i> Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
