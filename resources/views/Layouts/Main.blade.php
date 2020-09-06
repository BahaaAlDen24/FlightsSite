<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.gridgum.com/templates/Travel-agency/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Sep 2020 08:47:13 GMT -->
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Travel Agency Bootstrap responsive template (theme)</title>
    <link rel="canonical" href="index-2.html" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">


    <link href="{{asset('assets/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/select2.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/smoothness/jquery-ui-1.10.0.custom.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('assets/js/superfish.js')}}"></script>

    <script src="{{asset('assets/js/select2.js')}}"></script>

    <script src="{{asset('assets/js/jquery.parallax-1.1.3.resize.js')}}"></script>

    <script src="{{asset('assets/js/SmoothScroll.js')}}"></script>

    <script src="{{asset('assets/js/jquery.appear.js')}}"></script>

    <script src="{{asset('assets/js/jquery.caroufredsel.js')}}"></script>
    <script src="{{asset('assets/js/jquery.touchSwipe.min.j')}}s"></script>

    <script src="{{asset('assets/js/jquery.ui.totop.js')}}"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="front">

<div id="main">

    <div class="top1_wrapper">
        <div class="container">
            <div class="top1 clearfix">
                <div class="email1"><a href="#">support@travelagency.com</a></div>
                <div class="phone1">+917 3386831</div>
                <div class="social_wrapper">
                    <ul class="social clearfix">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                    </ul>
                </div>
                <div class="lang1">
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">English<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a class="ge" href="#">German</a></li>
                            <li><a class="ru" href="#">Russian</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="top2_wrapper">
        <div class="container">
            <div class="top2 clearfix">
                <header>
                    <div class="logo_wrapper">
                        <a href="{{asset('assets/index-2.html')}}" class="logo">
                            <img src="{{asset('assets/images/logo.png')}}" alt="" class="img-responsive">
                        </a>
                    </div>
                </header>
                <div class="navbar navbar_ navbar-default">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-collapse navbar-collapse_ collapse">
                        <ul class="nav navbar-nav sf-menu clearfix">
                            <li class="sub-menu sub-menu-1 active"><a href="#">Home<em></em></a>
                                <ul>
                                    <li><a href="{{asset('assets/index-2.html')}}">Home Version 1</a></li>
                                    <li><a href="{{asset('assets/index-3.html')}}">Home Version 2 (slideshow)</a></li>
                                    <li><a href="{{asset('assets/index-1.html')}}">Home Version 3 (video)</a></li>
                                </ul>
                            </li>
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li class="sub-menu sub-menu-1"><a href="#">Pages<em></em></a>
                                <ul>
                                    <li><a href="flights.html">Flights</a>
                                        <ul>
                                            <li><a href="search-flights.html">Search Flights</a></li>
                                            <li><a href="booking-flights.html">Booking Flights</a></li>
                                            <li><a href="booking-flights-page.html">Flights Checkout</a></li>
                                        </ul>
                                    </li>


                                    <li><a href="hotels.html">Hotels</a>
                                        <ul>
                                            <li><a href="search-hotel.html">Search Hotels</a></li>
                                            <li><a href="booking-hotel.html">Booking Hotel</a></li>
                                            <li><a href="booking-hotel-page.html">Hotel Reservation</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="cars.html">Rent a Car</a>
                                        <ul>
                                            <li><a href="search-cars.html">Search Cars</a></li>
                                            <li><a href="booking-cars.html">Booking Car</a></li>
                                            <li><a href="booking-cars-page.html">Car Reservation</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="cruises.html">Cruises</a>
                                        <ul>
                                            <li><a href="search-cruise.html">Search Cruise</a></li>
                                            <li><a href="booking-cruise.html">Booking Cruise</a></li>
                                            <li><a href="booking-cruise-page.html">Cruise Checkout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="sub-menu sub-menu-1"><a href="#">Blog<em></em></a>
                                <ul>
                                    <li><a href="blog.html">Right Blog</a></li>
                                    <li><a href="left-blog.html">Left Blog</a></li>
                                    <li><a href="post.html">Right Post</a></li>
                                    <li><a href="left-post.html">Left Post</a></li>
                                    <li><a href="full-post.html">Full Post</a></li>
                                </ul>
                            </li>
                            <li><a href="contacts.html">Contacts</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('Content')

    <div class="bot1_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="logo2_wrapper">
                        <a href="index-2.html" class="logo2">
                            <img src="{{asset('assets/images/logo2.png')}}" alt="" class="img-responsive">
                        </a>
                    </div>
                    <p>
                        Nam liber tempor cum soluta nobis option congue nihil imperdiet doming id quod mazim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna.
                    </p>
                    <p>
                        <a href="#" class="btn-default btn2">Read More</a>
                    </p>
                </div>
                <div class="col-sm-3">
                    <div class="bot1_title">Travel Specialists</div>
                    <ul class="ul1">
                        <li><a href="#">First Class Flights</a></li>
                        <li><a href="#">Accessible Travel</a></li>
                        <li><a href="#">Amazing Cruises</a></li>
                    </ul>

                    <div class="social2_wrapper">
                        <ul class="social2 clearfix">
                            <li class="nav1"><a href="#"></a></li>
                            <li class="nav2"><a href="#"></a></li>
                            <li class="nav3"><a href="#"></a></li>
                            <li class="nav4"><a href="#"></a></li>
                            <li class="nav5"><a href="#"></a></li>
                            <li class="nav6"><a href="#"></a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-sm-3">
                    <div class="bot1_title">Our Twitter</div>
                    <div class="twits1">
                        <div class="twit1">
                            <a href="#"> @travel</a> Lorem ipsum dolor sit amet, consectetuer adipiscing elit
                            <div class="date">5 minutes ago</div>
                        </div>
                        <div class="twit1">
                            <a href="#">@leo</a> Nam liber tempor cum soluta nobis option congue nihil imperdiet doming id quod mazim.
                            <div class="date">2 days ago</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="bot1_title">Newsletter</div>
                    <div class="newsletter_block">
                        <div class="txt1">Inspiration, ideas, news and your feedback.</div>
                        <div class="newsletter-wrapper clearfix">
                            <form class="newsletter" action="javascript:;">
                                <input type="text" name="s" value='Email Address' onBlur="if(this.value=='') this.value='Email Address'" onFocus="if(this.value =='Email Address' ) this.value=''">
                                <a href="#" class="btn-default btn3">SUBMIT</a>
                            </form>
                        </div>
                    </div>
                    <div class="phone2">1-917-338-6831</div>
                    <div class="support1"><a href="#">support@templates-support.com</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="bot2_wrapper">
        <div class="container">
            <div class="left_side">
                Copyright © 2017 <a href="#" target="_blank"><strong>MECOVACHE</strong></a>   <span>|</span>   <a href="#">Privacy Policy</a>   <span>|</span>   <a href="#">About Us</a>   <span>|</span>   <a href="#">FAQ</a>   <span>|</span>   <a href="#">Contact Support</a>
            </div>
            <div class="right_side">Designed by <a href="#" target="_blank"><strong>MECOVACHE</strong></a></div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
@yield('pageJS')
</body>

</html>
