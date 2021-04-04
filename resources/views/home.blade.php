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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-3 pl-5 ml-5 mb-5">
                                            <div class="col-md-3 col-sm-12">
                                                <h5 class="mb-2"><u>{{ $customers }}</u></h5>
                                                <span>Customer </span><h4 style="float: left; color: #31326f;" class="mr-2"><i class="fa fa-user"></i></h4>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <h5 class="mb-2"><u>{{ $bookings }}</u></h5>
                                                <h4 style="float: left; color: #31326f;" class="mr-2"><i class="fa fa-sign-in"></i></h4><span> Booking</span>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <h5 class="mb-2"><u>{{ $users }}</u></h5>
                                                <h4 style="float: left; color: #31326f;" class="mr-2"><i class="fa fa-users"></i></h4><span> Account</span>
                                            </div>
                                            <div class="col-md-3 col-sm-12">
                                                <h5 class="mb-2"><u>{{ $rooms }}</u></h5>
                                                <h4 style="float: left; color: #31326f;" class="mr-2"><i class="fa fa-shopping-bag"></i></h4><span> Room</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                          <div id="testChart" style="width: 100%;"></div>
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
@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('testChart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monthly Average Rainfall'
    },
    subtitle: {
        text: 'Source: WorldClimate.com'
    },
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Tokyo',
        data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

    }, {
        name: 'New York',
        data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

    }, {
        name: 'London',
        data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

    }, {
        name: 'Berlin',
        data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

    }]
});
</script>
@endsection