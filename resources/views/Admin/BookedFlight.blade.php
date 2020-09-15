@extends('Layouts\AdminPanel')

@section('PageCSS')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminPanel/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminPanel/global/plugins/bootstrap-toastr/toastr.min.css')}}"/>
    <link href="{{asset('assets/AdminPanel/admin/pages/css/news.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/AdminPanel/admin/pages/css/blog.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminPanel/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}"/>
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
                Booked Flights
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
                            <span class="caption-subject font-green-sharp bold uppercase">Booked Flights</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th>User Name</th>
                                <th>Flight Info</th>
                                <th>Booked Seats</th>
                                <th>Total Price</th>
                                <th>Booked Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($Objects))
                                @foreach ($Objects as $Object)
                                    <tr id="{{"tr" . $Object->id}}" class="odd gradeX">
                                        <td id="{{"UserName" . $Object->id}}">{{$Object->UserName}}</td>
                                        <td id="{{"FlightInfo" . $Object->id}}">{{$Object->FlightInfo}}</td>
                                        <td id="{{"NUMOFSEAT" . $Object->id}}">{{$Object->NUMOFSEAT}}</td>
                                        <td id="{{"TOTALPRICE" . $Object->id}}">{{$Object->TOTALPRICE}} $</td>
                                        <td id="{{"CREATED_AT" . $Object->id}}">{{$Object->CREATED_AT}} $</td>
                                        <td>
                                            <a onclick='Delete({{$Object->id}})'><span class="btn btn-circle btn-danger"><i class="fa fa-check-circle"></i> Delete</span></a>
                                            <a onclick='View({{$Object->id}})'><span class="btn btn-circle btn-warning"><i class="fa fa-check-circle"></i> View</span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
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
    <script src="{{asset('assets/AdminPanel/admin/pages/scripts/form-samples.js')}}"></script>

    <script type="text/javascript">
        var Mode = "" ;

        function ClearDiv(){
            HtmlId.value = "" ;
            ANAME.value = "" ;
            ENAME.value = "" ;
            ADESCRIPTION.value = "" ;
            EDESCRIPTION.value = "" ;
            USERID.value = "" ;
            BANKID.value = "" ;
            FUNDS.value = "" ;
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

        function Delete(id){
            $('#Loading').modal('show');
            $.ajax({
                url: '/BookedFlight/' + id ,
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
                $("#BookingPrice").text(MyData[2].TOTALPRICE) ;
                $("#BookingSeat").text(MyData[2].NUMOFSEAT) ;

                $('#Loading').modal('hide');
                $('#ItemInfo').modal('show');

            })
        }

        jQuery(document).ready(function() {
            BookedFlightTable.init();
            $('#sample_1').DataTable().destroy();
            $('#sample_1').DataTable().draw();
            UIToastr.init();
            ComponentsFormTools23.init();
            FormSamples.init();
        });
    </script>
@endsection
