@include('layouts.landing.header')
<div class="container">
    <h1 class="title">Gallery</h1>
    <div class="row gallery">
        <div class="col-sm-4 wowload fadeInUp"><a href="{{ asset('landing/images/photos/1.jpg') }}" title="Foods" class="gallery-image"
                data-gallery><img src="{{ asset('landing/images/photos/1.jpg') }}" class="img-responsive"></a></div>
    </div>
</div>
@include('layouts.landing.footer')
