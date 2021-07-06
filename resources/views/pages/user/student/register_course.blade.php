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
                <form class="form-horizontal form-label-left" enctype="multipart/form-data" method="POST"
                    action="{{ route('register_course') }}">
                    @csrf
                    <span class="section">التسجيل</span>
                    <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>


                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">هل تريدين التسجيل في
                            <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 text-center">
                            <input type="radio" name="course" id="course" value="course">
                            <label for="course">دورة</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="course" id="diploma" value="diploma">
                            <label for="diploma">برنامج او دبلوم</label>
                            @if ($errors->has('course'))
                            <span class="invalid-feedback control-label" role="alert">
                                <strong class='required'>{{ $errors->first('course') }}</strong>
                            </span>
                            @endif
                        </div>

                    </div>

                    <div class="item form-group diploma_section">
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
                    <div class="item form-group diploma_section">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">وصل الدفع
                            <span class="required">ليست اجبارية</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <input type="file" name="diploma_bill" class="form-control">
                        </div>

                    </div>


                    <div class="item form-group course_section">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">الدورات
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


                    <div class="item form-group course_section">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">وصل الدفع
                            <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <input type="file" name="course_bill" class="form-control">
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
 $(".diploma_section").hide();
 $(".course_section").hide();
$('input:radio[name=course]').change(function() {
var checked_radio=$("input[name='course']:checked").val()
if(checked_radio=="course"){
$(".course_section").show();
$(".diploma_section").hide();
}else{

$(".diploma_section").show();
$(".course_section").hide();
}
});
    });
</script>
@endsection