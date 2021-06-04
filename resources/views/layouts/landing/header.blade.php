<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>HRI Hotel | Best Relaxing Place</title>

    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800|Old+Standard+TT' rel='stylesheet'
        type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,500,800' rel='stylesheet' type='text/css'>

    <!-- font awesome -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('landing/assets/bootstrap/css/bootstrap.min.css') }}" />

    <!-- uniform -->
    <link type="text/css" rel="stylesheet" href="{{ asset('landing/assets/uniform/css/uniform.default.min.css') }}" />

    <!-- animate.css -->
    <link rel="stylesheet" href="{{ asset('landing/assets/wow/animate.css') }}" />


    <!-- gallery -->
    <link rel="stylesheet" href="{{ asset('landing/assets/gallery/blueimp-gallery.min.css') }}">


    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/logoweb.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('landing/images/favicon.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('landing/assets/style.css') }}">

</head>

<body id="home">


    <!-- top
  <form class="navbar-form navbar-left newsletter" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter Your Email Id Here">
        </div>
        <button type="submit" class="btn btn-inverse">Subscribe</button>
    </form>
 top -->

    <!-- header -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('customer.landing') }}"><img src="{{ asset('assets/images/logo/logoweb.png') }}" width="200" style="margin-top: -7rem;" alt="holiday crown"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav">
                    <li><a href="{{ route('customer.landing') }}">Home </a></li>
                    <li><a href="{{ route('customer.landing.rooms') }}">Rooms & Tariff</a></li>
                    <li><a href="{{ route('customer.landing.packages') }}">Packages</a></li>
                    <li><a href="{{ route('customer.landing.gallery') }}">Gallery</a></li>
                    <li><a href="{{ route('customer.landing.contact') }}">Contact</a></li>
                </ul>
            </div><!-- Wnavbar-collapse -->
        </div><!-- container-fluid -->
    </nav>
    <!-- header -->
