@extends('Layouts\Main')

@section('Content')
    <section class=>
        <div id="slider_wrapper">
            <div class="container">
                <div id="slider_inner">
                    <div class="">
                        <div id="slider">
                            <div class="">
                                <div class="carousel-box">
                                    <div class="inner">
                                        <div class="carousel main">
                                            <ul>
                                                <li>
                                                    <div class="slider">
                                                        <div class="slider_inner">
                                                            <div class="txt1"><span>Welcome To Our</span></div>
                                                            <div class="txt2"><span>TRAVEL AGENCY</span></div>
                                                            <div class="txt3"><span>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod.</span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="slider">
                                                        <div class="slider_inner">
                                                            <div class="txt1"><span>7 - Day Tour</span></div>
                                                            <div class="txt2"><span>AMAZING CARIBBEAN</span></div>
                                                            <div class="txt3"><span>Lorem ipsum dolor eleifend option congue nihil imperdiet doming id quod.</span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="slider">
                                                        <div class="slider_inner">
                                                            <div class="txt1"><span>5 Days In</span></div>
                                                            <div class="txt2"><span>PARIS (Capital Of World)</span></div>
                                                            <div class="txt3"><span>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod.</span></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="slider">
                                                        <div class="slider_inner">
                                                            <div class="txt1"><span>12 - Day Cruises</span></div>
                                                            <div class="txt2"><span>FROM GREECE TO SPAIN</span></div>
                                                            <div class="txt3"><span>MEDITERRANEAN - 12 - Day Cruises By "GRAND VICTORIA III" Cruise Liner.</span></div>

                                                        </div>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider_pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="front_tabs">
            <div class="container">
                <div class="tabs_wrapper tabs1_wrapper">
                    <div class="tabs tabs1">
                        <div class="tabs_tabs tabs1_tabs">
                            <div class="row">
                                <ul><li class="active flights"><a href="#tabs-1">Flights</a></li></ul>
                            </div>
                        </div>
                        <div class="tabs_content tabs1_content">
                            <div id="tabs-1">
                                <div class="row">
                                    <form action="#"  id="SearchForm" name="SearchForm" class="form1 col-sm-4 col-md-12" style="float: left">
                                        <div class="row">
                                            <div class="col-sm-4 col-md-3">
                                                <div class="">
                                                    <label>Flying From :</label>
                                                    <div class="">
                                                        <select class="select2_category form-control" id="CITYFROM" name="CITYFROM">
                                                            <option value="">Select...</option>
                                                            @if (isset($Cities))
                                                                @foreach ($Cities as $City)
                                                                    <option value="{{$City->id}}">{{$City->ENAME}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-3">
                                                <div class="">
                                                    <label>To:</label>
                                                    <div class="">
                                                        <select class="select2_category form-control" id="CITYTO" name="CITYTO">
                                                            <option value="">Select...</option>
                                                            @if (isset($Cities))
                                                                @foreach ($Cities as $City)
                                                                    <option value="{{$City->id}}">{{$City->ENAME}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-2">
                                                <div class="input1_wrapper">
                                                    <label>Departing:</label>
                                                    <div class="input-group date form_meridian_datetime" data-date="2012-12-21T15:25:00Z">
                                                        <input type="text" size="16" class="form-control" name="DEPATURETIME" id="DEPATURETIME">
                                                        <span class="input-group-btn">
                                                                <button class="btn default date-set" type="button"><i class="fa fa-calendar"></i></button>
												            </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-2">
                                                <div class="">
                                                    <label>Flight Type:</label>
                                                    <div class="">
                                                        <select class="select2_category form-control" id="Type" name="Type">
                                                            <option value="">Select...</option>
                                                            @if (isset($FlightTypes))
                                                                @foreach ($FlightTypes as $FlightType)
                                                                    <option value="{{$FlightType->id}}">{{$FlightType->ENAME}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-1">
                                                <div class="">
                                                    <label>Adult:</label>
                                                    <div class="">
                                                        <select class="select2_category form-control">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-1">
                                                <div style="margin-top: 23px;">
                                                    <button id="SearchBtn" class="btn green-haze btn-circle-left"><i class="fa fa-search"></i> Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="why1">
            <div class="container">

                <h2 class="animated" data-animation="fadeInUp" data-animation-delay="100">WHY WE ARE THE BEST</h2>

                <div class="title1 animated" data-animation="fadeInUp" data-animation-delay="200">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod <br>tincidunt ut laoreet dolore magna aliquam erat volutpat.</div>


                <div id="SearchResultFlights">

                </div>
            </div>

        </div>

        <div class="modal fade" id="Loading" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <img src="{{asset('assets/AdminPanel/global/img/loading-spinner-grey.gif')}}" alt="" class="loading">
                        <span>&nbsp;&nbsp;Loading... </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="ItemInfo" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">View</h4>
                    </div>
                    <div class="modal-body">
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="portlet light">
                            <div class="portlet-body">
                                <div class="timeline">
                                    <!-- TIMELINE ITEM -->
                                    <div class="timeline-item">
                                        <div class="timeline-badge">
                                            <img class="timeline-badge-userpic" src="{{asset('assets/AdminPanel/admin/pages/media/pages/Flight.jpg')}}">
                                        </div>
                                        <div class="timeline-body">
                                            <div class="timeline-body-arrow">
                                            </div>
                                            <div class="timeline-body-head">
                                                <div class="timeline-body-head-caption">
                                                    <a href="javascript:;" class="timeline-body-title font-blue-madison">Flight Information</a>
                                                </div>
                                            </div>
                                            <div class="timeline-body-content">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-body">
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Airport From :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="Flight_From"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Airport To :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="Flight_To"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Departure Time :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="Flight_Departure"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Arrival Time :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="Flight_Arrival"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Airline Company :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="Flight_Airline"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Airplane Company :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="Flight_Airplane"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Flight Type :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="Flight_Type"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Price :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static price" id="Flight_Price"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END TIMELINE ITEM -->
                                    <!-- TIMELINE ITEM -->
                                    <div class="timeline-item">
                                        <div class="timeline-badge">
                                            <img class="timeline-badge-userpic" src="{{asset('assets/AdminPanel/admin/pages/media/pages/Offer.jpg')}}">
                                        </div>
                                        <div class="timeline-body">
                                            <div class="timeline-body-arrow">
                                            </div>
                                            <div class="timeline-body-head">
                                                <div class="timeline-body-head-caption">
                                                    <span class="timeline-body-alerttitle font-red-intense">Offers Information</span>
                                                </div>
                                            </div>
                                            <div class="timeline-body-content" id="Offers_Information_Body">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-body">
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Offer Name :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="Offer_Name"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Offer Discount rate :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="Offer_DiscountRate"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <!--/span-->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Price After Discount :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static price" id="Price_After_DiscountRate"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END TIMELINE ITEM -->
                                </div>
                            </div>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="BookFlightDetails" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">View</h4>
                    </div>
                    <div class="modal-body">
                        <!-- BEGIN PAGE CONTENT INNER -->
                        <div class="portlet light">
                            <div class="portlet-body">
                                <div class="timeline">
                                    <!-- TIMELINE ITEM -->
                                    <div class="timeline-item">
                                        <div class="timeline-badge">
                                            <img class="timeline-badge-userpic" src="{{asset('assets/AdminPanel/admin/pages/media/pages/Flight.jpg')}}">
                                        </div>
                                        <div class="timeline-body">
                                            <div class="timeline-body-arrow">
                                            </div>
                                            <div class="timeline-body-head">
                                                <div class="timeline-body-head-caption">
                                                    <a href="javascript:;" class="timeline-body-title font-blue-madison">Flight Information</a>
                                                </div>
                                            </div>
                                            <div class="timeline-body-content">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-body">
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Airport From :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="BookFlight_From"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Airport To :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="BookFlight_To"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Departure Time :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="BookFlight_Departure"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Arrival Time :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="BookFlight_Arrival"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Airline Company :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="BookFlight_Airline"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Airplane Company :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="BookFlight_Airplane"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Flight Type :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="BookFlight_Type"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Price :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="BookFlight_Price"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END TIMELINE ITEM -->
                                    <!-- TIMELINE ITEM -->
                                    <div class="timeline-item">
                                        <div class="timeline-badge">
                                            <div class="timeline-icon">
                                                <i class="icon-user-following font-green-haze"></i>
                                            </div>
                                        </div>
                                        <div class="timeline-body">
                                            <div class="timeline-body-arrow">
                                            </div>
                                            <div class="timeline-body-head">
                                                <div class="timeline-body-head-caption">
                                                    <span class="timeline-body-alerttitle font-red-intense">User Information</span>
                                                </div>
                                            </div>
                                            <div class="timeline-body-content">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-body">
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">User Name :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="BookUser_Name"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">User Email :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="BookUser_Email"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Bank Name :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="BookUser_Bank"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">User Funds :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="BookUser_Funds"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END TIMELINE ITEM -->
                                    <!-- TIMELINE ITEM -->
                                    <div class="timeline-item">
                                        <div class="timeline-badge">
                                            <img class="timeline-badge-userpic" src="{{asset('assets/AdminPanel/admin/pages/media/pages/Offer.jpg')}}">
                                        </div>
                                        <div class="timeline-body">
                                            <div class="timeline-body-arrow">
                                            </div>
                                            <div class="timeline-body-head">
                                                <div class="timeline-body-head-caption">
                                                    <span class="timeline-body-alerttitle font-red-intense">Offers Information</span>
                                                </div>
                                            </div>
                                            <div class="timeline-body-content" id="Offers_Information_Body">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-body">
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Offer Name :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="BookOffer_Name"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Offer Discount rate :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static" id="BookOffer_DiscountRate"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <!--/span-->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-5">Price After Discount :</label>
                                                                    <div class="col-md-7">
                                                                        <p class="form-control-static price" id="BookPrice_After_DiscountRate"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END TIMELINE ITEM -->
                                </div>
                                <label id="BookedFlightWarringMessage" class="warning label-danger"></label>
                            </div>
                        </div>
                        <!-- END PAGE CONTENT INNER -->
                    </div>
                    <div class="modal-footer" id="BookFlightFooter">

                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </section>
@endsection

@section('pageJS')
    <script type="text/javascript">
        debugger
        var IsLoggedIn = {!! json_encode($IsLoggedIn) !!}
        $(function () {
            debugger

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('#SearchBtn').click(function (e) {
            e.preventDefault();
            $('#Loading').modal('show');
            $('#SearchResultFlights').empty() ;
            debugger
            $.ajax({
                data: $('#SearchForm').serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/Search' ,
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    debugger
                    var i ;
                    for (i = 0 ; i < data.length ; i++ ){
                    var SRC = '{{asset('assets/DownloadedFiles/Airlines/')}}/' + data[i].AIRLINEID + '/IMGSRC1.jpg' ;
                    var offerString = "" ;
                    var DisplayNone = ""
                    if (data[i].OfferName != null){
                        offerString = " , Discount : " + data[i].OfferDISCOUNTRATE + "%" ;
                    }

                    if(!IsLoggedIn){
                        DisplayNone = "display: none;" ;
                    }

                    var NewFlight = ' <div class="row">\n' +
                        '                    <div class="col-sm-12">\n' +
                        '                        <div class="thumb4">\n' +
                        '                            <div class="thumbnail clearfix">\n' +
                        '                                <div class="row">\n' +
                        '                                    <div class="col-sm-4">\n' +
                        '                                        <figure>\n' +
                        '                                            <img src="'+ SRC +'" alt="" class="img-responsive" style="margin:50px;">\n' +
                        '                                        </figure>\n' +
                        '                                    </div>\n' +
                        '                                    <div class="col-sm-8">\n' +
                        '                                        <div class="caption" style="margin-top: 50px;">\n' +
                        '                                            <div class="row">\n' +
                        '                                                <div class="col-sm-6"><div class="txt1">'+ data[i].FromName + ' - '+ data[i].ToName +'</div></div>\n' +
                        '                                                <div class="col-sm-6"><div class="txt1">'+ data[i].CityFromName + ' - '+ data[i].CityToName +'</div></div>\n' +
                        '                                            </div>\n' +
                        '                                            <div class="row">\n' +
                        '                                                <div class="col-sm-6"><div class="txt1">Departure :'+ data[i].DEPATURETIME +'</div></div>\n' +
                        '                                                <div class="col-sm-6"><div class="txt1">Arrival   :'+ data[i].ARRIVALTIME +'</div></div>\n' +
                        '                                            </div>\n' +
                        '                                            <div class="row">\n' +
                        '                                                <div class="col-sm-6"><div class="txt1">Airline : '+ data[i].AirlineName +'</div></div>\n' +
                        '                                                <div class="col-sm-6"><div class="txt1">Airplane : '+ data[i].AirplaneName +'</div></div>\n' +
                        '                                            </div>\n' +
                        '                                            <div class="txt3 clearfix">\n' +
                        '                                                <div class="left_side">\n' +
                        '                                                    <div class="price">$'+ data[i].PRICE +'.00 ' + offerString + '</div>\n' +
                        '                                                    <div class="nums">avg/person</div>\n' +
                        '                                                </div>\n' +
                        '                                                <div class="right_side" style="margin-right: 130px;">\n' +
                        '                                                    <a onclick="Details('+ data[i].id +');" class="btn-default btn1">Details</a>\n' +
                        '                                                </div>\n' +
                        '                                                <div class="right_side" style="margin-right: 10px; ' + DisplayNone +'">\n' +
                        '                                                    <a onclick="BookFlightDetails('+ data[i].id +');" class="btn-default btn1">Book Now</a>\n' +
                        '                                                </div>\n' +
                        '                                            </div>\n' +
                        '                                        </div>\n' +
                        '                                    </div>\n' +
                        '                                </div>\n' +
                        '                            </div>\n' +
                        '                        </div>\n' +
                        '                    </div>\n' +
                        '                </div>';

                        $('#SearchResultFlights').append(NewFlight);
                    }
                    $('#Loading').modal('hide');
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

        function Details(id){
            debugger
            $('#Loading').modal('show');

            $("#Flight_From").text('') ;
            $("#Flight_To").text('') ;
            $("#Flight_Departure").text('') ;
            $("#Flight_Arrival").text('') ;
            $("#Flight_Airline").text('') ;
            $("#Flight_Airplane").text('') ;
            $("#Flight_Type").text('') ;
            $("#Flight_Price").text('') ;

            $("#Offer_Name").text('') ;
            $("#Offer_DiscountRate").text('') ;
            $("#Price_After_DiscountRate").text('') ;

            $.get('/Details/' + id , function (data) {
                debugger
                var MyData = $.parseJSON(data);

                $("#Flight_From").text(MyData.FromName) ;
                $("#Flight_To").text(MyData.ToName) ;
                $("#Flight_Departure").text(MyData.DEPATURETIME) ;
                $("#Flight_Arrival").text(MyData.ARRIVALTIME) ;
                $("#Flight_Airline").text(MyData.AirlineName) ;
                $("#Flight_Airplane").text(MyData.AirplaneName) ;
                $("#Flight_Type").text(MyData.FlightTypeName) ;
                $("#Flight_Price").text(MyData.PRICE + " $") ;

                if (MyData.OfferName != null){
                    $("#Offer_Name").text(MyData.OfferName) ;
                    $("#Offer_DiscountRate").text(MyData.OfferDISCOUNTRATE + "%") ;
                    $("#Price_After_DiscountRate").text(MyData.OfferDISCOUNTRATE * MyData.PRICE / 100 + "$") ;
                }else{
                    $("#Offer_Name").text('there is no offers') ;
                    $("#Offer_DiscountRate").text('there is no offers') ;
                    $("#Price_After_DiscountRate").text('there is no offers') ;
                }

                $('#Loading').modal('hide');
                $('#ItemInfo').modal('show');

            })
        }

        function BookFlightDetails(id){
            debugger
            $('#Loading').modal('show');

            $("#BookFlight_From").text('') ;
            $("#BookFlight_To").text('') ;
            $("#BookFlight_Departure").text('') ;
            $("#BookFlight_Arrival").text('') ;
            $("#BookFlight_Airline").text('') ;
            $("#BookFlight_Airplane").text('') ;
            $("#BookFlight_Type").text('') ;
            $("#BookFlight_Price").text('') ;

            $("#BookUser_Name").text('') ;
            $("#BookUser_Email").text('') ;

            $("#BookOffer_Name").text('') ;
            $("#BookOffer_DiscountRate").text('') ;
            $("#BookPrice_After_DiscountRate").text('') ;

            $.get('/BookFlightDetails/' + id , function (data) {
                debugger
                var MyData = $.parseJSON(data);

                $("#BookFlight_From").text(MyData[0].FromName) ;
                $("#BookFlight_To").text(MyData[0].ToName) ;
                $("#BookFlight_Departure").text(MyData[0].DEPATURETIME) ;
                $("#BookFlight_Arrival").text(MyData[0].ARRIVALTIME) ;
                $("#BookFlight_Airline").text(MyData[0].AirlineName) ;
                $("#BookFlight_Airplane").text(MyData[0].AirplaneName) ;
                $("#BookFlight_Type").text(MyData[0].FlightTypeName) ;
                $("#BookFlight_Price").text(MyData[0].PRICE + " $") ;

                $("#BookUser_Name").text(MyData[1].User) ;
                $("#BookUser_Email").text(MyData[1].Email) ;
                $("#BookUser_Bank").text(MyData[1].Bank) ;
                $("#BookUser_Funds").text(MyData[1].FUNDS + '$') ;

                if (MyData[0].OfferName != null){
                    $("#BookOffer_Name").text(MyData[0].OfferName) ;
                    $("#BookOffer_DiscountRate").text(MyData[0].OfferDISCOUNTRATE + "%") ;
                    $("#BookPrice_After_DiscountRate").text(MyData[0].OfferDISCOUNTRATE * MyData[0].PRICE / 100 + "$") ;
                }else{
                    $("#BookOffer_Name").text('there is no offers') ;
                    $("#BookOffer_DiscountRate").text('there is no offers') ;
                    $("#BookPrice_After_DiscountRate").text('there is no offers') ;
                }
                debugger
                $('#BookFlightFooter').empty() ;
                if ( (MyData[1].Bank != null) && (MyData[1].FUNDS > MyData[0].PRICE ) ){
                    $('#BookFlightFooter').append('<button onclick="BookFlight('+ MyData[0].id +','+ MyData[1].AccountID +');" class="btn default">Book Now !!</button> <button type="button" class="btn default" data-dismiss="modal">Close</button>') ;
                }else {
                    $('#BookFlightFooter').append('<button type="button" class="btn default" data-dismiss="modal">Close</button>')
                    $('#BookedFlightWarringMessage').html("Sorry You cant book this flight , you dont have bank account or your funds dosent enough !!");
                }

                $('#Loading').modal('hide');
                $('#BookFlightDetails').modal('show');

            })
        }

        function BookFlight(FlightID,BankAccountID){
            $('#Loading').modal('show');
            $('#BookFlightDetails').modal('hide');
            $.get('/BookFlight/' + FlightID + '/' + BankAccountID, function (data) {
                $('#Loading').modal('hide');
                toastr.success("Operation has been done successfully", "Flight Booked successfully");
            });
        }

        jQuery(document).ready(function() {

        });
    </script>
@endsection
