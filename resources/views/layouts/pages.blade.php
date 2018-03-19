<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{!! $seo->title or config('app.name') !!}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="{!! $seo->description or '' !!}">
    <meta name="keywords" content="{!! $seo->extra['keywords'] or '' !!}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="{!! asset('css/animate.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/font-awesome.min.css') !!}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800">
    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
</head>
<body class="background-color-body">
<nav class="navbar navbar-inverse navbar-fixed-top nav-background wow fadeInUp" data-spy="affix" data-offset-top="50" data-wow-delay="0.4s">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img src="{!! asset($logo) !!}" alt="{!! config('app.name') !!}"></a>
        </div>
        <div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="/#about">{!! $navbar->extra['about'] or 'About' !!}</a></li>
                    <li><a href="/#feature">{!! $navbar->extra['features'] or 'Features' !!}</a></li>
                    <li><a href="#">{!! $navbar->extra['whitepaper'] or 'Whitepaper' !!}</a></li>
                    <li><a href="/#token-sale">{!! $navbar->extra['token_sale'] or 'Token Sale' !!}</a></li>
                    <li><a href="/#roadmap">{!! $navbar->extra['roadmap'] or 'Roadmap' !!}</a></li>
                    <li><a href="/#team">{!! $navbar->extra['team'] or 'Team' !!}</a></li>
                    <li><a href="/#faq">{!! $navbar->extra['faq'] or 'Faq' !!}</a></li>
                    <li>
                        @auth
                            <a class="login-btn" href="/dashboard"><img src="{!! asset('img/login.png') !!}">{!! $navbar->extra['dashboard'] or 'Dashboard' !!}</a>
                        @else
                            <a class="login-btn" href="/login"><img src="{!! asset('img/login.png') !!}">{!! $navbar->extra['login'] or 'Login' !!}</a>
                        @endauth
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <img src="{!! asset('img/language.png') !!}">&nbsp;&nbsp;{!! $current_language['code'] !!}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-language">
                            @foreach(config('app.locales') as $locale => $label)
                                @if($locale != $current_language['code'])<li><a href="?lang={!! $locale !!}">{!! $label !!}</a></li>@endif
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container margin-top-100">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="margin-bottom-50">
                <h1 class="about-heading">@yield('title')</h1>
            </div>
            <div class="card mb-4 margin-bottom-50 text-center">
                @yield('body')
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center padding-0-60 mobile-footer-padding">
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 text-align-left padding-none mobile-text-center">
                    <a class="footer-links" href="/terms-and-conditions"><span>Terms Of Use</span></a>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 text-align-right padding-none mobile-text-center">
                    <p class="footer-links">Copyright © {!! date('Y') !!} {!! config('app.name') !!}, All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{!! asset('js/jquery-3.1.0.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
</body>
</html>