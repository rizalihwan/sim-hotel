<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                @empty(auth()->user()->avatar)
                                    <img src="{{ asset('assets/images/avatar/avatar-default.png') }}" alt="Avatar" />
                                @else
                                    <img src="{{ auth()->user()->ImgProfile }}" style="object-fit: cover; object-position: top;" alt="Avatar" />
                                @endempty
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="{{ route('profile.setting') }}">{{ auth()->user()->name }}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="{{ route('profile.setting') }}">
                                            @empty(auth()->user()->avatar)
                                                <img src="{{ asset('assets/images/avatar/avatar-default.png') }}" alt="Avatar" />
                                            @else
                                                <img src="{{ auth()->user()->ImgProfile }}" style="object-fit: cover; object-position: top;" alt="Avatar" />
                                            @endempty
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="{{ route('profile.setting') }}">{{ auth()->user()->name }}</a>
                                        </h5>
                                        <span class="email">@if(auth()->user()->level == 'admin') ADMIN @endif</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="{{ route('profile.setting') }}">
                                            <i class="zmdi zmdi-account"></i>   Akun Saya</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="{{ route('logout') }}" onclick="return logout(event);"><i class="zmdi zmdi-power"></i>Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                    <script type="text/javascript">
                                        function logout(event){
                                            event.preventDefault();
                                            let check = confirm("Apa anda yakin untuk keluar?");
                                            if(check){
                                                document.getElementById('logout-form').submit();
                                            }
                                         }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
