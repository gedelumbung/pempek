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
<div class="forcefullwidth_wrapper_tp_banner" style="position:relative;width:100%;height:auto;margin-top:0px;margin-bottom:0px"><div class="slider-container rev_slider_wrapper" style="margin-top: 0px; margin-bottom: 0px; position: absolute; overflow: visible; height: 500px; width: 1920px; left: 0px;">
    <div id="revolutionSlider" class="slider rev_slider revslider-initialised tp-simpleresponsive" data-plugin-revolution-slider="" data-plugin-options="{&quot;delay&quot;: 9000, &quot;gridwidth&quot;: 1170, &quot;gridheight&quot;: 500}" style="max-height: 500px; margin-top: 0px; margin-bottom: 0px; height: 500px;">
        <ul class="tp-revslider-mainul" style="visibility: visible; display: block; overflow: hidden; width: 100%; height: 100%; max-height: none;">
                            <li data-transition="fade" class="tp-revslider-slidesli" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0; background-color: rgba(255, 255, 255, 0);">
                    <div class="slotholder" style="width: 100%; height: 100%; visibility: inherit; opacity: 1; transform: translate3d(0px, 0px, 0px); backface-visibility: hidden; left: 0px; top: 0px; position: absolute;"><!--Runtime Modification - Img tag is Still Available for SEO Goals in Source - <img src="http://dev.pkblonline.com/simpeg/public/data/slider/IqBPH4eGFTCXDoPMnxT51mFxVtJKDt38.jpg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg defaultimg">--><div class="tp-bgimg defaultimg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url(&quot;http://dev.pkblonline.com/simpeg/public/data/slider/IqBPH4eGFTCXDoPMnxT51mFxVtJKDt38.jpg&quot;); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit; z-index: 20;" src="http://dev.pkblonline.com/simpeg/public/data/slider/IqBPH4eGFTCXDoPMnxT51mFxVtJKDt38.jpg"></div></div>
                </li>
                            <li data-transition="fade" class="tp-revslider-slidesli" style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0; background-color: rgba(255, 255, 255, 0);">
                    <div class="slotholder" style="width: 100%; height: 100%; backface-visibility: hidden; left: 0px; top: 0px; position: absolute; transform: translate3d(0px, 0px, 0px); visibility: inherit; opacity: 1;"><!--Runtime Modification - Img tag is Still Available for SEO Goals in Source - <img src="http://dev.pkblonline.com/simpeg/public/data/slider/KvjGqX6OjkvcaDZsegul25TmqEdpdLy6.jpg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg defaultimg">--><div class="tp-bgimg defaultimg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url(&quot;http://dev.pkblonline.com/simpeg/public/data/slider/KvjGqX6OjkvcaDZsegul25TmqEdpdLy6.jpg&quot;); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit; z-index: 20;" src="http://dev.pkblonline.com/simpeg/public/data/slider/KvjGqX6OjkvcaDZsegul25TmqEdpdLy6.jpg"></div></div>
                </li>
                            <li data-transition="fade" class="tp-revslider-slidesli active-revslide" style="width: 100%; height: 100%; overflow: hidden; z-index: 20; visibility: inherit; opacity: 1; background-color: rgba(255, 255, 255, 0);">
                    <div class="slotholder" style="width: 100%; height: 100%; backface-visibility: hidden; left: 0px; top: 0px; position: absolute; transform: translate3d(0px, 0px, 0px); visibility: inherit; opacity: 1;"><!--Runtime Modification - Img tag is Still Available for SEO Goals in Source - <img src="http://dev.pkblonline.com/simpeg/public/data/slider/taGm8FXiUCP8sqJ4XKcmy4ScKPqvT279.jpg" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg defaultimg">--><div class="tp-bgimg defaultimg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url(&quot;http://dev.pkblonline.com/simpeg/public/data/slider/taGm8FXiUCP8sqJ4XKcmy4ScKPqvT279.jpg&quot;); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit; z-index: 20;" src="http://dev.pkblonline.com/simpeg/public/data/slider/taGm8FXiUCP8sqJ4XKcmy4ScKPqvT279.jpg"></div></div>
                </li>
                    </ul>
    <div class="tp-loader spinner3" style="display: none;"><div class="dot1"></div><div class="dot2"></div><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div><div class="tp-bannertimer" style="visibility: visible; width: 74.1111%; transform: translate3d(0px, 0px, 0px);"></div><div class="tp-leftarrow tparrows   noSwipe" style="top: 50%; transform: matrix(1, 0, 0, 1, 30, -20); left: 0px; visibility: hidden; opacity: 0;"></div><div class="tp-rightarrow tparrows   noSwipe" style="top: 50%; transform: matrix(1, 0, 0, 1, -70, -20); left: 100%; visibility: hidden; opacity: 0;"></div></div>
</div><div class="tp-fullwidth-forcer" style="width: 100%; height: 500px;"></div></div>
<div class="container">
        <div class="row mt-xlg">
            

<div class="row">
    <div class="col-md-12">
        <div class="blog-posts">
                    <article class="post post-large">

                <div class="post-date">
                    <span class="day" style="color:#0088cc">23</span>
                    <span class="month" style="background-color:#0088cc">Jun</span>
                </div>

                <div class="post-content">

                    <h2><a href="#" target="_top">Pengumuman Pertama</a></h2>
                    <p>Pengumuman Untuk seluruh pegawai harap membawa surat pendaftaran</p>

                    <div class="post-meta">
                        <span><i class="fa fa-user"></i> By <a href="#" target="_top">Admin</a> </span>
                    </div>

                </div>
            </article>
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
                                <strong>Kantor 1 :</strong> Jl. TMP Kalibata No.17, Jakarta Selatan,12750, DKI Jakarta, Indonesia
                            </p>
                            <p>
                                <i class="fa fa-map-marker"></i> 
                                <strong>Kantor 2 :</strong> Jl. Abdul Muis No.7, RT.2/RW.3, Gambir, Jakarta Pusat, DKI Jakarta, Indonesia
                            </p>
                            <p>
                                <i class="fa fa-phone"></i> <strong>Telp:</strong> (021) 3500334
                            </p>
                            <p>
                                <i class="fa fa-envelope"></i> 
                                <strong>Email:</strong> humas@kemendesa.go.id
                            </p>
                        </ul>
                    </div>
                </div>

                <div class="col-md-offset-6 col-md-2">
                    <h4>Follow Us</h4>
                    <ul class="social-icons">
                        <li class="social-icons-facebook">
                            <a href="http://www.facebook.com" target="_blank" title="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="social-icons-twitter">
                            <a href="http://www.twitter.com" target="_blank" title="Twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="social-icons-linkedin">
                            <a href="http://www.linkedin.com" target="_blank" title="Linkedin">
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

    @stack("app-script")
</body>
</html>