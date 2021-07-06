@extends('layouts.website')
@section('content')

<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('homepags/img/fav-icon.png') }}" type="image/x-icon" />
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>اكاديمية البرهان</title>

    <!-- Icon css link -->

    <link href="{{ asset('homepags/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Bootstrap -->

    <link href="{{ asset('homepags/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Rev slider css -->
    <link href="{{ asset('homepags/vendors/revolution/css/settings.css') }}" rel="stylesheet">
    <link href="{{ asset('homepags/vendors/revolution/css/layers.css') }}" rel="stylesheet">
    <link href="{{ asset('homepags/vendors/revolution/css/navigation.css') }}" rel="stylesheet">



    <!-- Extra plugin css -->
    <link href="{{ asset('homepags/vendors/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">

    <link href="{{ asset('homepags/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('homepags/css/responsive.css') }}" rel="stylesheet">



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
                <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
                <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                <![endif]-->
    @yield('css')
</head>

<body>

    <!--================Header Menu Area =================-->

    <header class="main_menu_area">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="{{ asset('homepags/img/lSxsBzQR_400x400.jpg') }}""  alt=""></a>

                        <button class=" navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">

                        <li class="nav-item"><a class="nav-link" href="login">تسجيل الدخول</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">اتصل بنا </a></li>
                        <li class="nav-item"><a class="nav-link" href="shor.html">شركائنا</a></li>


                        <li class="nav-item dropdown submenu">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                برامجنا
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li class="nav-item"><a class="nav-link" href="rafed.html">رافد</a></li>
                                <li class="nav-item"><a class="nav-link" href="diploma_m.html">الدبلوم العالي
                                        للمديرات</a></li>
                                <li class="nav-item"><a class="nav-link" href="diploma_a.html">دبلوم الاشراف التربوي</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="diploma_r.html">دبلوم رياض الاطفال</a>
                                </li>
                            </ul>
                        </li>

            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li class="nav-item"><a class="nav-link" href="#">رؤيتنا</a></li>
                <li class="nav-item"><a class="nav-link" href="#">شركاءنا</a></li>

                × CloseToggle fullscreen
                Edit file
            </ul>
            </li>
            <li class="nav-item active"><a class="nav-link" href="about">عن الأكاديمية</a></li>

            <li class="nav-item active"><a class="nav-link" href="index.html">الرئيسية</a></li>

            </ul>
            </div>
        </nav>
    </header>
    <!--================End Header Menu Area =================-->

    @yield('content')




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="{{ asset('homepags/js/jquery-3.2.1.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('homepags/js/popper.min.js') }}"></script>
    <script src="{{ asset('homepags/js/bootstrap.min.js') }}"></script>

    <!-- Rev slider js -->

    <script src="{{ asset('homepags/vendors/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('homepags/vendors/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('homepags/vendors/revolution/js/extensions/revolution.extension.actions.min.js') }}">
    </script>
    <script src="{{ asset('homepags/vendors/revolution/js/extensions/revolution.extension.video.min.js') }}">
    </script>
    <script src="{{ asset('homepags/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js') }}">
    </script>
    <script src="{{ asset('homepags/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}">
    </script>
    <script src="{{ asset('homepags/vendors/revolution/js/extensions/revolution.extension.navigation.min.js') }}">
    </script>
    <script src="{{ asset('homepags/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js') }}">
    </script>



    <!-- Extra plugin css -->

    <script src="{{ asset('homepags/vendors/counterup/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('homepags/vendors/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('homepags/vendors/counterup/apear.js') }}"></script>
    <script src="{{ asset('homepags/vendors/counterup/countto.js') }}"></script>
    <script src="{{ asset('homepags/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('homepags/vendors/magnify-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('homepags/js/smoothscroll.js') }}"></script>

    <script src="{{ asset('homepags/js/theme.js') }}"></script>



</body>

</html>