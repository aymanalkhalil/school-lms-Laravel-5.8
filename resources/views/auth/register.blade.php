<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>اكاديمية البرهان </title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Styles -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrap-rtl/dist/css/bootstrap-rtl.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('build/css/custom.css') }}" rel="stylesheet">
    <style>
        .login_content form input[type="text"] {
            border-radius: 3px;
            box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;
            border: 1px solid #c5c7cb;
            color: #777;
            margin: 0 0 10px;
            width: 100%;
        }

        .login_content form input[type="number"] {
            border-radius: 3px;
            box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;
            border: 1px solid #c5c7cb;
            color: #777;
            margin: 0 0 10px;
            width: 100%;
        }

        .login_content form input[type="email"] {
            border-radius: 3px;
            box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;
            border: 1px solid #c5c7cb;
            color: #777;
            margin: 0 0 10px;
            width: 100%;
        }

        .login_content form input[type="tel"] {
            border-radius: 3px;
            box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;
            border: 1px solid #c5c7cb;
            color: #777;
            margin: 0 0 10px;
            width: 100%;
        }

        .login_content form input[type="password"] {
            border-radius: 3px;
            box-shadow: 0 1px 0 #fff, 0 -2px 5px rgb(0 0 0 / 8%) inset;
            border: 1px solid #c5c7cb;
            color: #777;
            margin: 0 0 10px;
            width: 100%;
        }

        html {
            background-color: #f7f7f7 !important;
        }

        body {
            background-color: #f7f7f7;
        }

        .img-circle.profile_img {
            width: 70%;
            background: #fff;
            margin-right: 0%;
            z-index: 1000;
            position: inherit;
            margin-top: 20px;
            border: 1px solid rgba(52, 73, 94, 0.44);
            padding: 4px;
        }

        .login_content {
            margin: 0 auto;
            padding: 25px 0 0;
            position: relative;
            text-align: center;
            text-shadow: 0 1px 0 #fff;
            min-width: 280px;
        }

        .login_wrapper {
            right: 0;
            margin: 0 auto;
            margin-top: 0%;
            max-width: 350px;
            position: relative;
        }

        .registration_form {
            position: absolute;
            top: 0;
            z-index: 21;
            opacity: 0;
            width: 100%
        }

    </style>
</head>

