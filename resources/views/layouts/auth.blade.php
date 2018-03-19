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
    <style>
        .input-group, .input-group .form-control {
            display: inherit;
        }
        .input-group .form-control {
            padding: 10px;
            font-size: 17px;
        }
    </style>
</head>
<body class="background-color-body">

<section id="main" class="jsc wow fadeInUp login-page" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
    <div id="particles-js" >
        <div class="overlay">
            <div class="container text-center wow bounceIn"  data-wow-delay="0.2s" data-aos="fade-up" data-aos-anchor-placement="top-bottom"  data-aos-duration="1000">
                <div class="form-signin">
                    @yield('form')
                </div>
            </div>
        </div>
</section>

<footer class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center padding-0-60 mobile-footer-padding text-center">
                <p class="footer-links"> &copy; {!! date('Y') !!} {!! config('app.name') !!} - All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

<script src="{!! asset('js/jquery-3.1.0.min.js') !!}"></script>
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('js/particles.js') !!}"></script>
<script src="{!! asset('js/app.js') !!}"></script>
<script src="{!! asset('js/aos.js') !!}"></script>
<script src="{!! asset('js/particles-config.js') !!}"></script>

</body>
</html>