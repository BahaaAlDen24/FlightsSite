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
    <link href="{{asset('assets/css/smoothness/jquery-ui-1.10.0.custom.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/AdminPanel/global/plugins/select2/select2.css')}}" rel="stylesheet" type="text/css"/>

    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('assets/js/superfish.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminPanel/global/plugins/bootstrap-toastr/toastr.min.css')}}"/>

    <link href="{{asset('assets/AdminPanel/admin/pages/css/timeline.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/AdminPanel/global/css/components-rounded.css')}}" id="style_components" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/AdminPanel/global/css/plugins.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/AdminPanel/admin/layout3/css/layout.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/AdminPanel/admin/layout3/css/themes/default.css')}}" rel="stylesheet" type="text/css" id="style_color">
    <link href="{{asset('assets/AdminPanel/admin/layout3/css/custom.css')}}" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminPanel/global/plugins/clockface/css/clockface.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminPanel/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminPanel/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminPanel/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}"/>

    <script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/select2/select2.min.js')}}"></script>

    <script src="{{asset('assets/js/jquery.parallax-1.1.3.resize.js')}}"></script>

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
                            <li><a href="{{ route('Home') }}"  class="active">Home</a></li>
                            <li class="sub-menu sub-menu-1"><a href="#">Places<em></em></a>
                                <ul>
                                    <li><a href="{{ route('CountriesIndex') }}">Countries</a></li>
                                    <li><a href="{{ route('CitiesIndex') }}">Cities</a></li>
                                    <li><a href="{{ route('HotelsIndex') }}">Hotels</a></li>
                                    <li><a href="{{ route('AirportsIndex') }}">Airports</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('AirlinesIndex') }}">Airlines</a></li>
                            <li><a href="{{ route('AirplanesIndex') }}">Airplanes</a></li>
                            <li><a href="{{ route('OffersIndex') }}">Offers</a></li>
                            <li class="sub-menu sub-menu-1"><a href="#">User Setting<em></em></a>
                                <ul id="UserSettingUl">
                                    <li><a href="{{ route('login') }}">Log In</a></li>
                                    <li><a href="{{ route('Register') }}">Register</a></li>
                                </ul>
                            </li>
                            <li><a href="contacts.html">Contact us</a></li>
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
</div>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/AdminPanel/global/plugins/jquery.cokie.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/clockface/js/clockface.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/bootstrap-daterangepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('assets/AdminPanel/admin/pages/scripts/components-pickers.js')}}"></script>
<script src="{{asset('assets/AdminPanel/global/scripts/metronic.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/AdminPanel/admin/layout3/scripts/layout.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/AdminPanel/admin/layout3/scripts/demo.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/AdminPanel/admin/pages/scripts/form-samples.js')}}"></script>
<script src="{{asset('assets/AdminPanel/admin/pages/scripts/timeline.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/AdminPanel/global/plugins/bootstrap-toastr/toastr.min.js')}}"></script>
<script src="{{asset('assets/AdminPanel/admin/pages/scripts/ui-toastr.js')}}"></script>
@yield('pageJS')
</body>
<script>
    jQuery(document).ready(function() {
        debugger
        if ( {!! json_encode($IsLoggedIn) !!} ){
            $("#UserSettingUl").empty() ;
            var LoggedUserElements = "<li><a href=\"{{ route('UserBookedFlights') }}\">Booked Flights</a></li>\n" +
                "                                    <li><a href=\"{{ route('UserCanceledFlights') }}\">Canceled Flights</a></li>\n" +
                "                                    <li><a href=\"{{ route('login') }}\">Profile</a></li>\n" +
                "                                    <li><a href=\"{{ route('logout') }}\">Log Out</a></li>" ;
            $("#UserSettingUl").append(LoggedUserElements) ;
        }
        Metronic.init(); // init metronic core components
        Layout.init(); // init current layout
        Demo.init(); // init demo features
        FormSamples.init();
        ComponentsPickers.init();
        UIToastr.init();
        Timeline.init(); // init timeline page
    });
</script>
</html>
