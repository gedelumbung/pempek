<!DOCTYPE HTML>
<html>
<head>
    <title> @yield('title', "Front End") </title>
    <link rel="shortcut icon" type="image/png" href="{{ asset("img/logo.png") }}"/> 

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset("img/favicon.ico") }}">

    @stack("style")
    <link rel="stylesheet" href="{{ elixir('css/frontend.css') }}">
    @stack("app-style")
</head>

<body>
    <!-- Header -->
    <header id="header" data-plugin-options='{
        "stickyEnabled": true, 
        "stickyEnableOnBoxed": true, 
        "stickyEnableOnMobile": true, 
        "stickyStartAt": 57, 
        "stickySetTop": "-57px", 
        "stickyChangeLogo": true}'>
        <div class="header-body">
            <div class="header-container container">
                <div class="header-row">
                    <div class="header-column">
                        <div class="header-logo">
                            <a href="{{ url("/") }}">
                                <img alt="Porto" width="280" height="65" data-sticky-width="170" 
                                    data-sticky-height="45" data-sticky-top="35" src="{{ asset("img/logosimpeg.png") }}">
                            </a>
                        </div>
                    </div>
                    <div class="header-column">
                        <div class="header-row">
                            <div class="header-search hidden-xs">
                                <form id="searchForm" method="get">
                                    <!-- <div class="input-group">
                                        <input type="text" class="form-control" name="q" id="q" 
                                            placeholder="Search..." required>

                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div> -->
                                </form>
                            </div>
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">
                                    @if(Auth::check() == false)
                                    <li class="hidden-xs"> <a href="login">Login</a> </li>
                                    @else
                                    <li class="hidden-xs"> <a href="dashboard">Dashboard</a> </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        <div class="header-row">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<div class="banner">
    <ul>
        @foreach($sliders as $slider)
        <li style="height: 500px; overflow: hidden;">
            <div style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url({{asset('slider/'.$slider->image)}}); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit; z-index: 20;"></div>
        </li>
        @endforeach
    </ul>    
</div>
<div class="container">
        <div class="row mt-xlg">
            

<div class="row">
    <div class="col-md-12">
        <div class="blog-posts">
            @foreach($pengumuman as $data_pengumuman)
                <article class="post post-large">

                    <div class="post-date">
                        <span class="day" style="color:#0088cc">{{$data_pengumuman->created_at->format('d')}}</span>
                        <span class="month" style="background-color:#0088cc">{{$data_pengumuman->created_at->format('M')}}</span>
                    </div>

                    <div class="post-content">

                        <h2><a href="#" target="_top">{{$data_pengumuman->title}}</a></h2>
                        <p>{!! $data_pengumuman->description !!}</p>

                        <div class="post-meta">
                            <span><i class="fa fa-user"></i> By <a href="#" target="_top">Admin</a> </span>
                        </div>

                    </div>
                </article>
            @endforeach
            {{$pengumuman->links()}}
        </div>
    </div>

</div>

        </div>
    </div>

    <!-- Body -->
    @yield("body")

    <!-- Footer -->
    <footer id="footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="contact-details">
                        <h4>Hubungi Kami</h4>
                        <ul class="contact">
                            <p>
                                <i class="fa fa-map-marker"></i> 
                                {{cache('Kantor1')}}
                            </p>
                            <p>
                                <i class="fa fa-map-marker"></i> 
                                {{cache('Kantor2')}}
                            </p>
                            <p>
                                <i class="fa fa-phone"></i> <strong>Telp:</strong> {{cache('Telpon')}}
                            </p>
                            <p>
                                <i class="fa fa-envelope"></i> 
                                <strong>Email:</strong> {{cache('Email')}}
                            </p>
                        </ul>
                    </div>
                </div>

                <div class="col-md-offset-6 col-md-2">
                    <h4>Follow Us</h4>
                    <ul class="social-icons">
                        <li class="social-icons-facebook">
                            <a href="{{cache('Facebook')}}" target="_blank" title="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="social-icons-twitter">
                            <a href="{{cache('Twitter')}}" target="_blank" title="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="social-icons-linkedin">
                            <a href="{{cache('Linkedin')}}" target="_blank" title="Linkedin">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-copyright">
            <div class="container">
                <p>© Copyright 2016. All Rights Reserved.</p>
            </div>
        </div>
    </footer>


    <!-- loading image -->
    <div class="hide">
        <img src="{{ asset('img/loading.gif') }}" id="img-loading" />
    </div>

    <!-- Javascript -->

    @stack("script")
    <script src="{{ elixir('js/frontend.js') }}"></script>
    <script>
        $('.banner').unslider({
            autoplay: true,
            arrows: false
        });
    </script>

    @stack("app-script")
</body>
</html>