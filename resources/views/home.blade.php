@extends('layouts.app', ['title' => 'HRI-HOTEL | Dashboard'])
@section('content')
<div class="container-fluid">
    <div class="row second-chart-list third-news-update">
        <div class="col-xl-9 xl-100 chart_data_left box-col-12">
            <div class="card">
                <div class="card-body p-0">
                    @role('customer')
                        <div class="row m-0 chart-main">
                            <div class="col-md-12">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                            <h4>Selamat Datang,</h4><span>Hallo <b>{{ Str::upper(auth()->user()->name) }}</b> Semoga hari anda menyenangkan & pilihlah paket kamar yang tepat dan membuat anda nyaman. Berikut paket kamar terbaru kami / <a href="{{ route('customer.survey') }}">Lebih Lengkap</a>:</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endrole
                    @role('admin')
                        <div class="row m-0 chart-main">
                            <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                <div class="media align-items-center">
                                    <div class="hospital-small-chart">
                                        <div class="small-bar">
                                            <div class="small-chart2 flot-chart-container"></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                            <h4>{{ $customers }}</h4><span>Customers</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                <div class="media border-none align-items-center">
                                    <div class="hospital-small-chart">
                                        <div class="small-bar">
                                            <div class="small-chart3 flot-chart-container"></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                            <h4>{{ $bookings }}</h4><span>Bookings</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                <div class="media align-items-center">
                                    <div class="hospital-small-chart">
                                        <div class="small-bar">
                                            <div class="small-chart flot-chart-container"></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                            <h4>{{ $users }}</h4><span>Accounts</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                <div class="media align-items-center">
                                    <div class="hospital-small-chart">
                                        <div class="small-bar">
                                            <div class="small-chart1 flot-chart-container"></div>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="right-chart-content">
                                            <h4>{{ $rooms }}</h4><span>Rooms</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
    @role('customer')
        <div class="row">
            <div class="col-xl-3 xl-50 col-md-6">
                <div class="card features-faq product-box">
                    <div class="faq-image product-img"><img class="img-fluid" src="{{ asset('assets/images/1.jpg') }}" alt="">
                </div>
                <div class="card-body">
                    <h6> Web Design</h6>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                </div>
                <div class="card-footer">
                    <span>Dec 15, 2019</span><span class="pull-right"><i class="fa fa-star font-primary"></i><i class="fa fa-star font-primary"></i><i class="fa fa-star font-primary"></i><i class="fa fa-star font-primary"></i><i class="fa fa-star-o font-primary"></i></span>
                </div>
                </div>
            </div>
            <div class="col-xl-3 xl-50 col-md-6">
                <div class="card features-faq product-box">
                    <div class="faq-image product-img"><img class="img-fluid" src="{{ asset('assets/images/1.jpg') }}" alt="">
                    </div>
                    <div class="card-body">
                        <h6> Web Design</h6>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    </div>
                    <div class="card-footer"><span>Dec 15, 2019</span><span class="pull-right"><i class="fa fa-star font-primary"></i><i class="fa fa-star font-primary"></i><i class="fa fa-star font-primary"></i><i class="fa fa-star font-primary"></i></span></div>
                </div>
            </div>
        </div>
    @endrole
</div>
@endsection
