@extends('Layouts\AdminPanel')

@section('PageCSS')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminPanel/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminPanel/global/plugins/bootstrap-toastr/toastr.min.css')}}"/>
    <link href="{{asset('assets/AdminPanel/admin/pages/css/news.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/AdminPanel/admin/pages/css/blog.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminPanel/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminPanel/global/plugins/clockface/css/clockface.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminPanel/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminPanel/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminPanel/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}"/>
    <!-- End PAGE LEVEL STYLES -->
@endsection

@section('Content')
    <div class="container">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        Widget settings form goes here
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn blue">Save changes</button>
                        <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <!-- BEGIN PAGE BREADCRUMB -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="{{route('Admin')}}">Home</a><i class="fa fa-circle"></i>
            </li>
            <li class="active">
                Flights
            </li>
        </ul>
        <!-- END PAGE BREADCRUMB -->
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-cogs font-green-sharp"></i>
                            <span class="caption-subject font-green-sharp bold uppercase">Flights Table</span>
                        </div>
                        <div class="actions btn-set">
                            <button id="btnNew" class="btn green-haze btn-circle"><i class="fa fa-check"></i> Add</button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th>From</th>
                                <th>To</th>
                                <th>Departure</th>
                                <th>Arrival</th>
                                <th>Type</th>
                                <th>Airline</th>
                                <th>Airplane</th>
                                <th>Total Seat</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($Objects))
                                @foreach ($Objects as $Object)
                                    <tr id="{{"tr" . $Object->id}}" class="odd gradeX">
                                        <td id="{{"FROM" . $Object->id}}">{{$Object->FromName}}</td>
                                        <td id="{{"TO" . $Object->id}}">{{$Object->ToName}}</td>
                                        <td id="{{"DepartureDate" . $Object->id}}">{{$Object->DEPATURETIME}}</td>
                                        <td id="{{"ArriveDate" . $Object->id}}">{{$Object->ARRIVALTIME}}</td>
                                        <td id="{{"Type" . $Object->id}}">{{$Object->FlightTypeName}}</td>
                                        <td id="{{"Airline" . $Object->id}}">{{$Object->AirlineName}}</td>
                                        <td id="{{"Airplane" . $Object->id}}">{{$Object->AirplaneName}}</td>
                                        <td id="{{"TotalSeat" . $Object->id}}">{{$Object->TOTALSEATNUMBER}}</td>
                                        <td id="{{"PRICE" . $Object->id}}">{{$Object->PRICE}} $</td>
                                        <td>
                                            <a onclick='Update({{$Object->id}})'><span class="label label-circle label-primary"><i class="fa fa-check-circle"></i> Update</span></a>
                                            <a onclick='Delete({{$Object->id}})'><span class="label label-circle label-danger"><i class="fa fa-check-circle"></i> Delete</span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
                <div id="CreateNew" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-full" style="overflow-y: initial !important;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-cogs font-green-sharp"></i>
                                        <span id="ModalTitle" class="caption-subject font-green-sharp bold uppercase">Horizontal Form</span>
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse">
                                        </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config">
                                        </a>
                                        <a href="javascript:;" class="reload">
                                        </a>
                                        <a href="javascript:;" class="remove">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body" style="height:550px; overflow-y: auto;">
                                <!-- BEGIN FORM-->
                                <form method="post" enctype="multipart/form-data" id="ObjectsForm" name="ObjectsForm" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group" style="display: none;">
                                            <label class="control-label col-md-4">ID<span class="required">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text"  id="HtmlId" name="HtmlId" data-required="1" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">From</label>
                                                    <div class="col-md-9">
                                                        <select class="select2_category form-control" data-placeholder="Choose a Category" tabindex="1" name="FROMID" id="FROMID">
                                                            <option value="">Select...</option>
                                                            @if (isset($Airports))
                                                                @foreach ($Airports as $Airport)
                                                                    <option value="{{$Airport->id}}">{{$Airport->ENAME}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">To</label>
                                                    <div class="col-md-9">
                                                        <select class="select2_category form-control" data-placeholder="Choose a Category" tabindex="1" name="TOID" id="TOID">
                                                            <option value="">Select...</option>
                                                            @if (isset($Airports))
                                                                @foreach ($Airports as $Airport)
                                                                    <option value="{{$Airport->id}}">{{$Airport->ENAME}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Departure</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group date form_meridian_datetime" data-date="2012-12-21T15:25:00Z">
                                                            <input type="text" size="16" class="form-control" name="DEPATURETIME" id="DEPATURETIME">
                                                            <span class="input-group-btn">
                                                                <button class="btn default date-set" type="button"><i class="fa fa-calendar"></i></button>
												            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Arrival</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group date form_meridian_datetime" data-date="2012-12-21T15:25:00Z">
                                                            <input type="text" size="16" class="form-control" name="ARRIVALTIME" id="ARRIVALTIME">
                                                            <span class="input-group-btn">
                                                                <button class="btn default date-reset" type="button"><i class="fa fa-times"></i></button>
                                                                <button class="btn default date-set" type="button"><i class="fa fa-calendar"></i></button>
												            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Airline</label>
                                                    <div class="col-md-9">
                                                        <select class="select2_category form-control" data-placeholder="Choose a Category" tabindex="1" name="AIRLINEID" id="AIRLINEID">
                                                            <option value="">Select...</option>
                                                            @if (isset($Airlines))
                                                                @foreach ($Airlines as $Airline)
                                                                    <option value="{{$Airline->id}}">{{$Airline->ENAME}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Airplane</label>
                                                    <div class="col-md-9">
                                                        <select class="select2_category form-control" data-placeholder="Choose a Category" tabindex="1" name="AIRPLANEID" id="AIRPLANEID">
                                                            <option value="">Select...</option>
                                                            @if (isset($Airplanes))
                                                                @foreach ($Airplanes as $Airplane)
                                                                    <option value="{{$Airplane->id}}">{{$Airplane->ENAME}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Type</label>
                                                    <div class="col-md-9">
                                                        <select class="select2_category form-control" data-placeholder="Choose a Category" tabindex="1" name="FLIGHTTYPEID" id="FLIGHTTYPEID">
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

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Offers</label>
                                                    <div class="col-md-9">
                                                        <select class="select2_category form-control" data-placeholder="Choose a Category" tabindex="1" name="OFFERID" id="OFFERID">
                                                            <option value="">Select...</option>
                                                            @if (isset($Offers))
                                                                @foreach ($Offers as $Offer)
                                                                    <option value="{{$Offer->id}}">{{$Offer->ENAME}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label col-md-1"  style="width: 7.333333% !important;  padding-left: 0px!important;">Description</label>
                                                    <div class="col-md-11" style="    padding-left: 0px!important; padding-right: 0px!important;">
                                                        <textarea type="text" id="EDESCRIPTION" name="EDESCRIPTION" class="form-control"rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div clsss="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label col-md-6">Total Seats Number</label>
                                                    <div class="col-md-6">
                                                        <div class="input-inline">
                                                            <input id="TOTALSEATNUMBER"  name="TOTALSEATNUMBER"type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label col-md-6">Available Seats Number</label>
                                                    <div class="col-md-6">
                                                        <div class="input-inline">
                                                            <input id="AVAILABLESEATNUMBER"  name="AVAILABLESEATNUMBER"type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label col-md-4">Price</label>
                                                    <div class="col-md-8">
                                                        <div class="input-inline">
                                                            <input id="PRICE"  name="PRICE" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                <label class="control-label col-md-4">Image 1</label>
                                                <div class="col-md-8">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div id="thumbnail1" class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                                        </div>
                                                        <div>
                                                        <span class="btn default btn-file">
                                                        <span class="fileinput-new">
                                                        Select image </span>
                                                        <span class="fileinput-exists">
                                                        Change </span>
                                                        <input type="file" id="IMGSRC1" name="IMGSRC1">
                                                        </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                <label class="control-label col-md-4"> Image 2</label>
                                                <div class="col-md-8">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div  id="thumbnail2" class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                                        </div>
                                                        <div>
                                                        <span class="btn default btn-file">
                                                        <span class="fileinput-new">Select image </span>
                                                        <span class="fileinput-exists">Change </span>
                                                        <input type="file" id="IMGSRC2" name="IMGSRC2">
                                                        </span><a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                <label class="control-label col-md-4"> Image 3</label>
                                                <div class="col-md-8">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div id="thumbnail3" class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                                        </div>
                                                        <div>
                                                        <span class="btn default btn-file">
                                                        <span class="fileinput-new">
                                                        Select image </span>
                                                        <span class="fileinput-exists">
                                                        Change </span>
                                                        <input type="file" id="IMGSRC3" name="IMGSRC3">
                                                        </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group ">
                                                <label class="control-label col-md-4"> Image 4</label>
                                                <div class="col-md-8">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div id="thumbnail4" class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                                                        </div>
                                                        <div>
                                                        <span class="btn default btn-file">
                                                        <span class="fileinput-new">
                                                        Select image </span>
                                                        <span class="fileinput-exists">
                                                        Change </span>
                                                        <input type="file" id="IMGSRC4" name="IMGSRC4">
                                                        </span>
                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                                Remove </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="modal-footer">
                                            <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                            <button id="btnSave" type="submit" class="btn green">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                <!-- END FORM-->
                            </div>

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
                                        <div class="row">
                                            <div class="col-md-12 news-page blog-page">
                                                <div class="row">
                                                    <div class="col-md-9 blog-tag-data">
                                                        <div id="myCarousel" class="carousel image-carousel slide">
                                                            <div class="carousel-inner">
                                                                <div class="active item">
                                                                    <img id="Img1" src="{{asset('assets/DownloadedFiles/Flight/37/') . "/IMGSRC1.jpg"}}" class="img-responsive" alt="">
                                                                </div>
                                                                <div class="item">
                                                                    <img id="Img2" src="{{asset('assets/DownloadedFiles/Flight/37/') . "/IMGSRC1.jpg"}}" class="img-responsive" alt="">
                                                                </div>
                                                                <div class="item">
                                                                    <img id="Img3" src="{{asset('assets/DownloadedFiles/Flight/37/') . "/IMGSRC1.jpg"}}" class="img-responsive" alt="">
                                                                </div>
                                                                <div class="item">
                                                                    <img id="Img4" src="{{asset('assets/DownloadedFiles/Flight/37/') . "/IMGSRC1.jpg"}}" class="img-responsive" alt="">
                                                                </div>
                                                            </div>
                                                            <!-- Carousel nav -->
                                                            <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                                                                <i class="m-icon-big-swapleft m-icon-white"></i>
                                                            </a>
                                                            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                                                                <i class="m-icon-big-swapright m-icon-white"></i>
                                                            </a>
                                                            <ol class="carousel-indicators">
                                                                <li data-target="#myCarousel" data-slide-to="0" class="active">
                                                                </li>
                                                                <li data-target="#myCarousel" data-slide-to="1">
                                                                </li>
                                                                <li data-target="#myCarousel" data-slide-to="2">
                                                                </li>
                                                                <li data-target="#myCarousel" data-slide-to="3">
                                                                </li>
                                                            </ol>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <ul class="list-inline blog-tags">
                                                                    <li>
                                                                        <i class="fa fa-tags"></i>
                                                                        <a href="javascript:;">
                                                                            Technology </a>
                                                                        <a href="javascript:;">
                                                                            Education </a>
                                                                        <a href="javascript:;">
                                                                            Internet </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-6 blog-tag-data-inner">
                                                                <ul class="list-inline">
                                                                    <li>
                                                                        <i class="fa fa-calendar"></i>
                                                                        <a href="javascript:;">
                                                                            April 16, 2013 </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="news-item-page">
                                                            <p id="ViewPageDesc"></p>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <h3 style="margin-top:0">News Feeds</h3>
                                                        <div class="top-news">
                                                            <a href="javascript:;" class="btn green"><span>Flight Name   </span><span id="ViewPageName"></span><i class="fa fa-music top-news-icon"></i></a>
                                                            <a href="javascript:;" class="btn yellow"><span>City   </span><span id="ViewPageCity"></span><i class="fa fa-book top-news-icon"></i></a>
                                                            <a href="javascript:;" class="btn red"><span>Created Date  </span><span id="ViewPageCreatedDate"></span><i class="fa fa-briefcase top-news-icon"></i></a>
                                                            <a href="javascript:;" class="btn blue"><span>Last Updated Date  </span><span id="ViewPageUpdatedDate"></span><i class="fa fa-globe top-news-icon"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT INNER -->
@endsection

@section('pageJS')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('assets/AdminPanel/admin/pages/scripts/table-managed.js')}}"></script>
    <script src="{{asset('assets/AdminPanel/global/plugins/bootstrap-toastr/toastr.min.js')}}"></script>
    <script src="{{asset('assets/AdminPanel/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/AdminPanel/admin/pages/scripts/components-form-tools.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script src="{{asset('assets/AdminPanel/admin/pages/scripts/ui-toastr.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/clockface/js/clockface.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/bootstrap-daterangepicker/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{asset('assets/AdminPanel/admin/pages/scripts/components-pickers.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}"></script>
    <script src="{{asset('assets/AdminPanel/admin/pages/scripts/form-samples.js')}}"></script>


    <script type="text/javascript">
        var Mode = "" ;

        function ClearDiv(){
            HtmlId.value = "" ;
            $("#FROMID").select2("val","");
            $("#TOID").select2("val","");
            $("#AIRPLANEID").select2("val","");
            $("#AIRLINEID").select2("val","");
            $("#FLIGHTTYPEID").select2("val","");
            ARRIVALTIME.value = "" ;
            DEPATURETIME.value = "" ;
            TOTALSEATNUMBER.value = "" ;
            AVAILABLESEATNUMBER.value = "" ;
            PRICE.value = "" ;
            EDESCRIPTION.value = "" ;

            $('#thumbnail1').empty() ;
            $('#thumbnail2').empty() ;
            $('#thumbnail3').empty() ;
            $('#thumbnail4').empty() ;
        }

        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#btnNew').click(function () {
                debugger
                Mode = "New" ;

                ClearDiv() ;

                $('#ModalTitle').html("New Item Form");
                $('#CreateNew').modal('show');
            });
        });

        $('#ObjectsForm').on('submit', function (event) {
            debugger
            event.preventDefault();
            var test = new FormData($(this)[0]) ;
            test.append('_method', 'PUT');
            if (Mode == "New") {
                $('#CreateNew').modal('hide');
                $('#Loading').modal('show');
                $.ajax({
                    url: "{{ route('Flight.store') }}",
                    method :"POST" ,
                    data: new FormData(this),
                    contentType: false ,
                    cache : false ,
                    processData: false,
                    success: function (data) {
                        debugger
                        var AirportFrom = $( "#FROMID option:selected" ).text() ;
                        var AirportTo = $( "#TOID option:selected" ).text() ;
                        var Airline = $( "#AIRLINEID option:selected" ).text() ;
                        var Airplane = $( "#AIRPLANEID option:selected" ).text() ;
                        var FlightType = $( "#FLIGHTTYPEID option:selected" ).text() ;
                        data = JSON.parse(data) ;
                        var City = $( "#CITYID option:selected" ).text() ;
                        var NewRow = '<tr id="tr' + data.id + '" class="odd gradeX">' +
                            '              <td id="FROM' + data.id + '">' + AirportFrom + '</td>' +
                            '              <td id="TO' + data.id + '">' + AirportTo + '</td>' +
                            '              <td id="DepartureDate' + data.id + '">' + data.DEPATURETIME + '</td>' +
                            '              <td id="ArriveDate' + data.id + '">' + data.ARRIVALTIME + '</td>' +
                            '              <td id="Type' + data.id + '">' + FlightType + '</td>' +
                            '              <td id="Airline' + data.id + '">' + Airline + '</td>' +
                            '              <td id="Airplane' + data.id + '">' + Airplane + '</td>' +
                            '              <td id="TotalSeat' + data.id + '">' + data.TOTALSEATNUMBER + '</td>' +
                            '              <td id="PRICE' + data.id + '">' + data.PRICE + ' $</td>' +
                            '              <td>\n' +
                            '                 <a onclick=\'Update(' + data.id +')\'><span class="label label-circle label-primary"><i class="fa fa-check-circle"></i> Update</span></a>\n' +
                            '                 <a onclick=\'Delete(' + data.id +')\'><span class="label label-circle label-danger"><i class="fa fa-check-circle"></i> Delete</span></a>\n' +
                            '             </td>' +
                            '          </tr>';
                        debugger

                        $('#sample_1').DataTable().destroy();
                        $("#sample_1").append(NewRow);
                        $('#sample_1').DataTable().draw();
                        $('#Loading').modal('hide');
                        toastr.success("Operation has been done successfully", "Added successfully");
                        //location.reload();
                    },
                    error: function (data) {
                        $('#Loading').modal('hide');
                        toastr.error("Error", "Something went Wrong");
                    }
                });
            }else if ( Mode == "Update"){
                $('#CreateNew').modal('hide');
                $('#Loading').modal('show');
                $.ajax({
                    url: "/Flight/" + HtmlId.value ,
                    method :"POST" ,
                    data: test,
                    contentType: false ,
                    cache : false ,
                    processData: false,
                    success: function (data) {
                        debugger
                        $('#CreateNew').modal('hide');
                        data = JSON.parse(data) ;
                        var AirportFrom = $( "#FROMID option:selected" ).text() ;
                        var AirportTo = $( "#TOID option:selected" ).text() ;
                        var Airline = $( "#AIRLINEID option:selected" ).text() ;
                        var Airplane = $( "#AIRPLANEID option:selected" ).text() ;
                        var FlightType = $( "#FLIGHTTYPEID option:selected" ).text() ;
                        $("#FROM"+ data.id).html(AirportFrom) ;
                        $("#TO"+ data.id).html(AirportTo) ;
                        $("#DepartureDate"+ data.id).html(data.DEPATURETIME) ;
                        $("#ArriveDate"+ data.id).html(data.ARRIVALTIME) ;
                        $("#Type"+ data.id).html(FlightType) ;
                        $("#Airline"+ data.id).html(Airline) ;
                        $("#Airplane"+ data.id).html(Airplane) ;
                        $("#TotalSeat"+ data.id).html(data.TOTALSEATNUMBER) ;
                        $("#PRICE"+ data.id).html(data.PRICE + '$') ;

                        $('#Loading').modal('hide');
                        toastr.success("Operation has been done successfully", "Updated successfully");
                    },
                    error: function (data) {
                        $('#Loading').modal('hide');
                        toastr.error("Error", "Something went Wrong");
                    }
                });
            }
        });
        function Update(id) {
            Mode = "Update" ;
            ClearDiv() ;
            $('#ModalTitle').html("Update Item Form");
            $('#Loading').modal('show');
            $.get('/Flight/' + id , function (data) {
                debugger
                var MyData = $.parseJSON(data);
                HtmlId.value = MyData.id
                $("#FROMID").select2("val",MyData.FROMID);
                $("#TOID").select2("val",MyData.TOID);
                $("#AIRPLANEID").select2("val",MyData.AIRPLANEID);
                $("#AIRLINEID").select2("val",MyData.AIRLINEID);
                $("#FLIGHTTYPEID").select2("val",MyData.FLIGHTTYPEID);
                ARRIVALTIME.value = MyData.ARRIVALTIME ;
                DEPATURETIME.value = MyData.DEPATURETIME ;
                TOTALSEATNUMBER.value = MyData.TOTALSEATNUMBER ;
                AVAILABLESEATNUMBER.value = MyData.AVAILABLESEATNUMBER ;
                PRICE.value = MyData.PRICE ;
                EDESCRIPTION.value = MyData.EDESCRIPTION ;

                $('#thumbnail1').append('<img src={{asset('assets/DownloadedFiles/Flight/')}}/' + id + '/IMGSRC1.jpg>') ;
                $('#thumbnail2').append('<img src={{asset('assets/DownloadedFiles/Flight/')}}/' + id + '/IMGSRC2.jpg>') ;
                $('#thumbnail3').append('<img src={{asset('assets/DownloadedFiles/Flight/')}}/' + id + '/IMGSRC3.jpg>') ;
                $('#thumbnail4').append('<img src={{asset('assets/DownloadedFiles/Flight/')}}/' + id + '/IMGSRC4.jpg>') ;

                $('#CreateNew').modal('show');
                $('#Loading').modal('hide');
            })
        }

        function Delete(id){
            $('#Loading').modal('show');
            $.ajax({
                url: '/Flight/' + id ,
                type: 'DELETE',
                success: function(data) {
                    debugger
                    $("#tr"+ id).remove() ;
                    $('#Loading').modal('hide');
                    toastr.error("Operation has been done successfully", "Deleted successfully");
                },
                error: function (data) {
                    $('#Loading').modal('hide');
                    toastr.error("Something went Wrong","Error");
                }
            });
        }
        function View(id){
            debugger
            $('#Loading').modal('show');
            $("#ViewPageDesc").text('') ;
            $("#ViewPageName").text('') ;
            $("#ViewPageCity").text('') ;
            $("#ViewPageCreatedDate").text('') ;
            $("#ViewPageUpdatedDate").text('') ;

            $.get('/Flight/' + id , function (data) {
                debugger
                var MyData = $.parseJSON(data);

                $("#ViewPageDesc").text(MyData.EDESCRIPTION) ;
                $("#ViewPageName").text(MyData.ENAME) ;
                $("#ViewPageCity").text(MyData.City) ;
                $("#ViewPageCreatedDate").text(MyData.CREATED_AT) ;
                $("#ViewPageUpdatedDate").text(MyData.UPDATED_AT) ;

                $("#Img1").attr('src','{{asset('assets/DownloadedFiles/Flight/')}}/' + id + '/IMGSRC1.jpg');
                $("#Img2").attr('src','{{asset('assets/DownloadedFiles/Flight/')}}/' + id + '/IMGSRC2.jpg');
                $("#Img3").attr('src','{{asset('assets/DownloadedFiles/Flight/')}}/' + id + '/IMGSRC3.jpg');
                $("#Img4").attr('src','{{asset('assets/DownloadedFiles/Flight/')}}/' + id + '/IMGSRC4.jpg');

                $('#Loading').modal('hide');
                $('#ItemInfo').modal('show');

            })
        }

        jQuery(document).ready(function() {
            TableManaged2.init();
            $('#sample_1').DataTable().destroy();
            $('#sample_1').DataTable().draw();
            UIToastr.init();
            ComponentsPickers.init();
            TOTALSEATNUMBER2.init();
            AVAILABLESEATNUMBER2.init();
            PRICE2.init();
        });
    </script>
@endsection
