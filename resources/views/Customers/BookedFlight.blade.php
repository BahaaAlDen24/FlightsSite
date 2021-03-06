@extends('Layouts\Main')

@section('Content')
    <div class="container">

        <div id="why1">
            <div class="container">

                <h2 class="animated" data-animation="fadeInUp" data-animation-delay="100">Your Booked Flights</h2>

                <div class="title1 animated" data-animation="fadeInUp" data-animation-delay="200">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod <br>tincidunt ut laoreet dolore magna aliquam erat volutpat.</div>

                <div id="SearchResultFlights">
                    @if (isset($BookedFlights))
                        @foreach ($BookedFlights as $BookedFlight)
                            <div class="row" id="{{"BookedFlightItem". $BookedFlight->BookingFlightID }}">
                                <div class="col-sm-12">
                                    <div class="thumb4">
                                        <div class="thumbnail clearfix">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <figure>
                                                        <img src="{{asset('assets/DownloadedFiles/Airlines/')}}/{{$BookedFlight->AIRLINEID }}/IMGSRC1.jpg" alt="" class="img-responsive" style="margin:50px;">
                                                    </figure>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="caption" style="margin-top: 50px;">
                                                        <div class="row">
                                                            <div class="col-sm-6"><div class="txt1">{{$BookedFlight->FromName }} - {{$BookedFlight->ToName }}</div></div>
                                                            <div class="col-sm-6"><div class="txt1">{{$BookedFlight->CityFromName }} - {{$BookedFlight->CityToName }}</div></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6"><div class="txt1">Departure :{{$BookedFlight->DEPATURETIME }}</div></div>
                                                            <div class="col-sm-6"><div class="txt1">Arrival   :{{$BookedFlight->ARRIVALTIME }}</div></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6"><div class="txt1">Airline : {{$BookedFlight->AirlineName }}</div></div>
                                                            <div class="col-sm-6"><div class="txt1">Airplane : {{$BookedFlight->AirplaneName }}</div></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6"><div class="txt1">Booking Date : {{$BookedFlight->BookingDate }}</div></div>
                                                        </div>
                                                        <div class="txt3 clearfix">
                                                            <div class="left_side">
                                                                <div class="price">Total Price: ${{$BookedFlight->PRICE }}.00</div>
                                                                <div class="nums">avg/person</div>
                                                            </div>
                                                            <div class="right_side" style="margin-right: 130px;">
                                                                <a onclick="Details({{$BookedFlight->BookingFlightID }});" class="btn-default btn1">Details</a>
                                                            </div>
                                                            <div class="right_side" style="margin-right: 15px;">
                                                                <a onclick="OpenCancelModal({{$BookedFlight->BookingFlightID }});" class="btn-default btn1">Cancel Booking</a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
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
        <div class="modal fade" id="CancelModal" role="basic" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h4 class="modal-title">Cancel Flight</h4>
                            </div>
                            <form method="post" enctype="multipart/form-data" id="BookingCancelForm" name="BookingCancelForm" class="form-horizontal">
                                <div class="form-body">
                                    <div class="form-group" style="display: none;">
                                        <label class="control-label col-md-4">ID<span class="required">*</span></label>
                                        <div class="col-md-8">
                                            <input type="text"  id="BOOKEDFLIGHTID" name="BOOKEDFLIGHTID" data-required="1" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Booking Cancel Reason<span class="required">*</span></label>
                                        <div class="col-md-9">
                                            <textarea type="text" id="EDESCRIPTION" name="EDESCRIPTION" class="form-control"rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn default">Cancel</button>
                                        <button id="btnCancel" type="submit" class="btn green">Submit</button>
                                    </div>
                                </div>
                            </form>
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
                                                                            <p class="form-control-static" id="Flight_Price"></p>
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
                                                                            <p class="form-control-static" id="User_Name"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5">User Email :</label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" id="User_Email"></p>
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
                                                    <i class="icon-docs font-red-intense"></i>
                                                </div>
                                            </div>
                                            <div class="timeline-body">
                                                <div class="timeline-body-arrow">
                                                </div>
                                                <div class="timeline-body-head">
                                                    <div class="timeline-body-head-caption">
                                                        <span class="timeline-body-alerttitle font-green-haze">Booking Information</span>
                                                    </div>
                                                </div>
                                                <div class="timeline-body-content">
                                                    <form class="form-horizontal" role="form">
                                                        <div class="form-body">
                                                            <!--/row-->
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5">Booking Seat :</label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" id="BookingSeat"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--/span-->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5">Booking Total Price :</label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" id="BookingPrice"></p>
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
                                                                        <label class="control-label col-md-5">Notes :</label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" id="BookingNotes"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-5">Booked Date :</label>
                                                                        <div class="col-md-7">
                                                                            <p class="form-control-static" id="BookingDate"></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
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
    </div>
@endsection

@section('pageJS')
    <script type="text/javascript">

        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#btnCancel').click(function (e) {
                debugger
                e.preventDefault();
                $('#Loading').modal('show');
                $.ajax({
                    data: $('#BookingCancelForm').serialize(),
                    url: "{{ route('CanceledFlight.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        debugger
                        $("#BookedFlightItem" + data.id ).remove();
                        $('#Loading').modal('hide');
                        toastr.success("Operation has been done successfully", "Booking has been canceled successfully");
                    },
                    error: function (data) {
                        debugger
                    }
                });
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

            $("#User_Name").text('') ;
            $("#User_Email").text('') ;

            $("#BookingDate").text('') ;
            $("#BookingNotes").text('') ;
            $("#BookingPrice").text('') ;
            $("#BookingSeat").text('') ;

            $.get('/BookedFlight/' + id , function (data) {
                debugger
                var MyData = $.parseJSON(data);

                $("#Flight_From").text(MyData[0].FromName) ;
                $("#Flight_To").text(MyData[0].ToName) ;
                $("#Flight_Departure").text(MyData[0].DEPATURETIME) ;
                $("#Flight_Arrival").text(MyData[0].ARRIVALTIME) ;
                $("#Flight_Airline").text(MyData[0].AirlineName) ;
                $("#Flight_Airplane").text(MyData[0].AirplaneName) ;
                $("#Flight_Type").text(MyData[0].FlightTypeName) ;
                $("#Flight_Price").text(MyData[0].PRICE + " $") ;

                $("#User_Name").text(MyData[1].name) ;
                $("#User_Email").text(MyData[1].email) ;

                $("#BookingDate").text(MyData[2].CREATED_AT) ;
                $("#BookingNotes").text(MyData[2].EDESCRIPTION) ;
                $("#BookingPrice").text(MyData[2].TOTALPRICE +"$") ;
                $("#BookingSeat").text(MyData[2].NUMOFSEAT) ;

                $('#Loading').modal('hide');
                $('#ItemInfo').modal('show');

            })
        }

        function OpenCancelModal(FlightID){
            debugger
            BOOKEDFLIGHTID.value = FlightID  ;
            EDESCRIPTION.value = "" ;
            $('#CancelModal').modal('show');
        }

        jQuery(document).ready(function() {
        });
    </script>
@endsection
