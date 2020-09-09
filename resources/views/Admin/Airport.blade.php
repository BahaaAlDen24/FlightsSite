@extends('Layouts\AdminPanel')

@section('PageCSS')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/AdminPanel/global/plugins/select2/select2.css')}}"/>
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
                <a href="#">Dashboard</a><i class="fa fa-circle"></i>
            </li>
            <li class="active">
                Airports
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
                            <span class="caption-subject font-green-sharp bold uppercase">Airports Table</span>
                        </div>
                        <div class="actions btn-set">
                            <button id="btnNew" class="btn green-haze btn-circle"><i class="fa fa-check"></i> Add</button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th class="table-checkbox">
                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes"/>
                                </th>
                                <th>Airport Name</th>
                                <th>City</th>
                                <th>Created Date</th>
                                <th>Last Update Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($Objects))
                                @foreach ($Objects as $Object)
                                    <tr id="{{"tr" . $Object->id}}" class="odd gradeX">
                                        <td><input type="checkbox" class="checkboxes" value="1"/></td>
                                        <td id="{{"ENAME" . $Object->id}}">{{$Object->ENAME}}</td>
                                        <td id="{{"City" . $Object->id}}">{{$Object->City}}</td>
                                        <td id="{{"CDATE" . $Object->id}}">{{$Object->CREATED_AT}}</td>
                                        <td id="{{"UDATE" . $Object->id}}">{{$Object->UPDATED_AT}}</td>
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
                                            <label class="col-md-3 control-label">City<span class="required">* </span></label>
                                            <div class="col-md-8">
                                                <select class="form-control select2" name="CITYID" id="CITYID">
                                                    <option value="">Select...</option>
                                                    @if (isset($Cities))
                                                        @foreach ($Cities as $City)
                                                            <option value="{{$City->id}}">{{$City->ENAME}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Upload Image 1</label>
                                            <div class="col-md-9">
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
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Upload Image 2</label>
                                            <div class="col-md-9">
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
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Upload Image 3</label>
                                            <div class="col-md-9">
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
                                        <div class="form-group ">
                                            <label class="control-label col-md-3">Upload Image 4</label>
                                            <div class="col-md-9">
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
                                                                    <img id="Img1" src="{{asset('assets/DownloadedFiles/Airport/37/') . "/IMGSRC1.jpg"}}" class="img-responsive" alt="">
                                                                </div>
                                                                <div class="item">
                                                                    <img id="Img2" src="{{asset('assets/DownloadedFiles/Airport/37/') . "/IMGSRC1.jpg"}}" class="img-responsive" alt="">
                                                                </div>
                                                                <div class="item">
                                                                    <img id="Img3" src="{{asset('assets/DownloadedFiles/Airport/37/') . "/IMGSRC1.jpg"}}" class="img-responsive" alt="">
                                                                </div>
                                                                <div class="item">
                                                                    <img id="Img4" src="{{asset('assets/DownloadedFiles/Airport/37/') . "/IMGSRC1.jpg"}}" class="img-responsive" alt="">
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
                                                            <a href="javascript:;" class="btn green"><span>Airport Name   </span><span id="ViewPageName"></span><i class="fa fa-music top-news-icon"></i></a>
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
    <script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/select2/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('assets/AdminPanel/admin/pages/scripts/table-managed.js')}}"></script>
    <script src="{{asset('assets/AdminPanel/global/plugins/bootstrap-toastr/toastr.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/AdminPanel/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script src="{{asset('assets/AdminPanel/admin/pages/scripts/ui-toastr.js')}}"></script>

    <script type="text/javascript">
        var Mode = "" ;

        function ClearDiv(){
            HtmlId.value = "" ;
            ANAME.value = "" ;
            ENAME.value = "" ;
            ADESCRIPTION.value = "" ;
            EDESCRIPTION.value = "" ;
            CITYID.value = "" ;
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
                    url: "{{ route('Airport.store') }}",
                    method :"POST" ,
                    data: new FormData(this),
                    contentType: false ,
                    cache : false ,
                    processData: false,
                    success: function (data) {
                        debugger
                        data = JSON.parse(data) ;
                        var City = $( "#CITYID option:selected" ).text() ;
                        var NewRow = '<tr id="tr' + data.id + '" class="odd gradeX">' +
                            '             <td><input type="checkbox" class="checkboxes" value="1"/></td>\n' +
                            '              <td id="ENAME' + data.id + '">' + data.ENAME + '</td>' +
                            '              <td id="City' + data.id + '">' + City + '</td>' +
                            '              <td id="CDATE' + data.id + '">' + data.CREATED_AT + '</td>' +
                            '              <td id="UDATE' + data.id + '">' + data.UPDATED_AT + '</td>' +
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
                    url: "/Airport/" + HtmlId.value ,
                    method :"POST" ,
                    data: test,
                    contentType: false ,
                    cache : false ,
                    processData: false,
                    success: function (data) {
                        debugger
                        $('#CreateNew').modal('hide');
                        data = JSON.parse(data) ;
                        var City = $( "#CITYID option:selected" ).text() ;
                        $("#ANAME"+ data.id).html(data.ANAME) ;
                        $("#ENAME"+ data.id).html(data.ENAME) ;
                        $("#ADESCRIPTION"+ data.id).html(data.ADESCRIPTION) ;
                        $("#EDESCRIPTION"+ data.id).html(data.EDESCRIPTION) ;
                        $("#City"+ data.id).html(City) ;

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
            $.get('/Airport/' + id , function (data) {
                debugger
                var MyData = $.parseJSON(data);
                HtmlId.value = MyData.id ;
                ANAME.value = MyData.ANAME ;
                ENAME.value = MyData.ENAME ;
                ADESCRIPTION.value = MyData.ADESCRIPTION ;
                EDESCRIPTION.value = MyData.EDESCRIPTION ;
                CITYID.value = MyData.CITYID ;

                $('#thumbnail1').append('<img src={{asset('assets/DownloadedFiles/Airport/')}}/' + id + '/IMGSRC1.jpg>') ;
                $('#thumbnail2').append('<img src={{asset('assets/DownloadedFiles/Airport/')}}/' + id + '/IMGSRC2.jpg>') ;
                $('#thumbnail3').append('<img src={{asset('assets/DownloadedFiles/Airport/')}}/' + id + '/IMGSRC3.jpg>') ;
                $('#thumbnail4').append('<img src={{asset('assets/DownloadedFiles/Airport/')}}/' + id + '/IMGSRC4.jpg>') ;

                $('#CreateNew').modal('show');
                $('#Loading').modal('hide');
            })
        }

        function Delete(id){
            $('#Loading').modal('show');
            $.ajax({
                url: '/Airport/' + id ,
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

            $.get('/Airport/' + id , function (data) {
                debugger
                var MyData = $.parseJSON(data);

                $("#ViewPageDesc").text(MyData.EDESCRIPTION) ;
                $("#ViewPageName").text(MyData.ENAME) ;
                $("#ViewPageCity").text(MyData.City) ;
                $("#ViewPageCreatedDate").text(MyData.CREATED_AT) ;
                $("#ViewPageUpdatedDate").text(MyData.UPDATED_AT) ;

                $("#Img1").attr('src','{{asset('assets/DownloadedFiles/Airport/')}}/' + id + '/IMGSRC1.jpg');
                $("#Img2").attr('src','{{asset('assets/DownloadedFiles/Airport/')}}/' + id + '/IMGSRC2.jpg');
                $("#Img3").attr('src','{{asset('assets/DownloadedFiles/Airport/')}}/' + id + '/IMGSRC3.jpg');
                $("#Img4").attr('src','{{asset('assets/DownloadedFiles/Airport/')}}/' + id + '/IMGSRC4.jpg');

                $('#Loading').modal('hide');
                $('#ItemInfo').modal('show');

            })
        }

        jQuery(document).ready(function() {
            TableManaged.init();
            $('#sample_1').DataTable().destroy();
            $('#sample_1').DataTable().draw();
            UIToastr.init();
        });
    </script>
@endsection
