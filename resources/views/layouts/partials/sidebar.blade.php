<div class="sidebar-wrapper">
    <div class="logo-wrapper">
        <a href="{{ route('home') }}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logoweb.png') }}" alt="logowebsite" style="height: 50px; width: 200px; object-fit: cover;"><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logoweb.png') }}" alt="logowebsite" style="height: 50px; width: 200px; object-fit: cover;"></a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper">
        <a href="{{ route('home') }}"><img class="img-fluid" src="{{ asset('assets/images/logo/logoweb.png') }}" alt="logowebsite" style="height: 50px; width: 50px; object-fit: cover;"></a>
    </div>
    <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
            <ul class="sidebar-links custom-scrollbar">
                <li class="back-btn">
                    <a href="index.html"><img class="img-fluid" src="{{ asset('assets/images/logo/logoweb.png') }}" alt=""></a>
                    <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
                </li>
                <li class="sidebar-list">
                    <label class="badge badge-success">2</label><a class="sidebar-link sidebar-title" href="#"><i data-feather="home"></i><span class="lan-3">Dashboard              </span></a>
                    <ul class="sidebar-submenu">
                        <li><a class="lan-4" href="index.html">Default</a></li>
                        <li><a class="lan-5" href="dashboard-02.html">Ecommerce</a></li>
                    </ul>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="task.html"><i data-feather="check-square"> </i><span>Tasks</span></a></li>                    
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="bar-chart"></i><span>Charts</span></a>
                    <ul class="sidebar-submenu">
                        <li><a href="chart-apex.html">Apex Chart</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
</div>