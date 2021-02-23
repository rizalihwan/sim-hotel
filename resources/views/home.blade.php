@extends('layouts.app', ['title' => 'Dashboard'])
@section('content')
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row m-t-25">
                <div class="col-md-4">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                                <div class="text">
                                    <h2>10368</h2>
                                    <span>admin</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="overview-item overview-item--c2">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                                <div class="text">
                                    <h2>3</h2>
                                    <span>soal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="overview-item overview-item--c3">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-bookmark"></i>
                                </div>
                                <div class="text">
                                    <h2>1,086</h2>
                                    <span>materi</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 style="font-family: 'Pacifico';">Selamat Datang, {{ auth()->user()->name }}</h3>
                        </div>
                        <div class="card-body">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Animi iusto vero, consequuntur ut nesciunt sunt, amet atque dolore dolor nostrum dignissimos iure labore qui nihil perferendis laboriosam assumenda, sed tempora?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
