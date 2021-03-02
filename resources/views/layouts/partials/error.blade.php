@if($errors->any())
    <div class="alert alert-danger inverse alert-dismissible fade show" role="alert"><i
        class="icon-alert txt-light"></i>
        <ul>
            <li>Something was wrong, because :</li>
            @foreach ($errors->all() as $err)
                <li>&middot; {{ $err }}</li>
            @endforeach
        </ul>
        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    </div>
@endif