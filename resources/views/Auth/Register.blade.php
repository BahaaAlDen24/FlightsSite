<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from brandio.io/envato/iofrm/html/register4.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Sep 2020 13:55:36 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Agency Registration</title>
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
                    <h3>Travel Agency Registration</h3>
                    <div class="page-links">
                        <a href="/login">Login</a>
                        <a href="/register" class="active">Register</a>
                    </div>
                    <form method="POST" action="/auth/register">
                        @csrf
                        <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                        <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                        <div class="form-button">
                            <button id="submit" type="submit" class="ibtn">Register</button>
                        </div>
                    </form>
                    <div class="other-links">
                        <span>Or register with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
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
</body>

<!-- Mirrored from brandio.io/envato/iofrm/html/register4.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Sep 2020 13:55:36 GMT -->
</html>