<body>
    <div>
        {{-- <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <a class="hiddenanchor" id="reset"></a> --}}

        <div class="login_wrapper">

            <div class="">
                <section class="login_content">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('success') }}
                        </div>
                    @endif
                    <form enctype="multipart/form-data" action="{{ route('register') }}" method="POST">
                        @csrf
                        <h1>إنشاء حساب طالب</h1>
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="name">الاسم الرباعي
                            </label>
                            <input type="text" name='name' value="{{ old('name') }}" placeholder="الاسم الرباعي"
                                class="form-control" autocomplete="off">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback control-label " role="alert">
                                    <strong class="required">{{ $errors->first('name') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="email">الايميل

                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                autocomplete="off">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback control-label " role="alert">
                                    <strong class='required'>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="email">رقم الهوية
                                الوطنية او
                                جواز السفر
                            </label>
                            <input type="number" min="0" name="national_id" value="{{ old('national_id') }}"
                                class="form-control" autocomplete="off">
                            @if ($errors->has('national_id'))
                                <span class="invalid-feedback control-label" role="alert">
                                    <strong class='required'>{{ $errors->first('national_id') }}</strong>
                                </span>
                            @endif

                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="madina">المدينة و
                                المنطقة
                            </label>
                            <input type="text" name="city" value="{{ old('city') }}" class="form-control"
                                autocomplete="off">
                            @if ($errors->has('city'))
                                <span class="invalid-feedback control-label" role="alert">
                                    <strong class='required'>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif


                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="email">رقم الجوال
                            </label>
                            <input type="tel" class="form-control" value="{{ old('phone') }}" name="phone"
                                data-validate-length-range="8,20" autocomplete="off">
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback control-label" role="alert">
                                    <strong class='required'>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="email">هل تريدين التسجيل
                            </label>
                            <input type="radio" name="course" id="course" value="course">
                            <label for="course">دورة</label>
                            &nbsp;&nbsp;
                            <input type="radio" name="course" id="diploma" value="diploma">
                            <label for="diploma">برنامج او دبلوم</label><br>
                            @if ($errors->has('course'))
                                <span class="invalid-feedback control-label" role="alert">
                                    <strong class='required'>{{ $errors->first('course') }}</strong>
                                </span>
                            @endif
                        </div>


                        <?php
                        $sana_drsia = App\Programme::where('available', 1)->get();
                        $course = App\Course::where('available', 1)->get();
                        ?>
                        <div class="form-group" id='diploma_section'>
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="sana">البرنامج او
                                الدبلوم
                                <span class="required">مطلوب</span>
                            </label>
                            <select @if (count($sana_drsia) == 0) disabled @endif name="sana_drsia" class="form-control">
                                <option disabled selected> يرجى اختيار الدبلوم و البرنامج</option>
                                @if (count($sana_drsia) > 0)
                                    @foreach ($sana_drsia as $sana_drsia)
                                        <option>{{ $sana_drsia->name }}</option>
                                    @endforeach
                                @else
                                    <option selected> لا يوجد برامج او دبلومات حالياً</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group course_section">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="sana">الدورات
                                <span class="required">مطلوب</span>

                            </label>
                            <select @if (count($course) == 0) disabled @endif name="courses" class="form-control">
                                <option disabled selected> الرجاء اختيار الدورة</option>
                                @if (count($course) > 0)
                                    @foreach ($course as $courses)
                                        <option value="{{ $courses->id }}">{{ $courses->name }}</option>
                                    @endforeach
                                @else
                                    <option selected> لا يوجد دورات متاحة حالياً</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group course_section">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="sana">وصل الدفع
                                <span class="required">مطلوب</span>

                            </label>
                            <input type="file" name="bill" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="qual">المؤهل العلمي
                            </label>
                            <select name="qualification" class="form-control">
                                <option disabled selected required>يرجى اختيار المؤهل العلمي</option>
                                <?php $years = ['دبلوم', 'بكالوريس', 'ماجستير', 'دكتواره', 'ثانوي']; ?>
                                @foreach ($years as $year)
                                    <option>{{ $year }}</option>
                                @endforeach

                            </select>
                            @if ($errors->has('qualification'))
                                <span class="invalid-feedback  control-label" role="alert">
                                    <strong class='required'>{{ $errors->first('qualification') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="dob">تاريخ الميلاد
                            </label>
                            <input type="date" name="dob" class="form-control">
                            @if ($errors->has('dob'))

                                <span class="invalid-feedback control-label" role="alert">
                                    <strong class='required'>{{ $errors->first('dob') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class=" form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="textarea">ملاحظات
                            </label>
                            <textarea placeholder="هل تعاني من مشاكل صحية؟ في حال لا قم بكتابة لا يوجد" name="note"
                                class="form-control">{{ old('note') }}</textarea>
                            @if ($errors->has('note'))
                                <span class="invalid-feedback control-label" role="alert">
                                    <strong class='required'>{{ $errors->first('note') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="password">كلمة المرور
                            </label>
                            <input type="password" value="{{ old('password') }}"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                name="password">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback  control-label" role="alert">
                                    <strong class='required'>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group ">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="password">اعد كتابة كلمة
                                المرور
                            </label>
                            <input type="password" value="{{ old('password_confirmation') }}" class="form-control"
                                name="password_confirmation">
                        </div>
                        <span class="section">في حالة الطوارئ سيتم الاتصال بـ </span>
                        <div class="item form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="name">الاسم </label>
                            <input class="form-control" value="{{ old('note') }}" data-validate-length-range="6"
                                data-validate-words="2" name="name_arabda" placeholder="الاسم" type="text"
                                autocomplete="off">
                            @if ($errors->has('name_arabda'))
                                <span class="invalid-feedback control-label" role="alert">
                                    <strong class='required'>{{ $errors->first('name_arabda') }}</strong>
                                </span>
                            @endif


                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="telephone">رقم الجوال
                            </label>
                            <input type="tel" name="phone_arabda" value="{{ old('note') }}"
                                data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12"
                                autocomplete="off">
                            @if ($errors->has('phone_arabda'))
                                <span class="invalid-feedback control-label" role="alert">
                                    <strong class='required'>{{ $errors->first('phone_arabda') }}</strong>
                                </span>
                            @endif

                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-12 col-sm-12 col-xs-12" for="email">صلة القرابة
                            </label>
                            <select name="arabda" class="form-control">

                                <?php $arabdas = ['أب', 'أم', 'أخ او أخت', 'زوج او زوجة', 'اخرى']; ?>
                                @foreach ($arabdas as $arabda)
                                    <option>{{ $arabda }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">تسجيل </button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">مسجل لدينا ؟
                                <a href="{{ route('login') }}" class="to_register">تسجيل الدخول</a>
                            </p>

                            <div class="clearfix"></div>
                            <br />


                        </div>
                    </form>
                </section>

            </div>



        </div>
    </div>


</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script>
    $(function() {
        $("#diploma_section").hide();
        $(".course_section").hide();

        $('input:radio[name=course]').change(function() {
            var checked_radio = $("input[name='course']:checked").val()
            if (checked_radio == "course") {
                $(".course_section").show();
                $("#diploma_section").hide();
            } else {
                $("#diploma_section").show();
                $(".course_section").hide();
            }
        });
    });

</script>
