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

                        <li class="nav-item"><a class="nav-link" style="color:darkgoldenrod" href="login">تسجيل
                                الدخول</a></li>
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
                                <li class="nav-item"><a class="nav-link" href="diploma_m">الدبلوم العالي للمديرات</a>
                                </li>
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


    <!--================Slider Area =================-->
    <section class="main_slider_area">
        <div id="main_slider" class="rev_slider" data-version="5.3.1.6">
            <ul>
                <li data-index="rs-1587" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                    data-rotate="0" data-saveperformance="off" data-title="Creative" data-param1="01" data-param2=""
                    data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                    data-param9="" data-param10="" data-description="">
                    <!-- LAYER NR. 1 -->
                    <div class="slider_text_box">
                        <div class="tp-caption tp-resizeme first_text"
                            data-x="['right','right','right','right','15','center']" data-hoffset="['0','80','80','0']"
                            data-y="['top','top','top','top']" data-voffset="['400','400','400','250','180','180']"
                            data-fontsize="['72','72','72','50','50','30']"
                            data-lineheight="['82','82','82','62','62','42']" data-width="['none']" data-height="none"
                            data-whitespace="nowrape" data-type="text" data-responsive_offset="on"
                            data-frames="[{&quot;delay&quot;:15,&quot;speed&quot;:1500,&quot;frame&quot;
                            :&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                            data-textAlign="['right','right','right','right','right','center']">مرحبا بكم <br />
                            اكاديميةالبرهان </div>

                        <div class="tp-caption tp-resizeme secand_text"
                            data-x="['right','right','right','right','15','center']" data-hoffset="['0','80','80','0']"
                            data-y="['top','top','top','top']" data-voffset="['575','575','575','400','320','300']"
                            data-fontsize="['24','24','24','18','16','16']"
                            data-lineheight="['36','36','36','26','26','26']"
                            data-width="['none','none','none','none','none']" data-height="none"
                            data-whitespace="nowrape" data-type="text" data-responsive_offset="on"
                            data-transform_idle="o:1;"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                            data-textAlign="['right','right','right','right','right','right']">
                        </div>

                        <div class="tp-caption tp-resizeme" data-x="['right','right','right','right','15','center']"
                            data-hoffset="['0','80','80','0']" data-y="['top','top','top','top']"
                            data-voffset="['670','670','670','480','370','350']" data-fontsize="['14','14','14','14']"
                            data-lineheight="['46','46','46','46']" data-width="none" data-height="none"
                            data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                        </div>
                        <div class="tp-caption tp-resizeme single_img"
                            data-x="['right','right','right','right','right','right']" data-hoffset="['0','0','0','0']"
                            data-y="['top','top','top','top']" data-voffset="['180','180','180','180','0']"
                            data-fontsize="['65','65','60','40','25']" data-lineheight="['75','75','75','50','35']"
                            data-width="['485','485','485','485','485']" data-height="none" data-whitespace="normal"
                            data-type="text" data-responsive_offset="on"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                            data-textAlign="['right','right','right','right','right','center']">
                        </div>
                    </div>
                </li>
                <li data-index="rs-1588" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                    data-rotate="0" data-saveperformance="off" data-title="Creative" data-param1="01" data-param2=""
                    data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                    data-param9="" data-param10="" data-description="">
                    <!-- LAYERS -->
                    <!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="slider_text_box">
                        <div class="tp-caption tp-resizeme first_text"
                            data-x="['right','right','right','right','15','center']" data-hoffset="['0','80','80','0']"
                            data-y="['top','top','top','top']" data-voffset="['400','400','400','250','180','180']"
                            data-fontsize="['72','72','72','50','50','30']"
                            data-lineheight="['82','82','82','62','62','42']" data-width="['none']" data-height="none"
                            data-whitespace="nowrape" data-type="text" data-responsive_offset="on"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                            data-textAlign="['right','right','right','right','right','center']">لتدريب وتأهيل معلمات
                            <br />وموظفات الدور النسائي
                        </div>

                        <div class="tp-caption tp-resizeme secand_text"
                            data-x="['right','right','right','right','15','center']" data-hoffset="['0','80','80','0']"
                            data-y="['top','top','top','top']" data-voffset="['575','575','575','400','320','300']"
                            data-fontsize="['24','24','24','18','16','16']"
                            data-lineheight="['36','36','36','26','26','26']"
                            data-width="['none','none','none','none','none']" data-height="none"
                            data-whitespace="nowrape" data-type="text" data-responsive_offset="on"
                            data-transform_idle="o:1;"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                            data-textAlign="['right','right','right','right','right','center']">
                        </div>

                        <div class="tp-caption tp-resizeme" data-x="['right','right','right','right','15','center']"
                            data-hoffset="['0','80','80','0']" data-y="['top','top','top','top']"
                            data-voffset="['670','670','670','480','370','350']" data-fontsize="['14','14','14','14']"
                            data-lineheight="['46','46','46','46']" data-width="none" data-height="none"
                            data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                        </div>
                        <div class="tp-caption tp-resizeme single_img"
                            data-x="['right','right','right','right','right','right']" data-hoffset="['0','0','0','0']"
                            data-y="['top','top','top','top']" data-voffset="['180','180','180','180','0']"
                            data-fontsize="['65','65','60','40','25']" data-lineheight="['75','75','75','50','35']"
                            data-width="['485','485','485','485','485']" data-height="none" data-whitespace="normal"
                            data-type="text" data-responsive_offset="on"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                            data-textAlign="['right','right','right','right','right','center']">
                        </div>
                    </div>
                </li>
                <li data-index="rs-1589" data-transition="fade" data-slotamount="default" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                    data-rotate="0" data-saveperformance="off" data-title="Creative" data-param1="01" data-param2=""
                    data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8=""
                    data-param9="" data-param10="" data-description="">
                    <!-- LAYERS -->
                    <!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="slider_text_box">
                        <div class="tp-caption tp-resizeme first_text"
                            data-x="['right','right','right','right','15','center']" data-hoffset="['0','80','80','0']"
                            data-y="['top','top','top','top']" data-voffset="['400','400','400','250','180','180']"
                            data-fontsize="['72','72','72','50','50','30']"
                            data-lineheight="['82','82','82','62','62','42']" data-width="['none']" data-height="none"
                            data-whitespace="nowrape" data-type="text" data-responsive_offset="on"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                            data-textAlign="['right','right','right','right','right','center']">القيم الحاكمة
                            <br />"قيمنا"
                        </div>

                        <div class="tp-caption tp-resizeme secand_text"
                            data-x="['right','right','right','right','15','center']" data-hoffset="['0','80','80','0']"
                            data-y="['top','top','top','top']" data-voffset="['575','575','575','400','320','300']"
                            data-fontsize="['24','24','24','18','16','16']"
                            data-lineheight="['36','36','36','26','26','26']"
                            data-width="['none','none','none','none','none']" data-height="none"
                            data-whitespace="nowrape" data-type="text" data-responsive_offset="on"
                            data-transform_idle="o:1;"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                            data-textAlign="['right','right','right','right','right','center']">
                        </div>

                        <div class="tp-caption tp-resizeme" data-x="['right','right','right','right','15','center']"
                            data-hoffset="['0','80','80','0']" data-y="['top','top','top','top']"
                            data-voffset="['670','670','670','480','370','350']" data-fontsize="['14','14','14','14']"
                            data-lineheight="['46','46','46','46']" data-width="none" data-height="none"
                            data-whitespace="nowrap" data-type="text" data-responsive_offset="on"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]">
                        </div>
                        <div class="tp-caption tp-resizeme single_img"
                            data-x="['right','right','right','right','right','right']" data-hoffset="['0','0','0','0']"
                            data-y="['top','top','top','top']" data-voffset="['180','180','180','180','0']"
                            data-fontsize="['65','65','60','40','25']" data-lineheight="['75','75','75','50','35']"
                            data-width="['485','485','485','485','485']" data-height="none" data-whitespace="normal"
                            data-type="text" data-responsive_offset="on"
                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                            data-textAlign="['right','right','right','right','right','center']">
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!--================End Slider Area =================-->

    <!--================Feature Area =================-->
    <section class="feature_area">
        <div class="container">
            <div class="c_title">
                <img src="{{ asset('homepags/img/icon/title-icon.png') }}" alt="">
                <h6>موقع الاكاديمية</h6>
            </div>
            <div class="row feature_inner">
                <div class="col-lg-4 col-sm-6">
                    <div class="feature_item">
                        <div class="f_icon">
                            <img src="{{ asset('homepags/img/icon/f-icon-1.png') }}" alt="">
                        </div>
                        <h4>برامج</h4>
                        <p>يوجد العديد من البرامج المطروحة باذن الله في اكاديمية البرهان </p>
                        <a class="more_btn" href="#"> ...إقراء المزيد</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="feature_item">
                        <div class="f_icon">
                            <img src="{{ asset('homepags/img/icon/f-icon-2.png') }}" alt="">
                        </div>
                        <h4>اخبارنا</h4>
                        <p>تم بحمد الله تدشين موقع أكاديمية البرهان وذلك بتاريخ 4 شعبان لعام 1440 هـ ليصبح منصه تخدم
                            الكادر التعليمي باذن الله </p>
                        <a class="more_btn" href="#"> ...إقراء المزيد</a>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="feature_item">
                        <div class="f_icon">
                            <img src="{{ asset('homepags/img/icon/f-icon-3.png') }}" alt="">
                        </div>
                        <h4>اعلانات</h4>
                        <p>تعلن اكاديمية البرهان عن بدء التقديم لبرنامج رافـد ابتداء من تاريخ 8 شوال لعام 1440هـ نرجو من
                            الطالبات التسجيل من خلال الحضور للأكاديمية </p>
                        <a class="more_btn" href="#"> ...إقراء المزيد</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Feature Area =================-->


    <!--================The best slider Area =================-->
    <section class="best_3d_area">
        <div class="left_3d">
            <div class="shap_slider_inner owl-carousel">
                <div class="item">
                    <h4>“أكاديمية البرهان”</h4>
                    <p> إنطلاقا من النجاح الذي حققه معهد البرهان لإعداد معلمات القرآن الكريم التابع للمركز الخيري لتعليم
                        القرآن وعلومه في تأهيل وتدريب معلمات القرآن الكريم والمشرفات التعليميات والاداريات ومايقوم به من
                        مبادرات وطنية للتدريب والشراكه الفاعله مع بعض الجامعات ومدارس التعليم العام </p>
                    <div class="media">
                        <div class="media-body">
                            <h5> </h5>
                            <h6></h6>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <h4></h4>
                    <p> </p>
                    <div class="media">
                        <div class="media-body">
                            <h5> </h5>
                            <h6> </h6>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <h4></h4>
                    <p> </p>
                    <div class="media">
                        <div class="media-body">
                            <h5></h5>
                            <h6></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="right_text">
            <div class="right_text_inner">
                <div class="text_3d">
                    <div class="l_title">
                        <img src="{{ asset('homepags/img/icon/title-icon.png') }}" alt="">

                        <h6>أكاديميةالبرهان </h6>
                        <h3>أهداف أكاديميةالبرهان </h3>
                    </div>
                    <p>1- تقديم خدمة تدريبيةنوعية </p>
                    <p>2- بناء شراكة مجتمعية فاعله. </p>
                    <p>3- تطوير برامج التعليم عن بعد. </p>
                    <p>4- تنمية الموارد المالية الذاتية للاكاديمية. </p>
                </div>
                <div class="shap_mobile">
                    <img src="{{ asset('homepags/img/iphone4.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!--================End The best slider Area =================-->


    <!--================End Team People Area =================-->


    </div>
    </div>
    </section>
    <!--================End Team People Area =================-->

    <!--================Get in Touch Area =================-->
    <section class="get_in_touch_area">
        <div class="container">

        </div>
    </section>
    <!--================End Get in Touch Area =================-->

    <!--================Map Area =================-->
    <section class="world_map_area p_100">
        <div class="container">
            <div class="world_map_inner">
                <img src="{{ asset('homepags/img/world-map.png') }}" alt="">

                <div class="bd-callout">
                    <h3>يسعدنا تواصلكم على :</h3>
                    <p>المملكة العربية السعودية <br /> الرياض</p>
                    <h4><a>0114501490</a> <a>alburhan1435@gmail.com</a></h4>
                </div>
            </div>
        </div>
    </section>
    <!--================End Map Area =================-->

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
