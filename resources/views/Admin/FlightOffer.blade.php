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
                Flight Offers
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
                            <span class="caption-subject font-green-sharp bold uppercase">Flight Offers</span>
                        </div>
                        <div class="actions btn-set">
                            <button id="btnNew" class="btn green-haze btn-circle"><i class="fa fa-check"></i> Add</button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th>Flight Offer Name</th>
                                <th>FlightInfo</th>
                                <th>Bank</th>
                                <th>Funds</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($Objects))
                                @foreach ($Objects as $Object)
                                    <tr id="{{"tr" . $Object->id}}" class="odd gradeX">
                                        <td id="{{"ENAME" . $Object->id}}">{{$Object->ENAME}}</td>
                                        <td id="{{"User" . $Object->id}}">{{$Object->User}}</td>
                                        <td id="{{"Bank" . $Object->id}}">{{$Object->Bank}}</td>
                                        <td id="{{"FUNDS" . $Object->id}}">{{$Object->FUNDS}} $</td>
                                        <td>
                                            <a onclick='Update({{$Object->id}})'><span class="btn btn-circle btn-primary"><i class="fa fa-check-circle"></i> Update</span></a>
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
                <!-- END EXAMPLE TABLE PORTLET-->
                <div id="CreateNew" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog modal-lg" style="overflow-y: initial !important;">
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
                            <div class="modal-body" style="height:500px; overflow-y: auto;">
                                <!-- BEGIN FORM-->
                                <form method="post" enctype="multipart/form-data" id="ObjectsForm" name="ObjectsForm" class="form-horizontal">
                                    <div class="form-body">
                                        <div class="form-group" style="display: none;">
                                            <label class="control-label col-md-4">ID<span class="required">*</span></label>
                                            <div class="col-md-8">
                                                <input type="text"  id="HtmlId" name="HtmlId" data-required="1" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Arabic Name<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text"  id="ANAME" name="ANAME" data-required="1" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">English Name<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <input type="text" id="ENAME" name="ENAME" data-required="1" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Arabic Description<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <textarea type="text" id="ADESCRIPTION" name="ADESCRIPTION" class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">English Description<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <textarea type="text" id="EDESCRIPTION" name="EDESCRIPTION" class="form-control"rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">User<span class="required">* </span></label>
                                            <div class="col-md-8">
                                                <select class="form-control select2" name="USERID" id="USERID">
                                                    <option value="">Select...</option>
                                                    @if (isset($Users))
                                                        @foreach ($Users as $User)
                                                            <option value="{{$User->id}}">{{$User->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Bank<span class="required">* </span></label>
                                            <div class="col-md-8">
                                                <select class="form-control select2" name="BANKID" id="BANKID">
                                                    <option value="">Select...</option>
                                                    @if (isset($Banks))
                                                        @foreach ($Banks as $Bank)
                                                            <option value="{{$Bank->id}}">{{$Bank->ENAME}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Total Funds<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <div class="input-inline input-medium">
                                                    <input id="FUNDS"  name="FUNDS"type="text" class="form-control">
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

                                                    </div>
                                                    <div class="col-md-3">
                                                        <h3 style="margin-top:0">News Feeds</h3>
                                                        <div class="top-news">
                                                            <a href="javascript:;" class="btn green"><span>Flight Offer Name   </span><span id="ViewPageName"></span><i class="fa fa-music top-news-icon"></i></a>
                                                            <a href="javascript:;" class="btn yellow"><span>User   </span><span id="ViewPageUser"></span><i class="fa fa-book top-news-icon"></i></a>
                                                            <a href="javascript:;" class="btn yellow"><span>Bank   </span><span id="ViewPageBank"></span><i class="fa fa-book top-news-icon"></i></a>
                                                            <a href="javascript:;" class="btn red"><span>Total Funds  </span><span id="ViewPageFunds"></span><i class="fa fa-briefcase top-news-icon"></i></a>
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

        $('#ObjectsForm').on('submit', function (event) {
            debugger
            event.preventDefault();
            var test = new FormData($(this)[0]) ;
            test.append('_method', 'PUT');
            if (Mode == "New") {
                $('#CreateNew').modal('hide');
                $('#Loading').modal('show');
                $.ajax({
                    url: "{{ route('FlightOffer.store') }}",
                    method :"POST" ,
                    data: new FormData(this),
                    contentType: false ,
                    cache : false ,
                    processData: false,
                    success: function (data) {
                        debugger
                        data = JSON.parse(data) ;
                        var User = $( "#USERID option:selected" ).text() ;
                        var Bank = $( "#BANKID option:selected" ).text() ;
                        var NewRow = '<tr id="tr' + data.id + '" class="odd gradeX">' +
                            '              <td id="ENAME' + data.id + '">' + data.ENAME + '</td>' +
                            '              <td id="User' + data.id + '">' + User + '</td>' +
                            '              <td id="Bank' + data.id + '">' + Bank + '</td>' +
                            '              <td id="FUNDS' + data.id + '">' + data.FUNDS + ' $</td>' +
                            '              <td>\n' +
                            '                 <a onclick=\'Update(' + data.id +')\'><span class="btn btn-circle btn-primary"><i class="fa fa-check-circle"></i> Update</span></a>\n' +
                            '                 <a onclick=\'Delete(' + data.id +')\'><span class="btn btn-circle btn-danger"><i class="fa fa-check-circle"></i> Delete</span></a>\n' +
                            '                 <a onclick=\'View(' + data.id +')\'><span class="btn btn-circle btn-warning"><i class="fa fa-check-circle"></i> View</span></a>\n' +
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
                    url: "/FlightOffer/" + HtmlId.value ,
                    method :"POST" ,
                    data: test,
                    contentType: false ,
                    cache : false ,
                    processData: false,
                    success: function (data) {
                        debugger
                        $('#CreateNew').modal('hide');
                        data = JSON.parse(data) ;
                        var User = $( "#USERID option:selected" ).text() ;
                        var Bank = $( "#BANKID option:selected" ).text() ;
                        $("#ANAME"+ data.id).html(data.ANAME) ;
                        $("#ENAME"+ data.id).html(data.ENAME) ;
                        $("#ADESCRIPTION"+ data.id).html(data.ADESCRIPTION) ;
                        $("#EDESCRIPTION"+ data.id).html(data.EDESCRIPTION) ;
                        $("#User"+ data.id).html(User) ;
                        $("#Bank"+ data.id).html(Bank) ;
                        $("#FUNDS"+ data.id).html(data.FUNDS) ;


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
            $.get('/FlightOffer/' + id , function (data) {
                debugger
                var MyData = $.parseJSON(data);
                HtmlId.value = MyData.id ;
                ANAME.value = MyData.ANAME ;
                ENAME.value = MyData.ENAME ;
                ADESCRIPTION.value = MyData.ADESCRIPTION ;
                EDESCRIPTION.value = MyData.EDESCRIPTION ;
                USERID.value = MyData.USERID ;
                BANKID.value = MyData.BANKID ;
                FUNDS.value = MyData.FUNDS

                $('#CreateNew').modal('show');
                $('#Loading').modal('hide');
            })
        }

        function Delete(id){
            $('#Loading').modal('show');
            $.ajax({
                url: '/FlightOffer/' + id ,
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
            $("#ViewPageUser").text('') ;
            $("#ViewPageBank").text('') ;
            $("#ViewPageFunds").text('') ;
            $("#ViewPageCreatedDate").text('') ;
            $("#ViewPageUpdatedDate").text('') ;

            $.get('/FlightOffer/' + id , function (data) {
                debugger
                var MyData = $.parseJSON(data);

                $("#ViewPageDesc").text(MyData.EDESCRIPTION) ;
                $("#ViewPageName").text(MyData.ENAME) ;
                $("#ViewPageUser").text(MyData.User) ;
                $("#ViewPageBank").text(MyData.Bank) ;
                $("#ViewPageFunds").text(MyData.FUNDS + " $") ;
                $("#ViewPageCreatedDate").text(MyData.CREATED_AT) ;
                $("#ViewPageUpdatedDate").text(MyData.UPDATED_AT) ;

                $('#Loading').modal('hide');
                $('#ItemInfo').modal('show');

            })
        }

        jQuery(document).ready(function() {
            TableManaged.init();
            $('#sample_1').DataTable().destroy();
            $('#sample_1').DataTable().draw();
            UIToastr.init();
            ComponentsFormTools23.init();
            FormSamples.init();
        });
    </script>
@endsection
