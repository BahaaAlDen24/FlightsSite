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
                Airlines
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
                            <span class="caption-subject font-green-sharp bold uppercase">Airlines Table</span>
                        </div>
                        <div class="actions btn-set">
                            <button id="btnNew" class="btn green-haze btn-circle"><i class="fa fa-check"></i> Add</button>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover" id="sample_1">
                            <thead>
                            <tr>
                                <th>Airline Name</th>
                                <th>Airline Code</th>
                                <th>Created Date</th>
                                <th>Last Update Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (isset($Objects))
                                @foreach ($Objects as $Object)
                                    <tr id="{{"tr" . $Object->id}}" class="odd gradeX">
                                        <td id="{{"ENAME" . $Object->id}}">{{$Object->ENAME}}</td>
                                        <td id="{{"CODE" . $Object->id}}">{{$Object->CODE}}</td>
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
                                            <label class="col-md-3 control-label">Airline Code<span class="required">*</span></label>
                                            <div class="col-md-9">
                                                <select id="CODE" name="CODE" class="form-control">
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AX">Åland Islands</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AQ">Antarctica</option>
                                                    <option value="AG">Antigua and Barbuda</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="BS">Bahamas</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia, Plurinational State of</option>
                                                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                    <option value="BA">Bosnia and Herzegovina</option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BV">Bouvet Island</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="BN">Brunei Darussalam</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option>
                                                    <option value="BI">Burundi</option>
                                                    <option value="KH">Cambodia</option>
                                                    <option value="CM">Cameroon</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="CV">Cape Verde</option>
                                                    <option value="KY">Cayman Islands</option>
                                                    <option value="CF">Central African Republic</option>
                                                    <option value="TD">Chad</option>
                                                    <option value="CL">Chile</option>
                                                    <option value="CN">China</option>
                                                    <option value="CX">Christmas Island</option>
                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                    <option value="CO">Colombia</option>
                                                    <option value="KM">Comoros</option>
                                                    <option value="CG">Congo</option>
                                                    <option value="CD">Congo, the Democratic Republic of the</option>
                                                    <option value="CK">Cook Islands</option>
                                                    <option value="CR">Costa Rica</option>
                                                    <option value="CI">Côte d'Ivoire</option>
                                                    <option value="HR">Croatia</option>
                                                    <option value="CU">Cuba</option>
                                                    <option value="CW">Curaçao</option>
                                                    <option value="CY">Cyprus</option>
                                                    <option value="CZ">Czech Republic</option>
                                                    <option value="DK">Denmark</option>
                                                    <option value="DJ">Djibouti</option>
                                                    <option value="DM">Dominica</option>
                                                    <option value="DO">Dominican Republic</option>
                                                    <option value="EC">Ecuador</option>
                                                    <option value="EG">Egypt</option>
                                                    <option value="SV">El Salvador</option>
                                                    <option value="GQ">Equatorial Guinea</option>
                                                    <option value="ER">Eritrea</option>
                                                    <option value="EE">Estonia</option>
                                                    <option value="ET">Ethiopia</option>
                                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                                    <option value="FO">Faroe Islands</option>
                                                    <option value="FJ">Fiji</option>
                                                    <option value="FI">Finland</option>
                                                    <option value="FR">France</option>
                                                    <option value="GF">French Guiana</option>
                                                    <option value="PF">French Polynesia</option>
                                                    <option value="TF">French Southern Territories</option>
                                                    <option value="GA">Gabon</option>
                                                    <option value="GM">Gambia</option>
                                                    <option value="GE">Georgia</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="GI">Gibraltar</option>
                                                    <option value="GR">Greece</option>
                                                    <option value="GL">Greenland</option>
                                                    <option value="GD">Grenada</option>
                                                    <option value="GP">Guadeloupe</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="GT">Guatemala</option>
                                                    <option value="GG">Guernsey</option>
                                                    <option value="GN">Guinea</option>
                                                    <option value="GW">Guinea-Bissau</option>
                                                    <option value="GY">Guyana</option>
                                                    <option value="HT">Haiti</option>
                                                    <option value="HM">Heard Island and McDonald Islands</option>
                                                    <option value="VA">Holy See (Vatican City State)</option>
                                                    <option value="HN">Honduras</option>
                                                    <option value="HK">Hong Kong</option>
                                                    <option value="HU">Hungary</option>
                                                    <option value="IS">Iceland</option>
                                                    <option value="IN">India</option>
                                                    <option value="ID">Indonesia</option>
                                                    <option value="IR">Iran, Islamic Republic of</option>
                                                    <option value="IQ">Iraq</option>
                                                    <option value="IE">Ireland</option>
                                                    <option value="IM">Isle of Man</option>
                                                    <option value="IL">Israel</option>
                                                    <option value="IT">Italy</option>
                                                    <option value="JM">Jamaica</option>
                                                    <option value="JP">Japan</option>
                                                    <option value="JE">Jersey</option>
                                                    <option value="JO">Jordan</option>
                                                    <option value="KZ">Kazakhstan</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="KI">Kiribati</option>
                                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                                    <option value="KR">Korea, Republic of</option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="KG">Kyrgyzstan</option>
                                                    <option value="LA">Lao People's Democratic Republic</option>
                                                    <option value="LV">Latvia</option>
                                                    <option value="LB">Lebanon</option>
                                                    <option value="LS">Lesotho</option>
                                                    <option value="LR">Liberia</option>
                                                    <option value="LY">Libya</option>
                                                    <option value="LI">Liechtenstein</option>
                                                    <option value="LT">Lithuania</option>
                                                    <option value="LU">Luxembourg</option>
                                                    <option value="MO">Macao</option>
                                                    <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                                    <option value="MG">Madagascar</option>
                                                    <option value="MW">Malawi</option>
                                                    <option value="MY">Malaysia</option>
                                                    <option value="MV">Maldives</option>
                                                    <option value="ML">Mali</option>
                                                    <option value="MT">Malta</option>
                                                    <option value="MH">Marshall Islands</option>
                                                    <option value="MQ">Martinique</option>
                                                    <option value="MR">Mauritania</option>
                                                    <option value="MU">Mauritius</option>
                                                    <option value="YT">Mayotte</option>
                                                    <option value="MX">Mexico</option>
                                                    <option value="FM">Micronesia, Federated States of</option>
                                                    <option value="MD">Moldova, Republic of</option>
                                                    <option value="MC">Monaco</option>
                                                    <option value="MN">Mongolia</option>
                                                    <option value="ME">Montenegro</option>
                                                    <option value="MS">Montserrat</option>
                                                    <option value="MA">Morocco</option>
                                                    <option value="MZ">Mozambique</option>
                                                    <option value="MM">Myanmar</option>
                                                    <option value="NA">Namibia</option>
                                                    <option value="NR">Nauru</option>
                                                    <option value="NP">Nepal</option>
                                                    <option value="NL">Netherlands</option>
                                                    <option value="NC">New Caledonia</option>
                                                    <option value="NZ">New Zealand</option>
                                                    <option value="NI">Nicaragua</option>
                                                    <option value="NE">Niger</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="MP">Northern Mariana Islands</option>
                                                    <option value="NO">Norway</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="PW">Palau</option>
                                                    <option value="PS">Palestinian Territory, Occupied</option>
                                                    <option value="PA">Panama</option>
                                                    <option value="PG">Papua New Guinea</option>
                                                    <option value="PY">Paraguay</option>
                                                    <option value="PE">Peru</option>
                                                    <option value="PH">Philippines</option>
                                                    <option value="PN">Pitcairn</option>
                                                    <option value="PL">Poland</option>
                                                    <option value="PT">Portugal</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="RE">Réunion</option>
                                                    <option value="RO">Romania</option>
                                                    <option value="RU">Russian Federation</option>
                                                    <option value="RW">Rwanda</option>
                                                    <option value="BL">Saint Barthélemy</option>
                                                    <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                    <option value="LC">Saint Lucia</option>
                                                    <option value="MF">Saint Martin (French part)</option>
                                                    <option value="PM">Saint Pierre and Miquelon</option>
                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                    <option value="WS">Samoa</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="ST">Sao Tome and Principe</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                    <option value="RS">Serbia</option>
                                                    <option value="SC">Seychelles</option>
                                                    <option value="SL">Sierra Leone</option>
                                                    <option value="SG">Singapore</option>
                                                    <option value="SX">Sint Maarten (Dutch part)</option>
                                                    <option value="SK">Slovakia</option>
                                                    <option value="SI">Slovenia</option>
                                                    <option value="SB">Solomon Islands</option>
                                                    <option value="SO">Somalia</option>
                                                    <option value="ZA">South Africa</option>
                                                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                    <option value="SS">South Sudan</option>
                                                    <option value="ES">Spain</option>
                                                    <option value="LK">Sri Lanka</option>
                                                    <option value="SD">Sudan</option>
                                                    <option value="SR">Suriname</option>
                                                    <option value="SJ">Svalbard and Jan Mayen</option>
                                                    <option value="SZ">Swaziland</option>
                                                    <option value="SE">Sweden</option>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="SY">Syrian Arab Republic</option>
                                                    <option value="TW">Taiwan, Province of China</option>
                                                    <option value="TJ">Tajikistan</option>
                                                    <option value="TZ">Tanzania, United Republic of</option>
                                                    <option value="TH">Thailand</option>
                                                    <option value="TL">Timor-Leste</option>
                                                    <option value="TG">Togo</option>
                                                    <option value="TK">Tokelau</option>
                                                    <option value="TO">Tonga</option>
                                                    <option value="TT">Trinidad and Tobago</option>
                                                    <option value="TN">Tunisia</option>
                                                    <option value="TR">Turkey</option>
                                                    <option value="TM">Turkmenistan</option>
                                                    <option value="TC">Turks and Caicos Islands</option>
                                                    <option value="TV">Tuvalu</option>
                                                    <option value="UG">Uganda</option>
                                                    <option value="UA">Ukraine</option>
                                                    <option value="AE">United Arab Emirates</option>
                                                    <option value="GB">United Kingdom</option>
                                                    <option value="US">United States</option>
                                                    <option value="UM">United States Minor Outlying Islands</option>
                                                    <option value="UY">Uruguay</option>
                                                    <option value="UZ">Uzbekistan</option>
                                                    <option value="VU">Vanuatu</option>
                                                    <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                    <option value="VN">Viet Nam</option>
                                                    <option value="VG">Virgin Islands, British</option>
                                                    <option value="VI">Virgin Islands, U.S.</option>
                                                    <option value="WF">Wallis and Futuna</option>
                                                    <option value="EH">Western Sahara</option>
                                                    <option value="YE">Yemen</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
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
                                                                    <img id="Img1" src="{{asset('assets/DownloadedFiles/Airline/37/') . "/IMGSRC1.jpg"}}" class="img-responsive" alt="">
                                                                </div>
                                                                <div class="item">
                                                                    <img id="Img2" src="{{asset('assets/DownloadedFiles/Airline/37/') . "/IMGSRC1.jpg"}}" class="img-responsive" alt="">
                                                                </div>
                                                                <div class="item">
                                                                    <img id="Img3" src="{{asset('assets/DownloadedFiles/Airline/37/') . "/IMGSRC1.jpg"}}" class="img-responsive" alt="">
                                                                </div>
                                                                <div class="item">
                                                                    <img id="Img4" src="{{asset('assets/DownloadedFiles/Airline/37/') . "/IMGSRC1.jpg"}}" class="img-responsive" alt="">
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
                                                            <a href="javascript:;" class="btn green"><span>Airline Name   </span><span id="ViewPageName"></span><i class="fa fa-music top-news-icon"></i></a>
                                                            <a href="javascript:;" class="btn yellow"><span>Airline Code  </span><span id="ViewPageCode"></span><i class="fa fa-book top-news-icon"></i></a>
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
            CODE.value = "" ;
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
                    url: "{{ route('Airline.store') }}",
                    method :"POST" ,
                    data: new FormData(this),
                    contentType: false ,
                    cache : false ,
                    processData: false,
                    success: function (data) {
                        debugger
                        data = JSON.parse(data) ;
                        var NewRow = '<tr id="tr' + data.id + '" class="odd gradeX">' +
                            '              <td id="ENAME' + data.id + '">' + data.ENAME + '</td>' +
                            '              <td id="CODE' + data.id + '">' + data.CODE + '</td>' +
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
                    url: "/Airline/" + HtmlId.value ,
                    method :"POST" ,
                    data: test,
                    contentType: false ,
                    cache : false ,
                    processData: false,
                    success: function (data) {
                        debugger
                        $('#CreateNew').modal('hide');
                        data = JSON.parse(data) ;
                        $("#ANAME"+ data.id).html(data.ANAME) ;
                        $("#ENAME"+ data.id).html(data.ENAME) ;
                        $("#ADESCRIPTION"+ data.id).html(data.ADESCRIPTION) ;
                        $("#EDESCRIPTION"+ data.id).html(data.EDESCRIPTION) ;
                        $("#CODE"+ data.id).html(data.CODE) ;

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
            $.get('/Airline/' + id , function (data) {
                debugger
                var MyData = $.parseJSON(data);
                HtmlId.value = MyData.id ;
                ANAME.value = MyData.ANAME ;
                ENAME.value = MyData.ENAME ;
                ADESCRIPTION.value = MyData.ADESCRIPTION ;
                EDESCRIPTION.value = MyData.EDESCRIPTION ;
                CODE.value = MyData.CODE ;

                $('#thumbnail1').append('<img src={{asset('assets/DownloadedFiles/Airline/')}}/' + id + '/IMGSRC1.jpg>') ;
                $('#thumbnail2').append('<img src={{asset('assets/DownloadedFiles/Airline/')}}/' + id + '/IMGSRC2.jpg>') ;
                $('#thumbnail3').append('<img src={{asset('assets/DownloadedFiles/Airline/')}}/' + id + '/IMGSRC3.jpg>') ;
                $('#thumbnail4').append('<img src={{asset('assets/DownloadedFiles/Airline/')}}/' + id + '/IMGSRC4.jpg>') ;

                $('#CreateNew').modal('show');
                $('#Loading').modal('hide');
            })
        }

        function Delete(id){
            $('#Loading').modal('show');
            $.ajax({
                url: '/Airline/' + id ,
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
            $("#ViewPageCode").text('') ;
            $("#ViewPageCreatedDate").text('') ;
            $("#ViewPageUpdatedDate").text('') ;

            $.get('/Airline/' + id , function (data) {
                debugger
                var MyData = $.parseJSON(data);

                $("#ViewPageDesc").text(MyData.EDESCRIPTION) ;
                $("#ViewPageName").text(MyData.ENAME) ;
                $("#ViewPageCode").text(MyData.CODE) ;
                $("#ViewPageCreatedDate").text(MyData.CREATED_AT) ;
                $("#ViewPageUpdatedDate").text(MyData.UPDATED_AT) ;

                $("#Img1").attr('src','{{asset('assets/DownloadedFiles/Airline/')}}/' + id + '/IMGSRC1.jpg');
                $("#Img2").attr('src','{{asset('assets/DownloadedFiles/Airline/')}}/' + id + '/IMGSRC2.jpg');
                $("#Img3").attr('src','{{asset('assets/DownloadedFiles/Airline/')}}/' + id + '/IMGSRC3.jpg');
                $("#Img4").attr('src','{{asset('assets/DownloadedFiles/Airline/')}}/' + id + '/IMGSRC4.jpg');

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
