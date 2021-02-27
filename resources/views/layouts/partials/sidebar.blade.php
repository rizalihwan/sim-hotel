<div class="sidebar-wrapper">
    <div class="logo-wrapper">
        <a href="{{ route('home') }}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logoweb.png') }}" alt="logowebsite" style="height: 50px; width: 200px; object-fit: cover;"><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logowebdark.png') }}" alt="logowebsite" style="height: 50px; width: 200px; object-fit: cover;"></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper">
        <a href="{{ route('home') }}"><img class="img-fluid" src="{{ asset('assets/images/logo/logowebdark.png') }}" alt="logowebsite" style="height: 50px; width: 50px; object-fit: cover;"></a>
    </div>
    <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
            <ul class="sidebar-links custom-scrollbar">
                <li class="back-btn">
                    <a href="#"><img class="img-fluid" src="{{ asset('assets/images/logo/logowebdark.png') }}" alt=""></a>
                    <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="{{ route('home') }}"><i data-feather="home"> </i><span>Dashboard</span></a></li>  
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="user"></i><span>Management Account</span></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ route('admin.account.register.index') }}">Register Account</a></li>
                        <li><a href="{{ route('admin.account.admin') }}">Admin Account</a></li>
                        <li><a href="{{ route('admin.account.customer') }}">Customer Account</a></li>
                        <li><a href="{{ route('admin.account.boss') }}">Boss Account</a></li>
                    </ul>
                </li>   
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="bar-chart"></i><span>Report</span></a>
                    <ul class="sidebar-submenu">
                        <li><a href="#">Apex Chart</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
</div>