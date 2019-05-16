<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>DVRMS - @yield('html-title')</title>

        @section('css-top')
        @show

        <!-- Notification css (Toastr) -->
        <link href="{{ asset('vendor/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css" />

        {{-- Sweet Alert --}}
        <link href="{{ asset('vendor/sweetalert/sweet-alert.css') }}" rel="stylesheet" type="text/css" />


        <!-- App css -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/core.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/components.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/pages.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/menu.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="{{ asset('vendor/switchery/switchery.min.css') }}">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="{{ asset('js/modernizr.min.js') }}"></script>

        @section('css-bot')
        @show

    </head>


    <body>


        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- Logo container-->
                    <div class="logo">
                        
                        <a href="/home/welcome" class="logo">
                            VACCINATION MONITORING OF MUNICIPAL AGRICULTURE OFFICE OF BALER
                        </a>
                        

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

                        <ul class="nav navbar-nav navbar-right pull-right">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="right-menu-item">
                                    <i class="mdi mdi-logout-variant"></i>
                                </a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            
                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>
                    <!-- end menu-extras -->

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="/home/welcome"><i class="mdi mdi-home"></i> Home</a>
                                <ul class="submenu">
                                    <li><a href="/home/history">History</a></li>
                                    <li><a href="/home/ra9482">Republic Act</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="javascript:void(0)"><i class="mdi mdi-map-marker"></i> Site</a>
                                <ul class="submenu">
                                    <!-- <li><a href="/site/vacc/0">Vaccinated</a></li> -->
                                    <!-- <li><a href="/site/nvacc/0">Non Vaccinated</a></li> -->
                                    @php($brgysMmm = App\Brgy::all())
                                    @foreach($brgysMmm as $brgysMmmm)
                                    <li><a href="/site/brgy/{{$brgysMmmm->id}}">Brgy. {{$brgysMmmm->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="javascript:void(0)"><i class="mdi mdi-file-document"></i> Reports</a>
                                <ul class="submenu">
                                    <li><a href="/reports/summary">Summary</a></li>
                                    <li><a href="/reports/vacc/0">Vaccinated</a></li>
                                    <li><a href="/reports/nvacc/0">Non-vaccinated</a></li>
                                    
                                </ul>
                            </li>


                            <li class="has-submenu">
                                <a href="/owner/"><i class="mdi mdi-account"></i> Owner</a>
                                <ul class="submenu">
                                    <li><a href="/owner/">Owner</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="/lost-and-found"><i class="mdi mdi-magnify"></i> Lost/Found</a>
                                <ul class="submenu">
                                    <li><a href="/lost-and-found">Lost/Found</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="javascript:void(0)"><i class="mdi mdi-settings"></i> Settings</a>
                                <ul class="submenu">
                                    <li><a href="/settings/account">Account</a></li>
                                    <!-- <li><a href="/settings/brgy">Baranggay</a></li> -->
                                    <!-- <li><a href="/settings/purok">Purok</a></li> -->
                                </ul>
                            </li>




                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    @section('breadcrumb')
                                    @show
                                </ol>
                            </div>
                            <h4 class="page-title">@yield('page-title')</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                @section('main-content')
                @show



                <!-- Footer -->
                <footer class="footer text-right">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                {{ date('Y', time()) }} © Vaccination Monitoring of Baler
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->

            </div>
        </div>


        <!-- jQuery  -->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/detect.js') }}"></script>
        <script src="{{ asset('js/fastclick.js') }}"></script>
        <script src="{{ asset('js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('js/waves.js') }}"></script>
        <script src="{{ asset('js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>

        @section('js-top')
        @show

        <!-- Toastr js -->
        <script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>

        {{-- Sweet Alert --}}
        <script src="{{ asset('vendor/sweetalert/sweet-alert.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('js/jquery.core.js') }}"></script>
        <script src="{{ asset('js/jquery.app.js') }}"></script>



        @section('js-bot')
        @show

        <script type="text/javascript">
            @if(session('success'))
                toastr["success"]("{{ session('success') }}");
            @endif

            @if(session('error'))
                toastr["error"]("{{ session('error') }}");
            @endif
        </script>

    </body>
</html>