<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Capital</title>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="">
        <meta name="description" content="">




        <!-- animate css -->
        <link rel="stylesheet" href="css/animate.min.css">
        <!-- bootstrap css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- font-awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- google font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
        <link rel="stylesheet" href="css/aos.css">


        <!-- custom css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/sections-style.css">

    </head>
    <body class="background-color-body">
        <nav class="navbar navbar-inverse navbar-fixed-top nav-background wow fadeInUp" data-spy="affix" data-offset-top="50"  data-wow-delay="0.4s" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand site-logo" href="index.html"><img src="img/logos.png" ></a>
                </div>
                <div>
                    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                        <!--                        <ul class="nav navbar-nav header-top-btn pull-right">
                                                    <li class="dropdown">
                                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
                                                            <img src="img/lang.png">
                                                            <span class="">En</span>
                                                            <span class="caret"></span>
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-language">
                                                            <li><a href="#">EN</a></li>
                                                            <li><a href="#">YP</a></li>
                                                            <li><a href="#">ES</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a class="whitepaper-header" href="#">Whitepaper</a></li>
                                                    <li><a class="download-header" href="#">Download Wallet</a></li>
                                                </ul>-->
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="true">
                                    <!--<img src="img/lang.png">-->
                                    <span class="">En</span>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-language">
                                    <li><a href="#">EN</a></li>
                                    <li><a href="#">YP</a></li>
                                    <li><a href="#">ES</a></li>
                                </ul>
                            </li>
                            <li><a href="#main" class="main-banner">Home</a></li>
                            <!--<li><a class="about" href="#about">About</a></li>-->
                            <li><a class="feature" href="#feature">PlateForm</a></li>
                            <li><a class="roadmap" href="#roadmap">Roadmap</a></li>
                            <li><a class="tokensale" href="#tokensale">Token Sale</a></li>
                            <li><a href="#team" class="team_id">Team</a></li>
                            <li><a href="#press_id" class="press_id">Press</a></li>
                            <li><a href="#faq" class="faq">Faq</a></li>
                            <li><a class="" href="#">Whitepaper</a></li>
                            <li class="login-btn"><a class="login-btn"  href="{{ url('login') }}"><img src="img/lgn-btn.png"> Login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- end navigation -->


        <!--LOGIN MODAL BOX START-->

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body padding-none">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="wrapper">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--LOGIN MODAL BOX END-->



        <!-- start home -->
        <section id="main">
            <div id="particles-js">
                <div class="overlay">
                    <div class="container">
                        <div class="row">
                            <!--<div class="carousel slide media-carousel" id="main-banner-slider">-->
                            <!--<div class="carousel-inner">-->
                            <!--                                    <div class="item active">
                                                                    <div class="col-md-10 col-lg-10 col-sm-12 col-xs-12 wow fadeIn padding-col-md-6 top-right-col" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
                                                                        <div class="banner-slider-txt-item">
                                                                            <h1 class="features-heading-2 margin-top-20 enter-email-heading aos-init aos-animate" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">VANIG MISSION</h1>
                                                                            <p class="main-sllider-content">
                                                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, 
                                                                            </p>
                                                                            <div class="input-group stay_update">
                                                                                <input class="form-control submit_field banner_email_field" placeholder="Enter your email to subscribe to over news" type="text">
                                                                                <div class="input-group-btn">
                                                                                    <button class="btn btn-default search_btn banner-sub-btn" type="submit">
                                                                                        <span class="">SUBSCRIBE</span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="countdown-padding margin-top-30">
                                                                            <div class="wow fadeInUp "  data-wow-delay="0.3s">
                                                                                <div>
                                                                                    <h3 class="presale-heading">PRE SALE ENDS IN</h3>
                                                                                    <div id="clockdiv">
                                                                                        <div class="timer">
                                                                                            <span class="days">0</span>
                                                                                            <div class="smalltext">Days</div>
                                                                                        </div>
                                                                                        <span class="dot-size">:</span>
                                                                                        <div class="timer">
                                                                                            <span class="hours">00</span>
                                                                                            <div class="smalltext">Hours</div>
                                                                                        </div>
                                                                                        <span class="dot-size">:</span>
                                                                                        <div class="timer">
                                                                                            <span class="minutes">00</span>
                                                                                            <div class="smalltext">Minutes</div>
                                                                                        </div>
                                                                                        <span class="dot-size">:</span>
                                                                                        <div class="timer">
                                                                                            <span class="seconds">00</span>
                                                                                            <div class="smalltext">Seconds</div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                            
                            
                                                                    </div>
                                                                </div>-->

                            <!--<div class="item">-->
                            <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12 wow fadeIn padding-col-md-6 top-right-col" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">

                                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                                    <h2 class="banner-left-title">
                                        <span class="blue-txt">World's Most Profitable </span>
                                        Standard of <span class='orng-txt'>Self-Expanding Crypto</span> Infrastructure
                                    </h2>
                                    <div class="col-md-12 text-center padding-progressbar margin-top-60">
                                        <h2 class="progress-bar-title-inner">MultiLIngual simple &amp; Secure</h2>
                                        <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12 margin-top-15 bnr-left-prgres-bg">
                                            <div class="c1">
                                                20 _ 23 NOV<br>
                                                <span>15% BONUS</span>
                                            </div>
                                            <div class="c2">
                                                23 _ 28 NOV<br>
                                                <span>10% BONUS</span>
                                            </div>
                                            <div class="c3">
                                                20 NOV _ 20 DEC<br>
                                                <span>5% BONUS</span>
                                            </div>
                                            <div class="c4">
                                                <span class="btn bnr-left-bns-btn">150% BONUS</span>
                                            </div>
                                            <div class="progress progress-bar-style">
                                                <!--<div class="one progressbar-succes-color"></div>-->
                                                <div class="progress-bar progress-bar-first" style="width: 20%"></div>
                                                <div class="progress-bar progress-bar-second" style="width: 20%"></div>
                                                <div class="progress-bar progress-bar-third" style="width: 30%"></div>
                                                <div class="progress-bar progress-bar-four" style="width: 30%"></div>
                                            </div>
                                            <!--<span class="progress-bar-btm-txt align-center">NEXT BONUS RATE: 525 VNG/ETH</span>-->
                                        </div>
                                        <div class="progress-bar-btm-txt">$186,271.00</div>
                                        <div class="progress-bar-btm-txt">Total raised</div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 wow fadeIn" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
                                <div class="banner-left-circle">
                                    <div class="countdown-padding margin-top-30">
                                        <div class="wow fadeInUp "  data-wow-delay="0.3s">
                                            <div>
                                                <h3 class="presale-heading">TOKEN SALE<br> <small>- ENDS IN -</small></h3>
                                                <div id="clockdiv">
                                                    <div class="timer">
                                                        <span class="days"></span>
                                                        <div class="smalltext">Days</div>
                                                    </div>
                                                    <span class="dot-size">:</span>
                                                    <div class="timer">
                                                        <span class="hours"></span>
                                                        <div class="smalltext">Hours</div>
                                                    </div>
                                                    <span class="dot-size">:</span>
                                                    <div class="timer">
                                                        <span class="minutes"></span>
                                                        <div class="smalltext">Min</div>
                                                    </div>
                                                    <span class="dot-size">:</span>
                                                    <div class="timer">
                                                        <span class="seconds"></span>
                                                        <div class="smalltext">Sec</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="circle-dvd-top-txt">CONTRIBUTE NOW</span>
                                    <span class="baner-lft-cont-btm-txt">WE ACCEPT BTC, ETH, LTC, AND OTHER</span>
                                    <img class="" src="img/banner-lft-inner-logos.jpg">

                                </div>
                            </div>
                            <!--</div>-->
                            <!--                                    <div class="item">
                            -->                                                                    
                            <!--</div>-->
                            <!--</div>-->
                            <!--                                <a data-slide="prev" href="#main-banner-slider" class="left carousel-control"></a>
                                                            <a data-slide="next" href="#main-banner-slider" class="right carousel-control"></a>-->
                        </div>


                        <!--<div class="col-md-2 col-lg-2 col-sm-12 col-xs-12"></div>-->
                    </div>


                </div>
            </div>
            <!--</div>-->
        </section>
        <!--Section Home End-->


        <!--Section Our Partners Start-->
        <section id="our-partners" class="wow bounceIn  patners-top-banners"  data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center">
                        <div class="logos-padding">
                            <h2 class="partners-heading">AS <span class="about-heading-2">SEEN ON</span></h2>
                            <span><img class="partners-img" src="img/patner1.png"></span><span><img class="partners-img" src="img/patner2.png"></span> <span><img class="partners-img" src="img/patner3.png"></span> <span><img class="partners-img" src="img/patner1.png"></span> <span><img class="partners-img" src="img/patner2.png"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Section Our Partners End-->


        <!-- start about -->
        <section id="about" class="wow bounce"  data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="container-fluid padding-about-us">
                <div class="row mobile-margin-0">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center our-pred-section">
                        <div class="row">
                            <div class="col-md-7 col-lg-7 col-sm-7 col-xs-12 text-align-left margin-top-30" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
                                <div class="margin-bottom-20 text-left">
                                    <h1 class="about-heading">Our Prediction <span class="about-heading-2">Platform</span> </h1>
                                    <!--<img src="img/about-vanig-new.gif">-->
                                </div>

                                <div class="about-us-content">
                                    <p>
                                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classicaland going through the cites. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one.


                                    </p>
                                    <!--                                    <ul>
                                                                            <li><span>1</span><p>orem Ipsum is simply dummy text of the printing and typesetting industry.</p></li>
                                                                            <li><span>2</span><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p></li>
                                                                            <li><span>3</span><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p></li>
                                                                        </ul>-->
                                </div>
                                <a href="#" class="read-more-btn">Launch Alpha</a>
                                <a href="#" class="read-more-btn watch-video-btn"><i class="fa fa-caret-right"></i>Watch Our Video </a>
                            </div>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12 text-align-right margin-top-30">
                                <img class="margin-top-0 iphone-img" src="img/iphone.png"  data-aos="zoom-in-right" data-aos-duration="1000">
                                <!--<iframe src="https://player.vimeo.com/video/224765170?title=0&byline=0&portrait=0" width="100%" height="460" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>-->

                                <!--<img src="img/video-banner.png">-->


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end about -->


        <!-- start how it works section -->
        <section id="how-it-works" class="wow fadeInUp"  data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="container-fluid">
                <div class="row mobile-margin-0">
                    <div class="col-md-12 col-lg-12 col-sm-12 mobile-padding-20 padding-how">
                        <div class="row text-center">
                            <h2 class="problem-stat-title features-heading-2 no-padding aos-init aos-animate col-md-6 col-sm-12" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000"><strong>Capital Investments </strong>- The Future in your Hands</h2>
                        </div>
                        <div class="row text-left">
                            <div class="col-md-12 no-padding">
                                <p class="h1-content prb-stat-content margin-bottom-20 margin-top-20 no-padding">Highly profitable, global crypto-mining-infrastructure - Hosted in mobile, modular CSC
                                    containers - Decentralized placement directly at the energy source. </p>
                            </div>
                        </div>

                        <div class="no-padding cap-invest-inner col-md-12 col-lg-12 col-sm-12 col-xs-12 margin-top-30 mobile-text-center wow slideInLeft z-index-1 text-center"  data-wow-delay="0.2s">
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 no-padding">
                                    <div class="col-md-12 col-sm-12 padding-none" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                        <div class="ci-lft-icon col-md-3"><img src="img/icon-1.png" style="max-width:100%"></div>

                                        <div class="features-p col-md-9">
                                            <div class="features-h"> Benebit Card</div>
                                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature.

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 no-padding">
                                    <div class="col-md-12 col-sm-12 padding-none" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                        <div class="ci-lft-icon col-md-3"><img src="img/icon-2.png" style="max-width:100%"></div>

                                        <div class="features-p col-md-9">
                                            <div class="features-h"> Benebit Card</div>
                                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature.

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 no-padding margin-top-70">
                                    <div class="col-md-12 col-sm-12 padding-none" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                        <div class="ci-lft-icon col-md-3"><img src="img/icon-3.png" style="max-width:100%"></div>

                                        <div class="features-p col-md-9">
                                            <div class="features-h"> Benebit Card</div>
                                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature.

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12 no-padding margin-top-70">
                                    <div class="col-md-12 col-sm-12 padding-none" data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                        <div class="ci-lft-icon col-md-3"><img src="img/icon-4.png" style="max-width:100%"></div>

                                        <div class="features-p col-md-9">
                                            <div class="features-h"> Benebit Card</div>
                                            Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature.

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                                <img src="img/graph-banner.png" class="margin-top-70" data-aos="zoom-in-right" data-aos-duration="1000">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end how it works Section -->

        <!-- Start enter email Section -->
        <section id="enter-email-cont" class="wow fadeIn"  data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-9">
                            <div class="col-md-9 col-sm-9 col-xs-9 text-right padding-none">
                                <h3 class="download">Read Our <span class="whitepaper">WhitePaper</span></h3>
                                <img class="margin-top-20" src="img/line-2.png">
                                <p class="download-content text-left margin-top-10">
                                    It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 text-align-right ">

                            <div class="col-md-12 col-sm-12 col-xs-12 co text-align-left">
                                <img class="download-btn-img" src="img/download-btn.png">
                                <button class="btn download-btn">DOWNLOAD</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end enter email Section -->

        <!-- start features section -->

        <!-- start roadmap -->
        <section id="roadmap" class="wow fadeInUp"  data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="container-fluid">
                <h1 class="features-heading-2" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000"><strong>Capital</strong>Roadmap</h1>
                <h2 class="text-left roadmap-sm-title">Meet Our Brilliant Roadmap</h2>
                <div class="row margin-top-10">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 no-padding" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
                        <img src="img/roadmap-img.png" class="margin-top-50" data-aos="zoom-in-right" data-aos-duration="1000">
                    </div>
                </div>
                <button class="btn btn-show-more">Show More<i class="fa fa-arrow-right"></i></button>
            </div>
        </section>

        <!-- start Crowd Sale -->
        <section id="crowd_sale">
            <div class="container">
                <h2 class="crowd-sale-heading">CROWDSALE</h2>
                <h2 class="crowd-sale-heading crowd-sale-sm-heading margin-top-10">JOIN OUR CROWDSALE</h2>
                <div class="coins-raised margin-top-30 padding-0-30">
                    <div class="row" data-aos="zoom-in-left" data-aos-duration="1000">
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-6 coins-no-col" style="text-align: left;">
                            <img class="margin-10-negv" src="img/coins-sm-icons.png">
                            <span class="coins-numbers">  Total Rised</span>
                            <span class="coins-numbers-sm"> 000,000 USD</span>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-3 col-xs-6" style="text-align: left;">
                            <img class="margin-10-negv" src="img/people-sm-icon.png">
                            <span class="coins-numbers"> Total Investor</span>
                            <span class="coins-numbers-sm"> 000,000</span>
                        </div>

                    </div>
                </div>
                <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                    <div class="col-md-12 text-center padding-progressbar margin-top-60">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-15">
                            <div class="progress progress-bar-style">
                                <div class="zero progressbar-succes-color"></div>
                                <div class="one progressbar-succes-color"></div>
                                <div class="two progress-bar-uncompleted"></div>
                                <div class="three progress-bar-uncompleted"></div>
                                <div class="progress-bar progress-bar-completed" style="width: 45%"></div>
                            </div>
                            <div class="prbar-1 prbar-crowdsale col-sm-4  col-xs-6 margin-top-20 text-left">0</div>
                            <div class="prbar-2 prbar-crowdsale col-sm-3 col-xs-6 margin-top-20 text-left">0,000,000 usd</div>
                            <div class="prbar-3 prbar-crowdsale col-sm-3 col-xs-6 margin-top-20 text-left">0,000,000 usd</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 margin-top-50">
                    <div class="coins-raised margin-top-30 padding-0-30">
                        <div class="row contrib-recv-cont" data-aos="zoom-in-right" data-aos-duration="1000">
                            <div class="col-lg-offset-1 col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                <img class="margin-10-negv" src="img/icon2.png"><span class="coins-numbers"><span> BITCOIN</span></span>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                <img class="margin-10-negv" src="img/icon4.png"><span class="coins-numbers"> <span>LITECOIN</span></span>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                <img class="margin-10-negv" src="img/icon1.png"><span class="coins-numbers"> <span>ETHEREUM</span> </span>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                <img class="margin-10-negv" src="img/icon5.png"><span class="coins-numbers"> <span>DASHCOIN</span> </span>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                <img class="margin-10-negv" src="img/icon6.png"><span class="coins-numbers"><span> USDT</span></span>
                            </div>
                        </div>
                        <button class="btn btn-crowdsale">Show More<i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Crowd Sale -->
        <!--ecosystem section start-->

        <section id="ecosystem">
            <div class="container">
                <h2 class="ecosystem-title"><strong>Capital</strong> Ecosystem</h2>
                <p class="ecosystem-sm-txt">The Capital token grants exclusive access to the CrowdWiz Ecosystem. Don't miss the opportunity to participate in the Token sale and become part of the first crowd.</p>
                <div class="col-sm-6 margin-top-100">
                    <img src="img/ecosystem-lft-banner.png" data-aos="zoom-in-left" data-aos-duration="1000">
                </div>
                <div class="col-sm-6 margin-top-100 ecosystem-rgt-col">
                    <h2 class="ecosystem-rgt-title"><strong>Capital</strong> highlights</h2>
                    <ul class="list-group">
                        <li class="list-group-item ">
                            <h2>Decentralized</h2>
                            <p>The Capital token grants exclusive access to the CrowdWiz Ecosystem. Don't miss the opportunity to participate in the Token sale and become part of the first crowd.</p>
                        </li>
                        <li class="list-group-item ">
                            <h2>Collective wisdom</h2>
                            <p>The Capital token grants exclusive access to the CrowdWiz Ecosystem. Don't miss the opportunity to participate in the Token sale and become part of the first crowd.</p>
                        </li>
                        <li class="list-group-item ">
                            <h2>User friendly</h2>
                            <p>The Capital token grants exclusive access to the CrowdWiz Ecosystem. Don't miss the opportunity to participate in the Token sale and become part of the first crowd.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!--ecosystem section end-->
        <!--Section news Start-->
        <section id="our-partners" class="wow bounceIn"  data-wow-delay="0.2s" data-aos="fade-up" data-aos-anchor-placement="top-bottom"  data-aos-duration="1000">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center">
                        <div class="logos-padding">
                            <h2 class="partners-heading">Our Patners</h2>
                            <span><img class="partners-img" src="img/patner1.png"></span><span><img class="partners-img" src="img/patner2.png"></span> <span><img class="partners-img" src="img/patner3.png"></span> <span><img class="partners-img" src="img/patner1.png"></span> <span><img class="partners-img" src="img/patner2.png"></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Section news End-->
        <!-- has-start 27 code start  -->
        <section id="tokensale" class="tokensale-wraper">
            <div class="container-fluid">
                <div class="row mobile-margin-0 mobile-padding-0 padding-top-40 margin-top-20">
                    <div class="text-center">
                        <h1 class="features-heading container">Token<span class="features-heading-2"> Sale</span></h1>
                        <p class="token-sale-sm-txt container margin-top-10 no-padding">
                            The Capital token grants exclusive access to the CrowdWiz Ecosystem. Don't miss the opportunity to participate in the Token sale and become part of the first crowd.


                        </p>
                        <!--<img src="img/line-2.png">-->
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                            <div class="bannerleft-circle text-center wow fadeIn" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
                                <h3>Funds Allocation</h3>
                                <div class="light jsTitleAnimeFade2" style=""></div>
                                <div class="chart-inner-cont">
                                    <img src="img/chart-bf1.png" class="img-responsive pie-chart-bg" alt="Image">
                                    <span class="chart-left-txt wow fadeIn" data-wow-delay="2s" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" data-aos-duration="1000">Legal 10%</span>
                                    <span class="chart-right-txt wow fadeIn" data-wow-delay="2s" data-aos="zoom-in-left" data-aos-easing="ease-in-sine" data-aos-duration="1000">Software Development 30%</span>
                                    <span class="chart-bottom-txt wow fadeIn" data-wow-delay="2s" data-aos="zoom-in-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">Marketing 60%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 wow fadeIn padding-col-md-6" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
                            <div class="row" data-aos="zoom-in-right" data-aos-duration="1000">
                                <div class="col-md-12 text-center padding-progressbar margin-top-60">
                                    <h3>Token Distribution</h3>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="c1 bar_tittle">
                                            Bounty Campaign 60%<br>
                                        </div>
                                        <div class="progress progress-bar-style">
                                            <div class="progress-bar progress-bar-completed" style="width: 60%"></div>
                                        </div>
                                    </div>
                                </div>

                                <!--  end-->
                                <div class="col-md-12 text-center padding-progressbar margin-top-10">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-15">
                                        <div class="c1 bar_tittle">
                                            Crowdsale 20%<br>
                                        </div>
                                        <div class="progress progress-bar-style">
                                            <div class="progress-bar progress-bar-completed" style="width: 20%"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--  end-->
                                <div class="col-md-12 text-center padding-progressbar margin-top-10">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-15">
                                        <div class="c1 bar_tittle">
                                            Team 10%<br>
                                        </div>
                                        <div class="progress progress-bar-style">
                                            <div class="progress-bar progress-bar-completed" style="width: 10%"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--  end-->
                                <div class="col-md-12 text-center padding-progressbar margin-top-10">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-15">
                                        <div class="c1 bar_tittle">
                                            Presle 10%<br>
                                        </div>
                                        <div class="progress progress-bar-style">
                                            <div class="progress-bar progress-bar-completed" style="width: 30%"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--  end-->
                                <div class="col-sm-12  wow fadeIn" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
                                    <p>Capital token is an ERC-20 ethereum based token, <br> Total supply:  <strong>2000 00 00 $</strong></p>
                                    <button type="button" class="token btn btn-default btn-slider">Contribute Now</button>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-2 col-lg-2 col-sm-12 col-xs-12"></div>-->
                    </div>
                </div>
            </div>
            <!-- end roadmap -->
        </section>
        <!--End Token Sale-->
        <section id="team" class="team_section wow fadeInDown" data-wow-delay="0.4s">
            <div class="container-fluid">
                <div class="row mobile-margin-0 padding-top-50 ">
                    <div class="text-left container">
                        <h1 class="features-heading">Our<span class="features-heading-2"> <strong>Motivated</strong></span> Team</h1>
                        <h2 class="team-sm-title margin-top-10">Meet Our Brilliant Minds</h2>
                        <!--<img src="img/line-2.png">-->
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div id="team-col" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 wow fadeIn padding-col-md-6 top-right-col" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">

                            <div class="team_member col-sm-12 no-padding">
                                <div class="col-md-5th-0 col-sm-3 col-md-offset-0 col-sm-offset-0 staff-main-col">
                                    <div class="img-overlay-main">
                                        <img src="img/staff-pic1.png" class="img-responsive" alt="Image">
                                        <span class="img-overlay"></span>
                                        <span class="img-ovly-txt">in</span>
                                    </div>
                                    <p>Adam Smith</p>
                                    <span>The owner of Crypterio WP, Before founding Blockchain...</span>
                                </div>
                                <div class="col-md-5th-0 col-sm-3 col-xs-6 staff-main-col">
                                    <div class="img-overlay-main">
                                        <img src="img/staff-pic2.png" class="img-responsive" alt="Image">
                                        <span class="img-overlay"></span>
                                        <span class="img-ovly-txt">in</span>
                                    </div>
                                    <p>Jason Garrison</p>
                                    <span>The owner of Crypterio WP, Before founding Blockchain...</span>
                                </div>
                                <div class="col-md-5th-0 col-sm-3 col-xs-6 staff-main-col">
                                    <div class="img-overlay-main">
                                        <img src="img/staff-pic3.png" class="img-responsive" alt="Image">
                                        <span class="img-overlay"></span>
                                        <span class="img-ovly-txt">in</span>
                                    </div>
                                    <p>Clark Sunguy</p>
                                    <span>The owner of Crypterio WP, Before founding Blockchain...</span>
                                </div>
                                <div class="col-md-5th-0 col-sm-3 col-xs-6 staff-main-col">
                                    <div class="img-overlay-main">
                                        <img src="img/staff-pic4.png" class="img-responsive" alt="Image">
                                        <span class="img-overlay"></span>
                                        <span class="img-ovly-txt">in</span>
                                    </div>
                                    <p>Jayne Watkinson</p>
                                    <span>The owner of Crypterio WP, Before founding Blockchain...</span>
                                </div>
                            </div>
                            <div class="team_member text-center  col-sm-12 col-md-offset-0 no-padding">
                                <div class="col-md-5th-0 col-sm-3 col-md-offset-0 col-sm-offset-0 staff-main-col">
                                    <div class="img-overlay-main">
                                        <img src="img/staff-pic1.png" class="img-responsive" alt="Image">
                                        <span class="img-overlay"></span>
                                        <span class="img-ovly-txt">in</span>
                                    </div>
                                    <p>Adam Smith</p>
                                    <span>The owner of Crypterio WP, Before founding Blockchain...</span>
                                </div>
                                <div class="col-md-5th-0 col-sm-3 col-xs-6 staff-main-col">
                                    <div class="img-overlay-main">
                                        <img src="img/staff-pic2.png" class="img-responsive" alt="Image">
                                        <span class="img-overlay"></span>
                                        <span class="img-ovly-txt">in</span>
                                    </div>
                                    <p>Jason Garrison</p>
                                    <span>The owner of Crypterio WP, Before founding Blockchain...</span>
                                </div>
                                <div class="col-md-5th-0 col-sm-3 col-xs-6 staff-main-col">
                                    <div class="img-overlay-main">
                                        <img src="img/staff-pic3.png" class="img-responsive" alt="Image">
                                        <span class="img-overlay"></span>
                                        <span class="img-ovly-txt">in</span>
                                    </div>
                                    <p>Clark Sunguy</p>
                                    <span>The owner of Crypterio WP, Before founding Blockchain...</span>
                                </div>
                                <div class="col-md-5th-0 col-sm-3 col-xs-6 staff-main-col">
                                    <div class="img-overlay-main">
                                        <img src="img/staff-pic4.png" class="img-responsive" alt="Image">
                                        <span class="img-overlay"></span>
                                        <span class="img-ovly-txt">in</span>
                                    </div>
                                    <p>Jayne Watkinson</p>
                                    <span>The owner of Crypterio WP, Before founding Blockchain...</span>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-2 col-lg-2 col-sm-12 col-xs-12"></div>-->
                    </div>
                </div>
                <div class="row mobile-margin-0 padding-top-50 ">
                    <div class="text-left container">
                        <h1 class="features-heading">Our<span class="features-heading-2"> <strong>Motivated</strong></span> Team</h1>
                        <h2 class="team-sm-title margin-top-10">Meet Our Brilliant Minds</h2>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div id="team-col" class="col-md-12 col-lg-12 col-sm-12 col-xs-12 wow fadeIn padding-col-md-6 top-right-col" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">

                            <div class="team_member col-sm-12 no-padding">
                                <div class="col-md-5th-0 col-sm-3 col-md-offset-0 col-sm-offset-0 staff-main-col">
                                    <div class="img-overlay-main">
                                        <img src="img/staff-pic1.png" class="img-responsive" alt="Image">
                                        <span class="img-overlay"></span>
                                        <span class="img-ovly-txt">in</span>
                                    </div>
                                    <p>Adam Smith</p>
                                    <span>The owner of Crypterio WP, Before founding Blockchain...</span>
                                </div>
                                <div class="col-md-5th-0 col-sm-3 col-xs-6 staff-main-col">
                                    <div class="img-overlay-main">
                                        <img src="img/staff-pic2.png" class="img-responsive" alt="Image">
                                        <span class="img-overlay"></span>
                                        <span class="img-ovly-txt">in</span>
                                    </div>
                                    <p>Jason Garrison</p>
                                    <span>The owner of Crypterio WP, Before founding Blockchain...</span>
                                </div>
                                <div class="col-md-5th-0 col-sm-3 col-xs-6 staff-main-col">
                                    <div class="img-overlay-main">
                                        <img src="img/staff-pic3.png" class="img-responsive" alt="Image">
                                        <span class="img-overlay"></span>
                                        <span class="img-ovly-txt">in</span>
                                    </div>
                                    <p>Clark Sunguy</p>
                                    <span>The owner of Crypterio WP, Before founding Blockchain...</span>
                                </div>
                                <div class="col-md-5th-0 col-sm-3 col-xs-6 staff-main-col">
                                    <div class="img-overlay-main">
                                        <img src="img/staff-pic4.png" class="img-responsive" alt="Image">
                                        <span class="img-overlay"></span>
                                        <span class="img-ovly-txt">in</span>
                                    </div>
                                    <p>Jayne Watkinson</p>
                                    <span>The owner of Crypterio WP, Before founding Blockchain...</span>
                                </div>
                            </div>

                        </div>
                        <!--<div class="col-md-2 col-lg-2 col-sm-12 col-xs-12"></div>-->
                    </div>
                </div>
            </div>
            <!-- end roadmap -->
        </section>
        <!--Section team End-->



        <section id="blog">
            <div class="container-fluid">
                <div class="row mobile-margin-0 padding-top-50">
                    <div class="text-center">
                        <h1 class="features-heading"><span class="features-heading-2">Media Coverage &</span>Blog</h1>
                        <img src="img/line-2.png">
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 wow fadeIn padding-col-md-6" data-wow-delay="0.2s" data-aos="zoom-in-right" data-aos-duration="1000">
                            <div class="media_slide_wrapp col-xs-10 col-xs-offset-1 no-padding">
                                <div class="carousel slide multi-item-carousel" id="mediad_slider">
                                    <div class="carousel-inner">
                                        <div class="item active">
                                            <div class="col-sm-4 half-padding">
                                                <img src="img/slider-banner2.png" class="img-responsive">
                                                <div class="media_item_footer">
                                                    <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard  </p>
                                                    <div class="ftr_bottom">
                                                        <div class="col-sm-6 no-padding">Sept 4, 2016</div>
                                                        <div class="col-sm-6 no-padding"><a href="blog.html" class="btn btn-default btn-slider">Read Article</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="col-sm-4 half-padding">
                                                <img src="img/slider-banner.png" class="img-responsive">
                                                <div class="media_item_footer">
                                                    <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </p>
                                                    <div class="ftr_bottom">
                                                        <div class="col-sm-6 no-padding">Sept 4, 2016</div>
                                                        <div class="col-sm-6 no-padding"><a href="blog.html" class="btn btn-default btn-slider">Read Article</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="col-sm-4 half-padding">
                                                <img src="img/slider-banner2.png" class="img-responsive">
                                                <div class="media_item_footer">
                                                    <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard </p>
                                                    <div class="ftr_bottom">
                                                        <div class="col-sm-6 no-padding">Sept 4, 2016</div>
                                                        <div class="col-sm-6 no-padding"><a href="blog.html" class="btn btn-default btn-slider">Read Article</a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="left carousel-control" href="#mediad_slider" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                                    <a class="right carousel-control" href="#mediad_slider" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end roadmap -->
        </section>
        <!-- has-start 27 code end  -->


        <!--Start FAQ-->
        <section id="faq" class="wow fadeInDown" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="container-fluid padding-faq" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                <div class="text-center">
                    <h1 class="about-heading-2 margin-none">Our <strong>FAQ</strong> </h1>
                    <!--<img src="img/line-2.png">-->
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 margin-top-40 faq-main-cont">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 faq-content-main">
                                <div class="wrapper center-block">
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingOne">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="panel-body">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default ">
                                            <div class="panel-heading" role="tab" id="headingTwo">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                <div class="panel-body">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 

                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default ">
                                            <div class="panel-heading" role="tab" id="headingThree">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.      </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default ">
                                            <div class="panel-heading" role="tab" id="headingFour">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="headingFive">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry?
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                <div class="panel-body">
                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End FAQ-->

        <!--Start Press Release-->

        <section id="press-release" class="margin-20" data-aos="zoom-in-right" data-aos-duration="1000">
            <div class="container">
                <h2 class="press-release-title"><span>Press</span>Release</h2>
                <div class="row margin-top-70">
                    <div class="col-sm-3 col-xs-3"><img src="img/pr1.png"></div>
                    <div class="col-sm-3 col-xs-3"><img src="img/pr2.png"></div>
                    <div class="col-sm-3 col-xs-3"><img src="img/pr3.png"></div>
                    <div class="col-sm-3 col-xs-3"><img src="img/pr4.png"></div>
                </div>
                <div class="row margin-top-70">
                    <div class="col-sm-3 col-xs-3"><img src="img/pr5.png"></div>
                    <div class="col-sm-3 col-xs-3"><img src="img/pr6.png"></div>
                    <div class="col-sm-3 col-xs-3"><img src="img/pr7.png"></div>
                    <div class="col-sm-3 col-xs-3"><img src="img/pr8.png"></div>
                </div>
            </div>
        </section>

        <!--End Press Release-->


        <!-- start contact us section -->
        <section id="contact">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-center margin-top-0 padding-contact">
                        <div class="row">

                            <div class="col-md-7 col-lg-7 pull-right col-sm-12 col-xs-12 margin-top-10 border-newsletter text-center contact-main-cont">
                                <h1 class="contact-us-h text-left" > <span>Subscribe</span> to receive updates</h1>

                                <div class="col-sm-12 text-left margin-20">
                                    <button class="btn btn-save-spot">Save Your Spot <i class="fa fa-arrow-right"></i></button>
                                </div>
                                <div class="col-sm-12 text-left margin-20">
                                    <button class="btn ft-btn-light-papper">Light Paper</button>
                                    <button class="btn ft-btn-white-papper">White Paper</button>
                                </div>
                                <div class="col-sm-12 text-left margin-20">
                                    <p>Or</p>
                                </div>
                                <form class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer-cont-form">
                                    <div class="form-group col-md-6 col-lg-6 col-sm-6 col-xs-12 no-padding">
                                        <input type="email" class="form-control" id="newsletter" name="newsletter" placeholder="Enter Email Address" required>
                                    </div>
                                    <button type="button" id="submit" name="submit" class="btn btn-send col-sm-5">Subscribe <i class="fa fa-arrow-right"></i></button>

                                </form>
                            </div>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 wow fadeInRight"  data-wow-delay="0.3s" data-aos="fade-down-right"  data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                <!--<h1 class="contact-us-h margin-left-15">FOLLOW US</h1>-->
                                <div class="follow-us-line-height text-left">
                                    <a href=""><i class="fa fa-facebook fa-style fb" aria-hidden="true"></i></a>
                                    <a href=""><i class="fa fa-twitter fa-style twitter" aria-hidden="true"></i> </a>
                                    <a href=""><i class="fa fa-youtube fa-style fb" aria-hidden="true"></i></a>
                                    <a href=""><i class="fa fa-telegram fa-style telegram" aria-hidden="true"></i></a>
                                    <a href=""><i class="fa fa-reddit fa-style reddit" aria-hidden="true"></i> </a>
                                    <a href=""><i class="fa fa-linkedin fa-style reddit" aria-hidden="true"></i> </a>
                                    <a href=""><i class="fa fa-github fa-style git" aria-hidden="true"></i></a>
                                    <a href=""><i class="fa fa-bitcoin fa-style bitcoin" aria-hidden="true"></i> </a>
                                    <a class="cstm-icon-ftr" href=""><img src="img/cstm-icon.png" alt="Medium" class="fa-style fa"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end contact us section -->


        <!-- start footer -->
        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 padding-0-60 mobile-footer-padding text-center no-padding">
                        <p class="footer-links"> © 2018 Capital - All Rights Reserved. Phone: +359897091941 Terms & Conditions </p>
                    </div>

                </div>
            </div>
        </footer>
        <!-- end footer -->


        <!--Up Icon-->

        <a id="back-to-top" href="#" class="btn back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><img src="img/up.png"></a>

        <!--Up Icon End-->


        <!--<script src="js/jquery.js"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/particles.js"></script>
        <script src="js/app.js"></script>
        <!--<script src="https://code.highcharts.com/highcharts.js"></script>-->
        <!--<script src="https://code.highcharts.com/modules/exporting.js"></script>-->
        <!--<script src="https://cdn.zingchart.com/zingchart.min.js"></script>-->
        <script src="js/aos.js"></script>
        <script>
            AOS.init({
                easing: 'ease-in-out-sine'
            });

