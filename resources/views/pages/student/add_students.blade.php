@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal form-label-left" method="POST" action="/add_students">
                    @csrf
                    <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>
                    <span class="section">البيانات الشخصية</span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الاسم الرباعي <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                data-validate-words="2" name="name" placeholder="الاسم الرباعي" required="required"
                                type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">الايميل <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" id="email" name="email" required="required"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">رقم الهوية الوطنية او جواز
                            السفر <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" id="number" name="National_ID" required="required"
                                data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="password" class="control-label col-md-3">المدينة و المنطقة</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="password" name="city" type="text" data-validate-length="6,8"
                                class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">رقم الجوال <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="tel" id="telephone" name="phone" required="required"
                                data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">تسجيل الطالبة في <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 text-center">
                            <input type="radio" name="course" id="course" value="course">
                            <label for="course">دورة</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="course" id="diploma" value="diploma">
                            <label for="diploma">برنامج او دبلوم</label>
                        </div>
                        @if ($errors->has('course'))
                        <span class="invalid-feedback control-label" role="alert">
                            <strong class='required'>{{ $errors->first('course') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="item form-group" id='diploma_section'>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sana">البرنامج او
                            الدبلوم
                            <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select @if (count($sana_drsia)==0 ) disabled @endif name="sana_drsia" class="form-control">
                                <option disabled selected> يرجى اختيار الدبلوم و البرنامج</option>
                                @if (count($sana_drsia) > 0 )
                                @foreach ($sana_drsia as $sana_drsia)
                                <option>{{ $sana_drsia->name }}</option>
                                @endforeach
                                @else
                                <option selected> لا يوجد برامج او دبلومات حالياً</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="item form-group course_section">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sana">الدورات
                            <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select @if (count($course)==0 ) disabled @endif name="courses" class="form-control">
                                <option disabled selected> الرجاء اختيار الدورة</option>
                                @if (count($course) > 0 )
                                @foreach ($course as $courses)
                                <option value="{{ $courses->id }}">{{ $courses->name }}</option>
                                @endforeach
                                @else
                                <option selected> لا يوجد دورات متاحة حالياً</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">المؤهل العلمي</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="years" class="form-control">
                                <option></option>
                                <?php $years = array('دبلوم','بكالوريس','ماجستير','دكتواره','ثانوي' );?>
                                @foreach ($years as $year)
                                <option>{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">تاريخ الميلاد <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" class="form-control has-feedback-left" name="date">
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">ملاحظات <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="textarea" required="required" name="note"
                                class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">كلمة المرور <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">اعد كتابة كلمة المرور
                            <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required>
                        </div>
                    </div>
                    <span class="section">في حالة الطوارئ سيتم الاتصال بـ </span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الاسم <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                data-validate-words="2" name="name_arabda" placeholder="الاسم " required="required"
                                type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">رقم الجوال <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="tel" id="telephone" name="phone_arabda" required="required"
                                data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">صلة القرابة</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="arabda" class="form-control">

                                <?php $arabdas = array('أب','أم','أخ او أخت','زوج او زوجة','اخرى' );?>
                                @foreach ($arabdas as $arabda)
                                <option>{{ $arabda }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-success">حفظ وارسال</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(function(){
 $("#diploma_section").hide();
 $(".course_section").hide();
$('input:radio[name=course]').change(function() {
var checked_radio=$("input[name='course']:checked").val()
if(checked_radio=="course"){
$(".course_section").show();
$("#diploma_section").hide();
}else{

$("#diploma_section").show();
$(".course_section").hide();
}
});
    });
</script>
@endsection
