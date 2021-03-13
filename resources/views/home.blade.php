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
            <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12 col-xl-6">
                <div class="card">
                  <div class="card-header">
                    <h5>All Close Accordion</h5><span>Using the <a href="#">card</a> component, you can extend the default collapse behavior to create an accordion.</span>
                  </div>
                  <div class="card-body">
                    <div class="default-according" id="accordionclose">
                      <div class="card">
                        <div class="card-header" id="heading1">
                          <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="heading1">Collapsible Group Item #<span>1</span></button>
                          </h5>
                        </div>
                        <div class="collapse" id="collapse1" aria-labelledby="heading1" data-parent="#accordionclose">
                          <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="heading2">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="heading2">Collapsible Group Item #<span>2</span></button>
                          </h5>
                        </div>
                        <div class="collapse" id="collapse2" aria-labelledby="heading2" data-parent="#accordionclose">
                          <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="heading3">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Collapsible Group Item #<span>3</span></button>
                          </h5>
                        </div>
                        <div class="collapse" id="collapse3" aria-labelledby="heading3" data-parent="#accordionclose">
                          <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="heading4">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">Collapsible Group Item #<span>4</span></button>
                          </h5>
                        </div>
                        <div class="collapse" id="collapse4" aria-labelledby="heading4" data-parent="#accordionclose">
                          <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header" id="heading5">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">Collapsible Group Item #<span>5</span></button>
                          </h5>
                        </div>
                        <div class="collapse" id="collapse5" aria-labelledby="heading5" data-parent="#accordionclose">
                          <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12 col-xl-6">
                <div class="card">
                  <div class="card-header">
                    <h5>Color Accordion</h5><span>Add <code>.bg-*</code> class to add background color with card-header.</span>
                  </div>
                  <div class="card-body">
                    <div class="default-according" id="accordion1">
                      <div class="card">
                        <div class="card-header bg-primary" id="headingFour">
                          <h5 class="mb-0">
                            <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">Collapsible Group Item #<span>1</span></button>
                          </h5>
                        </div>
                        <div class="collapse show" id="collapseFour" aria-labelledby="headingOne" data-parent="#accordion1">
                          <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header bg-primary" id="headingFive">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed text-white" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Collapsible Group Item #<span>2</span></button>
                          </h5>
                        </div>
                        <div class="collapse" id="collapseFive" aria-labelledby="headingFive" data-parent="#accordion1">
                          <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header bg-primary" id="headingSix">
                          <h5 class="mb-0">
                            <button class="btn btn-link collapsed text-white" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">Collapsible Group Item #<span>3</span></button>
                          </h5>
                        </div>
                        <div class="collapse" id="collapseSix" aria-labelledby="headingSix" data-parent="#accordion1">
                          <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</div>
                        </div>
                      </div>
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