//            setInterval(addItem, 300);

//            var itemsCounter = 1;
//            var container = document.getElementById('aos-demo');

//            function addItem() {
//                if (itemsCounter > 42)
//                    return;
//                var item = document.createElement('div');
//                item.classList.add('aos-item');
//                item.setAttribute('data-aos', 'fade-up');
//                item.innerHTML = '<div class="aos-item__inner"><h3>' + itemsCounter + '</h3></div>';
//                container.appendChild(item);
//                itemsCounter++;
//            }
        </script>




        <!--Start Of Timer-->
        <script>
            function getTimeRemaining(endtime) {
                var t = Date.parse(endtime) - Date.parse(new Date());
                var seconds = Math.floor((t / 1000) % 60);
                var minutes = Math.floor((t / 1000 / 60) % 60);
                var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
                var days = Math.floor(t / (1000 * 60 * 60 * 24));
                return {
                    'total': t,
                    'days': days,
                    'hours': hours,
                    'minutes': minutes,
                    'seconds': seconds
                };
            }

            function initializeClock(id, endtime) {
                var clock = document.getElementById(id);
                var daysSpan = clock.querySelector('.days');
                var hoursSpan = clock.querySelector('.hours');
                var minutesSpan = clock.querySelector('.minutes');
                var secondsSpan = clock.querySelector('.seconds');

                function updateClock() {
                    var t = getTimeRemaining(endtime);

                    daysSpan.innerHTML = t.days;
                    hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

                    if (t.total <= 0) {
                        clearInterval(timeinterval);
                    }
                }

                updateClock();
                var timeinterval = setInterval(updateClock, 1000);
            }

            var deadline = new Date(Date.parse(new Date()) + 34 * 36 * 40 * 60 * 1000);
            initializeClock('clockdiv', deadline);


        </script>

        <!--End Of Timer-->
        <!--
                <script>
                    wow = new WOW(
                            {
                                animateClass: 'animated',
                                offset: 100,
                                callback: function (box) {
                                    console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                                }
                            }
                    );
                    wow.init();
                </script>-->



        <script>
            $('.panel-collapse').on('show.bs.collapse', function () {
                $(this).siblings('.panel-heading').addClass('active');
            });

            $('.panel-collapse').on('hide.bs.collapse', function () {
                $(this).siblings('.panel-heading').removeClass('active');
            });
        </script>



        <script>

            $(document).ready(function () {
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 50) {
                        $('#back-to-top').fadeIn();
                    } else {
                        $('#back-to-top').fadeOut();
                    }
                });
                // scroll body to 0px on click
                $('#back-to-top').click(function () {
                    $('#back-to-top').tooltip('hide');
                    $('body,html').animate({
                        scrollTop: 0
                    }, 1500);
                    return false;
                });

                $('#back-to-top').tooltip('show');

            });

        </script>

        <!--Start Of Slider-->
        <script>
            $(document).ready(function () {
                $('#Carousel').carousel({
                    interval: 5000
                })
            });
        </script>
        <!--End Of Slider-->


        <!--Start Of Slider2-->
        <script>
            $(document).ready(function () {
                $('#Carousel1').carousel({
                    interval: 5000
                })
            });
        </script>
        <!--End Of Slider-->
        <!--Script Of FAQ-->


        <!--Script Of FAQ-->

        <script>
            $(document).ready(function ()
            {
                var navItems = $('.admin-menu li > a');
                var navListItems = $('.admin-menu li');
                var allWells = $('.admin-content');
                var allWellsExceptFirst = $('.admin-content:not(:first)');

                allWellsExceptFirst.hide();
                navItems.click(function (e)
                {
                    e.preventDefault();
                    navListItems.removeClass('active');
                    $(this).closest('li').addClass('active');

                    allWells.hide();
                    var target = $(this).attr('data-target-id');
                    $('#' + target).show();
                });
            });
        </script>

        <!--End Script FAQ-->


        <script>
            $(document).ready(function () {
                $('#team-carousel').carousel({
                    interval: 5000
                })
            });
        </script>

        <script>
            $(document).ready(function () {
                $('#team-carousel1').carousel({
                    interval: 5000
                })
            });
        </script>

        <script>
            if (document.documentElement.clientWidth >= 768) {
                $('.multi-item-carousel').carousel({
                    interval: false
                });
                // for every slide in carousel, copy the next slide's item in the slide.
                // Do the same for the next, next item.
                $('.multi-item-carousel .item').each(function () {
                    var next = $(this).next();
                    if (!next.length) {
                        next = $(this).siblings(':first');
                    }
                    next.children(':first-child').clone().appendTo($(this));

                    if (next.next().length > 0) {
                        next.next().children(':first-child').clone().appendTo($(this));
                    } else {
                        $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
                    }
                });
            }
        </script>

        <script>


            $(document).ready(function () {
                $(".main-banner, .roadmap").on("click", function () {
                    $("#feature-inner").removeClass("nevigated");
                });
                $('.main-banner').on('click', function (e) {
                    e.preventDefault();
                    $(window).scrollTop($('#main').offset().top - $('.navbar-fixed-top').height())
                });
                $('.team_id').on('click', function (e) {
                    e.preventDefault();
                    $(window).scrollTop($('.team_section').offset().top - $('.navbar-fixed-top').height())
                });

                $('.roadmap').on('click', function (e) {
                    e.preventDefault();
                    $(window).scrollTop($('#roadmap').offset().top - $('.navbar-fixed-top').height())
                });
                $('.tokensale').on('click', function (e) {
                    e.preventDefault();
                    $(window).scrollTop($('#tokensale').offset().top - $('.navbar-fixed-top').height());
//                    $("#tokensale .progress-bar-style .progress-bar").addClass("token-sale-progressbar");
//                   $("#tokensale .light").css("opacity", 1);
                });
                $('.feature').on('click', function (e) {
                    e.preventDefault();
                    var cusMargin = 0;
                    if (!$("#feature-inner").hasClass("nevigated")) {
                        $("#feature-inner").addClass("nevigated");
                        cusMargin = 97;
                    }

                    $(window).scrollTop($('#feature').offset().top - $('.navbar-fixed-top').height() - cusMargin)
                });
                $('.about').on('click', function (e) {
                    e.preventDefault();
                    $(window).scrollTop($('#about').offset().top - $('.navbar-fixed-top').height() - 20)
                });
                $('.faq').on('click', function (e) {
                    e.preventDefault();
                    $(window).scrollTop($('#faq').offset().top - $('.navbar-fixed-top').height())
                });
            });
            $(document).ready(function () {
                $(window).scroll(function () {
                    if (isScrolledIntoView($(".tokensale-wraper"))) {
                        if (!$(".tokensale-wraper .progress-bar-style .progress-bar").hasClass("token-sale-progressbar"))
                            $(".tokensale-wraper .progress-bar-style .progress-bar").addClass("token-sale-progressbar");
                        $(".tokensale-wraper .chart-left-txt, .tokensale-wraper .chart-right-txt, .tokensale-wraper .chart-bottom-txt").show();
                        $("#tokensale .light").css("display", "block");
                    } else {
                        if ($(".tokensale-wraper .progress-bar-style .progress-bar").hasClass("token-sale-progressbar"))
                            $(".tokensale-wraper .progress-bar-style .progress-bar").removeClass("token-sale-progressbar");
                        $(".tokensale-wraper .chart-left-txt, .tokensale-wraper .chart-right-txt, .tokensale-wraper .chart-bottom-txt").hide();
                        $("#tokensale .light").css("display", "none");
                    }
                });
            });
            function isScrolledIntoView(elem) {
                var docViewTop = $(window).scrollTop();
                var docViewBottom = docViewTop + $(window).height();

                var elemTop = $(elem).offset().top;
                var elemBottom = elemTop + $(elem).height();

                return (docViewBottom >= elemTop && docViewTop <= elemBottom);
            }



        </script>
    </body>
</html>