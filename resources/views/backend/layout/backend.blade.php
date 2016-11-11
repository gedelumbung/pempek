<!DOCTYPE HTML>
<html class="fixed sidebar-left-collapsed">
    <head>
        <title>
            @if (trim($__env->yieldContent("title"))) 
                @yield('title')
            @else
                @section("title", "File Management") @show
            @endif
        </title>
        <link rel="shortcut icon" type="image/png" href="{{ asset("img/logo.png") }}"/> 

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

        <link rel="stylesheet" href="{{ asset("css/backend.css") }}">
    </head>
    <body>
        <section class="body">
            <!-- start: header -->
            <header class="header">
                <div class="logo-container">
                    <a href="{{url('/dashboard')}}" class="logo">
                        <img src="{{ asset("img/logosimpeg.png") }}" height="35" alt="Porto Admin" />
                    </a>
                    <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" 
                        data-target="html" data-fire-event="sidebar-left-opened">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <!-- start: search & user box -->
                <div class="header-right">

                    @if (Auth::check())
                        <div id="userbox" class="userbox">
                            <a href="#" data-toggle="dropdown">
                                <figure class="profile-picture">
                                    <img src="{{ asset("img/user-default.jpg") }}" class="img-circle" 
                                        data-lock-picture="{{ asset("img/user-default.jpg") }}" />
                                </figure>

                                <div class="profile-info">
                                    <span class="name">{{ Auth::user()->name }}</span>
                                    <span class="role">{{ Auth::user()->mail }}</span>
                                </div>
                
                                <i class="fa custom-caret"></i>
                            </a>
                
                            <div class="dropdown-menu">
                                <ul class="list-unstyled">
                                    <li>
                                        <a role="menuitem" tabindex="-1" href="{{ url('logout') }}">
                                            <i class="fa fa-power-off"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- end: search & user box -->
            </header>
            <!-- end: header -->

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                <aside id="sidebar-left" class="sidebar-left">
                    <div class="sidebar-header">
                        <div class="sidebar-title">
                            Navigation
                        </div>
                        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" 
                            data-target="html" data-fire-event="sidebar-left-toggle">
                            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                        </div>
                    </div>
                
                    <div class="nano">
                        <div class="nano-content">
                            <nav id="menu" class="nav-main" role="navigation">
                                @include('backend.partial.custom_menu', array('items' => $NavbarMenu->roots()))

                            </nav>
                        </div>
                    </div>
                </aside>
                <!-- end: sidebar -->

                <section role="main" class="content-body">
                    <header class="page-header">
                        <h2>@yield("title")</h2>
                    </header>

                    @yield("content")
                </section>
        </section>

        <!-- loading image -->
        <div class="hide">
            <img src="{{ asset('img/loading.gif') }}" id="img-loading" />
        </div>
        
        <script src="{{ asset("js/backend.js") }}"></script>

        @stack("script")

    </body>
</html>
