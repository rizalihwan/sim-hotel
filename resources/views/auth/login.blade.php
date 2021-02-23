@extends('layouts.app', ['title' => 'Login | Inventory'])
@section('logincontent')
<div class="page-content--bge5">
    <div class="container">
        <center>
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <img src="{{ asset('assets/images/logo/Inventory.png') }}" style="height: 150px; width: 270px; object-fit: cover;" alt="Login Img">
                    </div>
                    <div class="login-form">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <input class="form-control au-input au-input--full" type="text" autofocus name="username" placeholder="Username" value="{{ old('username') }}" required>
                                </div>
                                {{-- @error('username')
                                    {{ alert()->success("aksas", "example", "message")->persistent('Ok') }}
                                @enderror --}}
                                {{-- @error('username')
                                    {{ alert()->success('kasnkasn') }}
                                    {{-- <span class="invalid-feedback" role="alert">
                                        <strong>Username / Password yang dimasukan tidak valid!</strong>
                                    </span> --}}
                                {{-- @enderror --}}
                            </div>
                            <div class="form-group mb-4">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </div>
                                    <input class="form-control au-input au-input--full @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="login-checkbox">
                                <label>
                                    <input type="checkbox" name="remember">Remember Me
                                </label>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </center>
    </div>
</div>
@endsection
