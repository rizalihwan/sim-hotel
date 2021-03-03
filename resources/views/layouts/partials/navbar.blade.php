<div class="page-header">
    <div class="header-wrapper row m-0">
        <form class="form-inline search-full" action="#" method="get">
            <div class="form-group w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                            placeholder="Search Cuba .." name="q" title="" autofocus>
                        <div class="spinner-border Typeahead-spinner" role="status"><span
                                class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>
        <div class="header-logo-wrapper">
            <div class="logo-wrapper">
                <a href="index.html"><img class="img-fluid" src="{{ asset('assets/images/logo/logoweb.png') }}"
                        alt="logowebsite"></a>
            </div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="sliders"></i></div>
        </div>
        <div class="left-header col horizontal-wrapper pl-0">
            <ul class="horizontal-menu">
            </ul>
        </div>
        <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
                <li>
                    <div class="mode"><i class="fa fa-moon-o"></i></div>
                </li>
                <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                            data-feather="maximize"></i></a></li>
                <li class="profile-nav onhover-dropdown p-0 mr-0">
                    <div class="media profile-media">
                        <div class="avatars">
                            <div class="avatar">
                                @empty(auth()->user()->avatar)
                                    <img class="rounded-circle" src="{{ asset('assets/images/avatar/avatar-default.png') }}" width="50" alt="avatar">
                                @else
                                    <img class="rounded-circle" src="{{ auth()->user()->ImgProfile }}" style="width: 50px; height: 50px; object-fit: cover; object-position: top;" alt="avatar">
                                @endempty
                                <div class="status"></div>
                            </div>
                        </div>
                        <div class="media-body"><span>{{ auth()->user()->name }}</span>
                            <p class="mb-0 font-roboto">
                                @if(auth()->user()->hasRole('admin')) Admin @endif 
                                @if(auth()->user()->hasRole('customer')) Customer @endif
                                @if(auth()->user()->hasRole('boss')) Manager @endif
                                <i class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="{{ route('profile.setting') }}" class="active"><i
                                    data-feather="user"></i><span>Account </span></a></li>
                        <li><a data-toggle="modal" data-target="#exampleModalCenter"><i data-feather="log-in"> </i></i><span>Log Out</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">
                <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                <div class="ProfileCard-details">
                    <div class="ProfileCard-realName">aksdnaskjd</div>
                </div>
            </div>
        </script>
        <script class="empty-template" type="text/x-handlebars-template">
            <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>
        </script>
    </div>
</div>

{{-- modal logout --}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Perhatian !</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p>Jika Anda menekan logout Anda akan keluar dari aplikasi. Apakah anda yakin? jika iyaa maka tekan
                    "Logout"</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Kembali</button>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
</form>
