@extends('layouts.app', ['title' => 'HRI-HOTEL | Room Survey'])
@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <span>
                    <h3><u>Room Survey</u></h3> 
                </span>
                <div class="btn-group">
                    <button type="button" class="btn btn-light btn-sm for-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-filter"></i> 
                    </button>
                    <button type="button" class="btn btn-secondary btn-sm for-dark" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-filter"></i> 
                    </button>
                    <div class="dropdown-menu">
                    <small class="dropdown-item text-secondary" aria-disabled="true">View based on</small>
                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('admin.account.register.index') }}">Default</a>
                        <a class="dropdown-item" href="{{ route('admin.account.latest') }}">Latest</a>
                        <a class="dropdown-item" href="{{ route('admin.account.asc') }}">Alphabet(A-Z)</a>
                        <a class="dropdown-item" href="{{ route('admin.account.desc') }}">Alphabet(Z-A)</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
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
        </div>
    </div>
</div>
@endsection