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
</head>

<body>

    <!--================Header Menu Area =================-->


    <header class="main_menu_area">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="{{ asset('homepags/img/lSxsBzQR_400x400.jpg') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">

                    <li class="nav-item"><a class="nav-link" href="portfolio">تسجيل الدخول</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact">اتصل بنا </a></li>
                    <li class="nav-item"><a class="nav-link" href="join_us">انضم الينا </a></li>
                    <li class="nav-item"><a class="nav-link" href="shor">شركائنا</a></li>

                    <li class="nav-item dropdown submenu">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            الدبلومات
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li class="nav-item"><a class="nav-link" href="rafed">رافد</a></li>
                            <li class="nav-item"><a class="nav-link" href="diploma_m">الدبلوم العالي للمديرات</a></li>
                            <li class="nav-item"><a class="nav-link" href="diploma_a">دبلوم الاشراف التربوي</a></li>
                            <li class="nav-item"><a class="nav-link" href="diploma_r">دبلوم رياض الاطفال</a></li>



                        </ul>
                    </li>
                    @php
                        $get_adv = App\Programme::with('adv')
                            ->whereHas('adv')
                            ->get();
                    @endphp
                    @if (count($get_adv) > 0)
                        <li class="nav-item dropdown submenu">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                البرامج
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach ($get_adv as $item)
                                    <li class="nav-item"><a class="nav-link"
                                            href="{{ route('view_diplome_information', $item->id) }}">{{ $item->name }}</a>
                                    </li>

                                @endforeach

                            </ul>


                        </li>
                    @endif

                    </a>

                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="nav-item"><a class="nav-link" href="#">رؤيتنا</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">شركاءنا</a></li>
                    </ul>
                    </li>
                    <li class="nav-item active"><a class="nav-link" href="about">عن الأكاديمية</a></li>

                    <li class="nav-item active"><a class="nav-link" href="/">الرئيسية</a></li>

                </ul>
            </div>
        </nav>
    </header>


    <!--================End Header Menu Area =================-->

    <!--================Banner Area =================-->
    <section class="banner_area">
        <div class="container">
            <div class="banner_inner_text">
                <h2>عن الأكاديمية</h2>
            </div>
        </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Challange Area =================-->

    <section class="challange_area p_100">
        <div class="container">

            <div class="container-fluid">
                <div class="col-lg-6 challange_img">
                    <div class="challange_img_inner">
                        <img class="img-fluid" src="{{ asset('homepags/img/popup-photo.png') }}" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="challange_text_inner">
                            <b>
                                <div class="l_title">
                                    <img src="{{ asset('homepags/img/icon/title-icon.png') }}" alt="">
                                    <h6>رؤية اكاديمية البرهان</h6>
                                    <h2>أن تكون الأكاديمية رائدة شريكة متميزة في مجال التعليم والتدريب </h2>
                                </div>
                                <p> رسالتنا : تدريب وتأهيل فعال يسهم في تطوير أداء المتدربات بأحدث المعارف والمهارات.
                                </p>
                                <div class="c_video">
                                    <a class="popup-youtube" href="https://www.youtube.com/embed/0bh99MZMuT0"><img
                                            src="{{ asset('homepags/img/icon/video-icon.png') }}" alt="">فديو عن
                                        اكاديمية البرهان </a>
                                </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </section>

    <!--================End Challange Area =================-->

    <!--================Testimonials Slider Area =================-->
    <section class="testimonials_area">
        <div class="container">
            <div class="testimonials_slider owl-carousel">
                <div class="item">
                    <div class="testi_item">
                        <h3>“كلمة مديرة الاكاديمية”</h3>
                        <p>الحمد لله رب العالمين والصلاة والسلام على نبينا محمد وعلى آلة وصحبة أجمعين أما بعد، الحمد لله
                            الذي هيأ لنا في وطن الأمن والأمان وبلاد التوحيد خدمة كتابه العزيز عبر أكاديمية البرهان
                            للتعليم والتدريب التابعة للمركز الخيري لتعليم القرآن الكريم وعلومه، والتي تعنى بتعليم وتدريب
                            وتأهيل منسوبات المركز الخيري الدور النسائية سائلين المولى أن يبارك في الجهود وان ينفع بها
                            البلاد والعباد. </p>
                        <div class="media">
                            <div class="d-flex">
                            </div>
                            <div class="media-body">
                                <h4>لولوة عبد الرحمن التميمي</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <h3>“كلمة المقرأة ”</h3>
                        <p>إنّ هذا القرآن العظيم مما شرف الله به هذه الأمة وخصها به، وقد تكفَّل الله بحفظه
                            كما قال تعالى:
                            ( إِنَّا نَحْنُ نَزَّلْنَا الذِّكْرَ وَإِنَّا لَهُ لَحَافِظُونَ) الحجر9 .
                            وكان من حفظه لكتابه أن وفَّقَ هذه الأمة إلى حفظه واستظهاره.
                            وقد وجب علينا حفظه وتدارسه والعمل به، وقد تظاهرت الأدلة على فضل حفظ القرآن الكريم، وفضل
                            حفظته على غيرهم من الْمسلمين.
                            وخَصَّ الأمة المحمدية بشرف الإسناد </p>
                        <div class="media">
                            <div class="d-flex">
                            </div>
                            <div class="media-body">
                                <h4>آمال عبد العظيم الخطيب</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <h3></h3>
                        <p></p>
                        <div class="media">
                            <div class="d-flex">
                            </div>
                            <div class="media-body">
                                <h4></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <h3></h3>
                        <p></p>
                        <div class="media">
                            <div class="d-flex">
                            </div>
                            <div class="media-body">
                                <h4> </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Testimonials Slider Area =================-->

    <br>
    &nbsp;

    <!--================Footer Area =================-->
    <footer class="footr_area">
        <div class="footer_widget_area">
            <div class="container">
                <div class="row footer_widget_inner">
                    <div class="col-lg-4 col-sm-6">
                        <aside class="f_widget f_about_widget">

                        </aside>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <aside class="f_widget f_insta_widget">
                            <div class="f_title">
                            </div>
                            <ul>

                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <aside class="f_widget f_subs_widget">
                            <div class="f_title">
                            </div>
                            <div class="input-group">
                                <span class="input-group-btn">
                                </span>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_copyright">
            <div class="container">
                <div class="float-sm-left">
                    <h5>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        تاريخ الاصدار &copy;<script>
                            document.write(new Date().getFullYear());

                        </script> حقوق محفوظة | صنع بحب <i class="fa fa-heart-o" aria-hidden="true"></i> <a
                            href="https://www.seu.edu.sa/sites/ar/Pages/main.aspx" target="_blank">مشروع تخرج</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </h5>
                </div>
                <div class="float-sm-right">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <!--================End Footer Area =================-->


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
    <script
        src="{{ asset('homepags/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}">
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
