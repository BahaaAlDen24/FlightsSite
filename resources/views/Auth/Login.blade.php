<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/login4.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Sep 2020 13:54:33 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Agency login</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/Auth/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/Auth/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/Auth/css/iofrm-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/Auth/css/iofrm-theme4.css')}}">
</head>
<body>
<div class="form-body">
    <div class="website-logo">
        <a href="index-2.html">
            <div >
                <img  src="{{asset('assets/images/logo2.png')}}" alt="">
            </div>
        </a>
    </div>
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                <img src="{{asset('assets/Auth/images/graphic1.svg')}}" alt="">
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <h3>Travel Agency login</h3>
                    <div class="page-links">
                        <a href="/login"  class="active">Login</a>
                        <a href="/register">Register</a>
                    </div>
                    <form id="LogInForm">
                        @csrf
                        <input class="form-control" type="text" id="email" name="email" placeholder="E-mail Address" required>
                        <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
                        <label id="ErrorMessage" class="warning alert-danger" style="text-underline-color: darkred"></label>
                        <div class="form-button">
                            <button  onclick="LogIn();return false;" class="ibtn">Login</button>
                            <a href="forget4.html">Forget password?</a>
                        </div>
                    </form>
                    <div class="other-links">
                        <span>Or login with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/Auth/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/Auth/js/popper.min.js')}}"></script>
<script src="{{asset('assets/Auth/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/Auth/js/main.js')}}"></script>

<script type="text/javascript">

    function LogIn() {
        debugger
        $.ajax({
            data: $('#LogInForm').serialize(),
            url: '/auth/login',
            type: "POST",
            dataType: 'json',
            success: function (data) {
                debugger
                if (data.ErrorMessage != undefined){
                    debugger
                    $('#ErrorMessage').text(data.ErrorMessage);
                }else {
                    debugger
                    window.location.href = "home";
                }
            },
            error: function (data) {
            }
        });
    }
</script>


</body>
</html>
