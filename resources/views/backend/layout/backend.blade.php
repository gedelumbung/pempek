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
                                <ul id="menu-container" class="nav nav-main">
                                    <li >
                                    <a href='http://dev.pkblonline.com/simpeg/public/pegawai'>
                                        <i class='fa fa-users'></i>
                                        <span>Pegawai</span>
                                    </a>

                                    </li><li class='nav-parent'>
                                    <a href='#'>
                                        <i class='fa fa-cogs'></i>
                                        <span>Administrator</span>
                                    </a>

                                            <span class="toggler">
                                            <span class="glyphicon glyphicon-chevron-down"></span>
                                        </span>
                                        
                                        <ul class='nav nav-children'><li >
                                    <a href='http://dev.pkblonline.com/simpeg/public/admin/role'>
                                        <i class='fa fa-user'></i>
                                        <span>Roles</span>
                                    </a>

                                    </li><li >
                                    <a href='http://dev.pkblonline.com/simpeg/public/admin'>
                                        <i class='fa fa-users'></i>
                                        <span>Users</span>
                                    </a>

                                    </li><li >
                                    <a href='http://dev.pkblonline.com/simpeg/public/admin/permissions'>
                                        <i class='fa fa-lock'></i>
                                        <span>Permissions</span>
                                    </a>

                                    </li></ul>
                                    </li><li class='nav-parent'>
                                    <a href='#'>
                                        <i class='fa fa-wrench'></i>
                                        <span>Formasi</span>
                                    </a>

                                            <span class="toggler">
                                            <span class="glyphicon glyphicon-chevron-down"></span>
                                        </span>
                                        
                                        <ul class='nav nav-children'><li >
                                    <a href='http://dev.pkblonline.com/simpeg/public/formasi/golongan'>
                                        <i class='fa fa-pencil'></i>
                                        <span>Pangkat dan Golongan</span>
                                    </a>

                                    </li><li >
                                    <a href='http://dev.pkblonline.com/simpeg/public/formasi/jabatan'>
                                        <i class='fa fa-pencil'></i>
                                        <span>Jabatan Struktural</span>
                                    </a>

                                    </li><li >
                                    <a href='http://dev.pkblonline.com/simpeg/public/formasi/unit'>
                                        <i class='fa fa-pencil'></i>
                                        <span>Formasi Unit Kerja</span>
                                    </a>

                                    </li></ul>
                                    </li><li >
                                    <a href='http://dev.pkblonline.com/simpeg/public/validasi'>
                                        <i class='fa fa-check-square-o'></i>
                                        <span>Validasi Data</span>
                                    </a>

                                    </li><li >
                                    <a href='http://dev.pkblonline.com/simpeg/public/settings'>
                                        <i class='fa fa-gears'></i>
                                        <span>Settings</span>
                                    </a>

                                    </li><li >
                                    <a href='http://dev.pkblonline.com/simpeg/public/laporan/duk'>
                                        <i class='fa fa-file-text'></i>
                                        <span>Laporan DUK</span>
                                    </a>

                                    </li><li >
                                    <a href='http://dev.pkblonline.com/simpeg/public/laporan/nominatif'>
                                        <i class='fa fa-file-text'></i>
                                        <span>Laporan Nominatif</span>
                                    </a>

                                    </li><li class='nav-parent'>
                                    <a href='#'>
                                        <i class='fa fa-file-text'></i>
                                        <span>Laporan</span>
                                    </a>

                                            <span class="toggler">
                                            <span class="glyphicon glyphicon-chevron-down"></span>
                                        </span>
                                        
                                        <ul class='nav nav-children'><li >
                                    <a href='http://dev.pkblonline.com/simpeg/public/laporan/pendidikan'>
                                        <i class='fa fa-pencil'></i>
                                        <span>Pendidikan</span>
                                    </a>

                                    </li><li >
                                    <a href='http://dev.pkblonline.com/simpeg/public/laporan/jabatan'>
                                        <i class='fa fa-pencil'></i>
                                        <span>Jabatan</span>
                                    </a>

                                    </li><li >
                                    <a href='http://dev.pkblonline.com/simpeg/public/laporan/golongan'>
                                        <i class='fa fa-pencil'></i>
                                        <span>Golongan</span>
                                    </a>

                                    </li><li >
                                    <a href='http://dev.pkblonline.com/simpeg/public/laporan/konfigurasi'>
                                        <i class='fa fa-pencil'></i>
                                        <span>Konfigurasi</span>
                                    </a>

                                    </li></ul>
                                    </li>
                                </ul>

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
