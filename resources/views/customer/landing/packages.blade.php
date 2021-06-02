@include('layouts.landing.header')
<div class="container">

    <h1 class="title">Packages or Category</h1>
    <div class="row">
        @forelse ($categories as $category)
        <div class="col-sm-6 wowload fadeInUp">
            <div class="rooms">
                <div class="info">
                    <div class="d-flex justify-content-between">
                        <h3 class="text-secondary">{{ $category->name }}</h3>
                    </div>
                    <div>
                        Description : {!! Str::limit($category->description, 200) !!}
                    </div>
                    <div class="mb-2">
                        Facility : <p>{{$category->facility }}</p>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-12">
            <center>
                <h3 style="color: red;">Data Empty!</h3>
            </center>
        </div>
        @endforelse
    </div>


    <div class="spacer">
        <div class="embed-responsive embed-responsive-16by9"><iframe width="560" height="315"
                src="https://www.youtube.com/embed/XbP216GpLUo" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe></div>
    </div>




</div>
@include('layouts.landing.footer')
