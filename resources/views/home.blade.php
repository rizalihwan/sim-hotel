@extends('layouts.app', ['title' => 'HRI-HOTEL | Dashboard'])
@section('content')
<div class="container-fluid">
    <div class="row second-chart-list third-news-update">
        <div class="col-xl-9 xl-100 chart_data_left box-col-12">
            <div class="card">
                <div class="card-body p-0">
                    @role('customer')
                        <div class="row p-5">
                            <div class="col-md-12">
                              <h4>Selamat Datang,</h4><span class="text-secondary">Hallo {{ Str::upper(auth()->user()->name) }} Semoga hari anda menyenangkan & pilihlah paket kamar yang tepat dan membuat anda nyaman.</span>
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
            <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12 col-xl-12">
                <div class="card">
                  <div class="card-header">
                    <h6>Paket dan Deskripsi</h6><span>Berikut adalah jenis - jenis paket dan penjelasannya</span>
                  </div>
                  <div class="card-body">
                    <div class="default-according" id="accordion1">
                      @foreach ($categories as $category)
                        <div class="card">
                          <div class="card-header bg-primary" id="headingFour">
                            <h5 class="mb-0 p-1">
                              <button class="btn btn-link text-white" data-toggle="collapse" data-target="#{{ $category->name }}" aria-expanded="true" aria-controls="{{ $category->name }}"><i class="fa fa-sort-down"></i> {{ $category->name }}</button>
                            </h5>
                          </div>
                          <div class="collapse" id="{{ $category->name }}" aria-labelledby="headingOne" data-parent="#accordion1">
                            <div class="card-body">
                              <div class="mb-5">
                                <h6>Deskripsi Paket : </h6> 
                                <span class="text-secondary">{!! $category->description !!}</span>
                              </div>
                              <div>
                                <h6>Fasilitas : </h6> 
                                <span class="text-secondary">{{ $category->facility }}</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
    @endrole
</div>
@endsection
