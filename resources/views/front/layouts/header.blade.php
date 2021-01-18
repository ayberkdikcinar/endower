<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title','Endower')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Endower" name="keywords">
        <meta content="Endower" name="description">

        <!-- Favicon -->
        <link href="{{asset('front/')}}/img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="{{asset('front/')}}/lib/slick/slick.css" rel="stylesheet">
        <link href="{{asset('front/')}}/lib/slick/slick-theme.css" rel="stylesheet">
        <link href="{{asset('front/')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
        <link href="{{asset('front/')}}/vendor/bootstrap.css" rel="stylesheet">
        
          <!-- For News -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
          <!-- For icons for input field -->
        <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Template Stylesheet -->
        <link href="{{asset('front/')}}/css/style.css" rel="stylesheet">
        <link href="{{asset('front/')}}/css/main.css" rel="stylesheet">
        <link href="{{asset('front/')}}/css/util.css" rel="stylesheet">


        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        @toastr_css
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        support@endower.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +012-345-6789
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->

        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="{{route('index')}}" class="nav-item nav-link @if(Request::segment(1)=="") active @endif">Home</a>
                            <a href="{{route('aboutus')}}" class="nav-item nav-link @if(Request::segment(1)=="about-us") active @endif">About Us</a>
                            <a href="{{route('contact.page')}}" class="nav-item nav-link @if(Request::segment(1)=="contact") active @endif">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto">
                            @if (Auth::check())
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}}</a>
                                <div class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                                    <a href="{{route('user.profile',Auth::user()->user_name)}}" class="dropdown-item">Profile</a>


                                    <li class="dropdown-submenu pull-left">

                                    <a href="{{route('user.profile.settings',Auth::user()->user_name)}}" class="dropdown-item">Settings</a>

                                    <ul class="dropdown-menu">
                                       <a class="dropdown-item" href="#">Change Password</a>
                                       <a class="dropdown-item" href="#">Donations_visible</a>

                                    </ul>
                                    </li>





                                    <a href="{{route('logout')}}" class="dropdown-item">Logout</a>
                                </div>
                            </div>
                            @else
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                                <div class="dropdown-menu">
                                    <a href="{{route('loginpage')}}" class="dropdown-item">Login</a>
                                    <a href="{{route('registerpage')}}" class="dropdown-item">Register</a>
                                </div>
                            </div>
                            @endif

                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->

        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="{{route('index')}}">
                                <img src="{{asset('front/')}}/img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <form action="/search" method="post">
                                <input type="text" style="outline:0;" name="q" placeholder="Search">
                                <button><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->
