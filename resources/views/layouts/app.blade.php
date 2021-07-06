<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('build/images/favicon.ico') }}" type="image/ico" />
    <title>اكاديمية البرهان</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    @yield('css')
</head>
<!-- /header content -->

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col hidden-print">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/home" class="site_title"><i class="fa fa-building"></i> <span>اكاديمية
                                البرهان</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{ asset('build/images/img.jpg') }}" class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>لوحة التحكم</span>
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->
                    <br />
                    <?php
                    $moderator_view = Auth::user()->permission->moderator_view != 'disable';
                    $moderator_add = Auth::user()->permission->moderator_add != 'disable';
                    $teacher_view = Auth::user()->permission->teacher_view != 'disable';
                    $teacher_add = Auth::user()->permission->teacher_add != 'disable';
                    $student_view = Auth::user()->permission->student_view != 'disable';
                    $student_add = Auth::user()->permission->student_add != 'disable';
                    $subject_add = Auth::user()->permission->subject_add != 'disable';
                    $subject_view = Auth::user()->permission->subject_view != 'disable';
                    $time_view = Auth::user()->permission->time_view != 'disable';
                    $time_add = Auth::user()->permission->time_add != 'disable';
                    $facultie_add = Auth::user()->permission->facultie_add != 'disable';
                    $facultie_view = Auth::user()->permission->facultie_view != 'disable';
                    $score_add = Auth::user()->permission->score_add != 'disable';
                    $score_view = Auth::user()->permission->score_view != 'disable';
                    $absent_view = Auth::user()->permission->absent_view != 'disable';
                    $absent_add = Auth::user()->permission->absent_add != 'disable';
                    $sana_drsia_add = Auth::user()->permission->sana_drsia_add != 'disable';
                    $sana_drsia_view = Auth::user()->permission->sana_drsia_view != 'disable';
                    $finance = Auth::user()->permission->finance != 'disable';
                    $register_time = Auth::user()->permission->register_time != 'disable';
                    ?>
                    {{-- <span class="badge bg-red "> جديد </span> --}}
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>اكاديمية البرهان</h3>
                            <ul class="nav side-menu">
                                {{-- @if (Auth::user()->role == 1 && !Request::is('instruction_exam/*' || 'make_exam/*')) --}}
                                <li><a href="/home"><i class="fa fa-home"></i> الرئيسيه</a></li>

                                {{-- @endif --}}
                                @if (Auth::user()->role == 3)

                                    <li> <a href="{{ route('register_time') }}"><i class="fa fa-clock">
                                            </i>
                                            وقت التسجيل
                                        </a>
                                    </li>

                                @endif
                                @if (Auth::user()->role >= 3)

                                    @if ($student_add || $student_view || $teacher_add || $teacher_view || $moderator_add || $moderator_view)
                                        @if (!$finance)

                                            <li>

                                                <a><i class="fa fa-users"></i> اضافة مستخدم <span
                                                        class="fa fa-chevron-down"></span></a>
                                                <ul class="nav child_menu">

                                                    @if ($moderator_view && !$finance)
                                                        <li><a href="/moderators/view_all">عرض
                                                                المشرفات</a></li>
                                                    @endif
                                                    @if ($moderator_add)
                                                        <li><a href="/add_moderators">اضافة مشرفة</a></li>
                                                        <li><a href="{{ route('add_finance') }}">اضافة موظف
                                                                المالية</a>
                                                        </li>
                                                        <li><a href="{{ route('view_employees') }}">عرض الموظفيين
                                                                الماليين
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if ($teacher_view && !$finance)
                                                        <li><a href="/teachers/view_all">عرض المعلمات</a></li>
                                                    @endif
                                                    @if ($teacher_add)
                                                        <li><a href="/add_teachers">اضافة معلمة</a></li>
                                                    @endif
                                                    @if ($student_view && !$finance)
                                                        <li><a href="/students/view_all">عرض الطالبات(الدبلومات)
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="/students/view_all_courses">عرض الطالبات
                                                                (الدورات)
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if ($student_add)
                                                        <li><a href="/add_students">اضافة طالبة</a></li>
                                                    @endif

                                                </ul>

                                            </li>
                                        @endif
                                    @endif
                                    @if ($subject_view || $subject_add)
                                        <li><a><i class="fa fa-desktop"></i> المواد<span
                                                    class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                @if ($subject_view)
                                                    <li><a href="/subject/view_all">عرض المواد</a></li>
                                                @endif
                                                @if ($subject_add)
                                                    <li><a href="/add_subject">اضافة مادة</a></li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                    @if ($time_view || $time_add || $facultie_add || $facultie_view)
                                        <li><a><i class="fa fa-table"></i> الجدول الدراسي <span
                                                    class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                @if ($time_view)
                                                    <li><a href="/time/view_all">عرض الجداول</a></li>
                                                @endif
                                                @if ($time_add)
                                                    <li><a href="/add_time">اضافة للجدول</a></li>
                                                @endif
                                                @if ($facultie_add)
                                                    <li><a href="/add_faculties"> اضافة شعبة</a></li>
                                                @endif
                                                @if ($facultie_view)
                                                    <li><a href="/facultie/view_all"> عرض شعبة</a></li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                    @if ($score_view || $score_add)
                                        <li><a><i class="fa fa-bar-chart-o"></i> النتائج <span
                                                    class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                @if ($score_view)
                                                    <li><a href="/scores/view_all">عرض النتائج</a></li>
                                                @endif
                                                @if ($score_add)
                                                    <li><a href="/add_scores">اضافة نتائج</a></li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                    @if ($absent_view || $absent_add)
                                        <li><a><i class="fa fa-clone"></i>التحضير <span
                                                    class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                @if ($absent_view)
                                                    <li><a href="/absent/view_all">عرض الحضور</a></li>
                                                @endif
                                                @if ($absent_add)
                                                    <li><a href="/add_absent">اضافة حضور</a></li>
                                                @endif
                                            </ul>
                                        </li>
                                    @endif
                                    @if ($sana_drsia_add || $sana_drsia_view)
                                        <li><a><i class=" fas fa-ad"> </i> الاعلانات <span
                                                    class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                @if ($sana_drsia_add)
                                                    <li><a href="{{ route('add_adv') }}">اضافة اعلانات
                                                            البرامج</a>
                                                    <li><a href="{{ route('view_all_adv') }}">عرض اعلانات
                                                            البرامج</a>
                                                    </li>

                                                @endif

                                            </ul>
                                        </li>
                                        <li><a><i class="fa fa-plus"></i>البرامج التعليمية <span
                                                    class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                @if ($sana_drsia_add)
                                                    <li><a href="/sana_drsia">اضافة برنامج او دبلوم</a></li>
                                                    <li><a href="/courses">اضافة دورات</a></li>


                                        </li>

                                    @endif
                                    @if ($sana_drsia_view)
                                        <li><a href="/sana_drsia/view_all">عرض البرامج والدبلومات</a>
                                        </li>
                                    @endif
                                    @if ($sana_drsia_view)
                                        <li><a href="/courses/view_all">عرض الدورات </a></li>
                                    @endif

                            </ul>
                            </li>
                            <li><a href="{{ route('employment_requests') }}"><i class="fas fa-ad"> </i> طلبات
                                    التوظيف</a></li>
                            @endif



                            @endif
                            @if ($finance && $student_view && $teacher_view && $moderator_view)

                                <li>
                                    <a><i class="fa fa-money"></i> المالية <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('add_moderator_salaries') }}">اضافة رواتب الموظفين</a>
                                        </li>
                                        <li><a href="{{ route('add_teacher_salaries') }}">اضافة رواتب اعضاء هيئة
                                                التدريس</a>
                                        </li>
                                        <li><a href="{{ route('finance_management') }}">الادارة المالية</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-money"></i> مالية الطالبات <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="/students/view_all">عرض الطالبات(الدبلومات) </a>
                                        </li>
                                        <li>
                                            <a href="/students/view_all_courses">عرض الطالبات (الدورات)
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif


                            @if (Auth::user()->role == 1)
                                @if (!Request::is('make_exam/*'))

                                    <li>
                                        <a href="{{ route('register_internal') }}"><i class="fa fa-user"></i>
                                            التسجيل</a>
                                    </li>


                                    <li>
                                        <a href="{{ route('my_messages') }}"><i class="fa fa-inbox"></i>الرسائل</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('show_my_registered_diplome') }}"><i
                                                class="fa fa-table"></i>
                                            البرامج المسجلة </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('show_my_diplome') }}"><i class="fa fa-table"></i>
                                            مقررات
                                            الدبلوم</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('show_my_courses') }}"><i class="fa fa-table"></i>
                                            الدورات</a>
                                    </li>

                                    <li>
                                        <a href="{{ route('show_my_homeworks') }}"><i class="fa fa-file"></i>
                                            الواجبات</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('my_exams') }}"><i class="fa fa-list"></i>
                                            الاختبارات</a>
                                    </li>
                                    <li>
                                        <a href="/viwe/student/time"><i class="fa fa-table"></i> الجدول
                                            الدراسي</a>
                                    </li>
                                    <li>
                                        <a href="/viwe/student/scores"><i class="fa fa-bar-chart-o"></i>
                                            النتائج</a>
                                    </li>
                                @endif
                            @endif
                            @if (Auth::user()->role == 2)
                                <li>
                                    <a href="/view/teacher/time"><i class="fa fa-table"></i> الجدول الدراسي</a>
                                </li>
                                <li>
                                    <a href="{{ route('teacher_inbox') }}"><i class="fa fa-inbox"></i>رسائل
                                        الطالبات</a>
                                </li>
                                <li>
                                    <a href="/view/teacher/student"><i class="fa fa-user"></i> طالباتي</a>
                                </li>
                                <li><a><i class="fa fa-list"></i> اضافة واجبات <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <a href="/add_assignment"> اضافة واجبات</a>
                                        </li>
                                        <li>
                                            {{-- <a href="/show_assignment"> عرض الواجبات</a> --}}
                                            <a href="{{ route('choose_subject_hw_no') }}"> عرض الواجبات</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('choose_subject_assignment') }}">عرض الواجبات
                                                المرفقة من
                                                الطالبات</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-list"></i> اضافة اختبارات <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li>
                                            <a href="{{ route('add_exam') }}"> اضافة اختبار</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('show_exams') }}"> عرض الاختبارات</a>
                                        </li>

                                    </ul>
                                </li>
                                @if ($absent_view || $absent_add)
                                    <li><a><i class="fa fa-clone"></i>التحضير <span
                                                class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            @if ($absent_view)
                                                <li><a href="/absent/view_all">عرض الحضور</a></li>
                                            @endif
                                            @if ($absent_add)
                                                <li><a href="/add_absent">اضافة حضور</a></li>
                                            @endif
                                        </ul>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('choose_subject_scores') }}"><i class="fa fa-user"></i>
                                        نتائج
                                        الطالبات</a>
                                </li>

                            @endif
                            </ul>
                        </div>


                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    @if (Auth::user()->role == 1)

                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="إعدادت">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title=" شاشة كاملة"
                                onclick="toggleFullScreen();">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="تأمين" class="lock_btn">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="خروج" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                href="{{ route('logout') }}">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                    @endif
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav hidden-print">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="{{ asset('build/images/img.jpg') }}" alt="">{{ Auth::user()->name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">

                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out pull-right"></i>
                                            خروج
                                        </a>
                                    </li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>


                        </ul>

                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <!-- /header content -->

            <!-- بداية التسجل -->

            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title"></div>
                    <div class="clearfix"></div>
                    @include('layouts.error')
                    @yield('content')
                </div>
            </div>


            <!-- /نهاية التسجيل -->





            <!-- footer content -->
            <footer class="hidden-print">
                <div class="pull-left">
                    طور بحب <a href=> ❤ مشروع تخرج</a> | بإشراف أ. نهله الركبان

                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>
    <div id="lock_screen">
        <table>
            <tr>
                <td>
                    <div class="clock"></div>
                    <span class="unlock">
                        <span class="fa-stack fa-5x">
                            <i class="fa fa-square-o fa-stack-2x fa-inverse"></i>
                            <i id="icon_lock" class="fa fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                    </span>
                </td>
            </tr>
        </table>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('vendors/iCheck/icheck.min.js') }}"></script>

    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>

    <script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Chart.js -->
    <script src="{{ asset('vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- jQuery Sparklines -->
    <script src="{{ asset('vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('vendors/DateJS/build/production/date.min.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('build/js/custom.min.js') }}"></script>

    @yield('script')

</body>

</html>
