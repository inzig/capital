<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap3-wysihtml5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">    
    @yield('css')     
</head>

<body class="sidebar-mini skin-purple">
@if (!Auth::guest())
    <div class="wrapper" id="app">
        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="/" class="logo">
                <img src="{!! asset('img/logos.png') !!}" title="{{ config('app.name') }}" class="img-responsive">
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu" style="float: left;">
                    <ul class="nav navbar-nav">
                        <li><a>{!! config('app.token_name') !!} Wallet: <strong class="nav-wallet" id="cap_coin_balance">0.0</strong></a></li>
                        <li><a>{!! config('app.token_name') !!}G Wallet: <strong class="nav-wallet" id="capG_coin_balance">0.0</strong></a></li>
                    </ul>
                </div>

                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="{{ getUserAvatar() }}"
                                     class="user-image" alt="User Image"/>
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{!! Auth::user()->name !!}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="{{ getUserAvatar() }}"
                                         class="img-circle" alt="User Image"/>
                                    <p>
                                        {!! Auth::user()->name !!}
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{!! url('/profile') !!}" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Sign out
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
            <div class="clearfix"></div>
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright &copy; {{ date('Y') }} <a href="#">{{ config('app.name') }}</a>.</strong> All rights reserved.
        </footer>

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{!! url('/') !!}">
                    {{ config('app.name') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{!! url('/dashboard') !!}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{!! url('/login') !!}">Login</a></li>
                    <li><a href="{!! url('/register') !!}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif   
    <script
    src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>  
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
   
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/web3.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js"></script>
    <script src="{{ asset('js/table-dragger.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-maxlength.js') }}"></script>
    <script type="text/javascript">
        //tableDragger(document.querySelector('.table-sortable'), { mode: 'row', onlyBody: true, dragHandler: '.drag-handle' });

        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        $('textarea:not(.no-wsyiwyg)').wysihtml5();

        $('input[maxlength], textarea[maxlength]').maxlength({
            alwaysShow: true,
            placement: 'bottom-right'
        });
    </script>

    @if(!empty($userWalletAddress))
        <script>
            $(function () {
                $.ajax({
                    url: 'https://api.etherscan.io/api?module=account&action=tokenbalance&contractaddress={!! $smartContractAddress->value or '' !!}&address={!! $userWalletAddress !!}&tag=latest&apikey=freekey',
                    method: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        $('#coin_balance').text(parseFloat(response.result/1000000000000000000).toFixed(2));
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            });
        </script>
    @endif

    @yield('scripts')
</body>
</html>