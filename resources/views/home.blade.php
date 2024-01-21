<!doctype html>
<html lang="en">

<head>
    <title>Andreatta Stack</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('assets/styles/css/style.css')}}">
    <script src="https://kit.fontawesome.com/76835fd060.js" crossorigin="anonymous"></script>

</head>
<style>
    h1 {
        font-family: 'Opens Sans', sans-serif !important;
    }
</style>

<body>

    <div class="page">
        <nav id="colorlib-main-nav" role="navigation">
            <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
            <div class="js-fullheight colorlib-table">
                <div class="img" style="background-image: url(images/bg_3.jpg);"></div>
                <div class="colorlib-table-cell js-fullheight">
                    <div class="row no-gutters">
                        <div class="col-md-12 text-center">
                            <h1 class="mb-4"><a href="#" class="logo">CHOOSE AN OPTION</a></h1>
                            <ul>
                                <li class="active"><a href="#"><span>Home</span></a></li>
                                <li>
                                    <a href="{{route('dashboard.index')}}">
                                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div id="colorlib-page">
            <header>
                <div class="container">
                    <div class="colorlib-navbar-brand">
                        <div class="colorlib-logo">
                            <img width="50" src="{{asset('assets/styles/svg/code-brackets-svgrepo-com.svg')}}" alt=""
                                srcset="">
                        </div>
                    </div>
                    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
                </div>
            </header>

            <section class="hero-wrap js-fullheight">
                <div class="container px-0">
                    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                        data-scrollax-parent="true">
                        <div class="col-md-12 ftco-animate text-center">
                            <div class="desc">
                                <h1 style="color:#f0f2f5">Andreatta Stack</h1>
                                <h3>I'm a man who's got very specific taste, CODE!</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

</html>
