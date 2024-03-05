<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Material Dashboard 2 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{asset('material-dashboard-master/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{asset('material-dashboard-master/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{asset('assets/styles/material-dashboard.css?v=3.1.0')}}" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <style>
        .background-login::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 70%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            background: #1b1e21;
            border-radius: 100%;
            filter: blur(200px);
            opacity: 1;
            pointer-events: none;

        }
    </style>
</head>

<body class="bg-gray-200">
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100 background-login" >
        <span class="mask "></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" class="text-start" method="post" action="{{route('auth.login')}}">
                                @csrf
                                <div class="text-center">
                                    <i class="fa fa-github text-white text-lg"></i>
                                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">
                                        <i class="fa fa-github text-white text-lg pr-2"></i>
                                        Log in with Github
                                    </button>
                                </div>
                                <p class="mt-4 text-sm text-center">
                                    Don't have an account?
                                    <a href="https://github.com/signup?user_email=&source=form-home-signup" class="text-primary text-gradient font-weight-bold">Sign up</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--   Core JS Files   -->
<script src="{{asset('material-dashboard-master/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('material-dashboard-master/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('material-dashboard-master/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('material-dashboard-master/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
<script src="{{asset('material-dashboard-master/assets/js/plugins/chartjs.min.js')}}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('material-dashboard-master/assets/js/material-dashboard.min.js?v=3.1.0')}}"></script>
</body>

</html>
