<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <!-- Title Page-->
    <title>{{ $title ?? 'HRI-HOTEL' }}</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/chartist.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
</head>
<body onload="startTime()">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper row m-0">
                <form class="form-inline search-full" action="#" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                                <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>
                <div class="header-logo-wrapper">
                    <div class="logo-wrapper">
                        <a href="index.html"><img class="img-fluid" src="{{ asset('assets/images/logo/logo.png') }}" alt=""></a>
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
                        <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>
                        <li class="profile-nav onhover-dropdown p-0 mr-0">
                            <div class="media profile-media"><img class="b-r-10" src="{{ asset('assets/images/dashboard/profile.jpg') }}" alt="">
                                <div class="media-body"><span>Emay Walter</span>
                                    <p class="mb-0 font-roboto">Admin <i class="middle fa fa-angle-down"></i></p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li><a href="#"><i data-feather="user"></i><span>Account </span></a></li>
                                <li><a href="#"><i data-feather="mail"></i><span>Inbox</span></a></li>
                                <li><a href="#"><i data-feather="file-text"></i><span>Taskboard</span></a></li>
                                <li><a href="#"><i data-feather="settings"></i><span>Settings</span></a></li>
                                <li><a href="#"><i data-feather="log-in"> </i><span>Log in</span></a></li>
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
        <!-- Page Header Ends                              -->
        <!-- Page Body Start-->
        <div class="page-body-wrapper sidebar-icon">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div class="logo-wrapper">
                    <a href="index.html"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logoweb.png') }}" alt="logowebsite" style="height: 50px; width: 200px; object-fit: cover;"><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logoweb.png') }}" alt=""></a>
                    <div class="back-btn"><i class="fa fa-angle-left"></i></div>
                    <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
                </div>
                <div class="logo-icon-wrapper">
                    <a href="index.html"><img class="img-fluid" src="{{ asset('assets/images/logo/logoweb.png') }}" alt="logowebsite" style="height: 50px; width: 50px; object-fit: cover;"></a>
                </div>
                <nav class="sidebar-main">
                    <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                    <div id="sidebar-menu">
                        <ul class="sidebar-links custom-scrollbar">
                            <li class="back-btn">
                                <a href="index.html"><img class="img-fluid" src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a>
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
                            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="file-text"></i><span>Forms</span></a>
                                <ul class="sidebar-submenu">
                                    <li><a class="submenu-title" href="#">Form Controls<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>
                                        <ul class="nav-sub-childmenu submenu-content">
                                            <li><a href="form-validation.html">Form Validation</a></li>
                                            <li><a href="base-input.html">Base Inputs</a></li>
                                            <li><a href="radio-checkbox-control.html">Checkbox & Radio</a></li>
                                            <li><a href="input-group.html">Input Groups</a></li>
                                            <li><a href="megaoptions.html">Mega Options</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="server"></i><span>Tables</span></a>
                                <ul class="sidebar-submenu">
                                    <li><a class="submenu-title" href="#">Bootstrap Tables<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>
                                        <ul class="nav-sub-childmenu submenu-content">
                                            <li><a href="bootstrap-basic-table.html">Basic Tables</a></li>
                                            <li><a href="bootstrap-sizing-table.html">Sizing Tables</a></li>
                                            <li><a href="bootstrap-border-table.html">Border Tables</a></li>
                                            <li><a href="bootstrap-styling-table.html">Styling Tables</a></li>
                                            <li><a href="table-components.html">Table components</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="submenu-title" href="#">Data Tables<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>
                                        <ul class="nav-sub-childmenu submenu-content">
                                            <li><a href="datatable-basic-init.html">Basic Init</a></li>
                                        </ul>
                                    </li>
                                    <li><a class="submenu-title" href="#">Ex. Data Tables<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>
                                        <ul class="nav-sub-childmenu submenu-content">
                                            <li><a href="datatable-ext-autofill.html">Auto Fill</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="command"></i><span>Icons</span></a>
                                <ul class="sidebar-submenu">
                                    <li><a href="flag-icon.html">Flag icon</a></li>
                                </ul>
                            </li>
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
            <!-- Breadcrumb -->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-6">
                                <h3>Default</h3>
                            </div>
                            <div class="col-6">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="index.html"> <i data-feather="home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">Dashboard</li>
                                    <li class="breadcrumb-item active">Default </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid starts-->
                <div class="container-fluid">
                    <div class="row second-chart-list third-news-update">
                        <div class="col-xl-9 xl-100 chart_data_left box-col-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="row m-0 chart-main">
                                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                            <div class="media align-items-center">
                                                <div class="hospital-small-chart">
                                                    <div class="small-bar">
                                                        <div class="small-chart flot-chart-container"></div>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="right-chart-content">
                                                        <h4>1001</h4><span>purchase </span>
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
                                                        <h4>1005</h4><span>Sales</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
                                            <div class="media align-items-center">
                                                <div class="hospital-small-chart">
                                                    <div class="small-bar">
                                                        <div class="small-chart2 flot-chart-container"></div>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="right-chart-content">
                                                        <h4>100</h4><span>Sales return</span>
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
                                                        <h4>101</h4><span>Purchase ret</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 xl-100 dashboard-sec box-col-12">
                            <div class="card earning-card">
                                <div class="card-body p-0">
                                    <div class="row m-0">
                                        <div class="col-xl-3 earning-content p-0">
                                            <div class="row m-0 chart-left">
                                                <div class="col-xl-12 p-0 left_side_earning">
                                                    <h5>Dashboard</h5>
                                                    <p class="font-roboto">Overview of last month</p>
                                                </div>
                                                <div class="col-xl-12 p-0 left_side_earning">
                                                    <h5>$4055.56 </h5>
                                                    <p class="font-roboto">This Month Earning</p>
                                                </div>
                                                <div class="col-xl-12 p-0 left_side_earning">
                                                    <h5>$1004.11</h5>
                                                    <p class="font-roboto">This Month Profit</p>
                                                </div>
                                                <div class="col-xl-12 p-0 left_side_earning">
                                                    <h5>90%</h5>
                                                    <p class="font-roboto">This Month Sale</p>
                                                </div>
                                                <div class="col-xl-12 p-0 left-btn"><a class="btn btn-gradient">Summary</a></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-9 p-0">
                                            <div class="chart-right">
                                                <div class="row m-0 p-tb">
                                                    <div class="col-xl-8 col-md-8 col-sm-8 col-12 p-0">
                                                        <div class="inner-top-left">
                                                            <ul class="d-flex list-unstyled">
                                                                <li>Daily</li>
                                                                <li class="active">Weekly</li>
                                                                <li>Monthly</li>
                                                                <li>Yearly</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-4 col-sm-4 col-12 p-0 justify-content-end">
                                                        <div class="inner-top-right">
                                                            <ul class="d-flex list-unstyled justify-content-end">
                                                                <li>Online</li>
                                                                <li>Store</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="card-body p-0">
                                                            <div class="current-sale-container">
                                                                <div id="chart-currently"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row border-top m-0">
                                                <div class="col-xl-4 pl-0 col-md-6 col-sm-6">
                                                    <div class="media p-0">
                                                        <div class="media-left"><i class="icofont icofont-crown"></i></div>
                                                        <div class="media-body">
                                                            <h6>Referral Earning</h6>
                                                            <p>$5,000.20</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-6 col-sm-6">
                                                    <div class="media p-0">
                                                        <div class="media-left bg-secondary"><i class="icofont icofont-heart-alt"></i></div>
                                                        <div class="media-body">
                                                            <h6>Cash Balance</h6>
                                                            <p>$2,657.21</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-12 pr-0">
                                                    <div class="media p-0">
                                                        <div class="media-left"><i class="icofont icofont-cur-dollar"></i></div>
                                                        <div class="media-body">
                                                            <h6>Sales forcasting</h6>
                                                            <p>$9,478.50 </p>
                                                        </div>
                                                    </div>
                                                </div>
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
            <!-- footer start-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 footer-copyright text-center">
                            <p class="mb-0">Copyright 2020 © Cuba theme by pixelstrap </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    {{-- swal vendor --}}
    @include('sweetalert::alert')
    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap/bootstrap.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/js/chart/chartist/chartist.js') }}"></script>
    <script src="{{ asset('assets/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
    <script src="{{ asset('assets/js/chart/knob/knob.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart/knob/knob-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
    <script src="{{ asset('assets/js/notify/index.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <!-- login js-->
    <!-- Plugin used-->
</body>

</html>
