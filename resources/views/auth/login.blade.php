@extends('layouts.loglayout', ['title' => 'HRI-HOTEL | Login'])
@section('content')
    <!-- login page start-->
    <div class="row">
        <div class="col-12">
            <div class="login-card">
                <div>
                    <div class="login-main">
                        <form action="{{ route('login') }}" method="post" class="theme-form">
                            @csrf
                            <div class="logo"><img class="img-fluid for-light"
                                    src="{{ asset('assets/images/logo/logoweb.png') }}" alt="looginpage"
                                    style="height: 100px; width: 300px; object-fit: cover;"><img class="img-fluid for-dark"
                                    src="{{ asset('assets/images/logo/logowebdark.png') }}" alt="looginpage"
                                    style="height: 100px; width: 300px; object-fit: cover;"></div>
                            <div class="form-group">
                                <label class="col-form-label" for="username">Username</label>
                                <input class="form-control @error('username') is-invalid @enderror" type="text"
                                    name="username" id="username" value="{{ old('username') }}" autofocus
                                    placeholder="your username">
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Username / Password yang dimasukan salah!</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="password">Password</label>
                                <input class="form-control" type="password" name="password" id="password"
                                    placeholder="*********">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-0">
                                <div class="checkbox p-0">
                                    <input id="checkbox1" type="checkbox" name="remember">
                                    <label class="text-muted" for="checkbox1">Remember Me</label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="link" href="{{ route('password.request') }}">Forgot password?</a>
                                @endif

                                <div>
                                    <button class="btn btn-primary btn-block" type="submit">Sign in</button>
                                </div>

                                <div  class="mt-3">
                                    <p class="text-center">Mau booking belum punya akun?</p>
                                    <div>
                                        <a class="btn btn-success btn-block" href="{{ route('register') }}">Buat akun baru</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
