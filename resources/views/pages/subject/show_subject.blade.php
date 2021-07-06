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
                <form class="form-horizontal form-label-left">
                    <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>
                    <span class="section">بيانات المادة</span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> اسم
                            المادة <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input disabled id="name" value="{{ $id->name }}" class="form-control col-md-7 col-xs-12"
                                data-validate-length-range="6" data-validate-words="2" name="subject"
                                placeholder=" اسم المادة" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> الفصل
                            الدراسي <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" disabled value="{{ $id->academic_year }}"
                                class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                data-validate-words="2" name="academic_year" placeholder=" الفصل الدراسي "
                                required="required" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> اسناد الى المعلمة
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select disabled name="name_teacher" class="form-control">
                                <option>{{ $id->user->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">المادة تدرس في الشعبة
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select disabled name="name_teacher" class="form-control">
                                <option>{{ $id->section->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">ملاحظات <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea disabled id="textarea" required="required" name="nota"
                                class="form-control col-md-7 col-xs-12">{{ $id->nota }}</textarea>
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
