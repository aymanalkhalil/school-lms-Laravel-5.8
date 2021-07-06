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
                <form class="form-horizontal form-label-left" method="POST" action="/update/{{ $id->id }}/subject">
                    @csrf
                    @method('put')
                    <p>الرجاءالتأكد من ادخال البيانات بالشكل الصحيح</p>
                    <span class="section">بيانات المادة</span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> اسم
                            المادة <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" value="{{ $id->name }}" class="form-control col-md-7 col-xs-12"
                                data-validate-length-range="6" data-validate-words="2" name="subject"
                                placeholder=" اسم المادة" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> الفصل
                            الدراسي <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" value="{{ $id->academic_year }}" class="form-control col-md-7 col-xs-12"
                                data-validate-length-range="6" data-validate-words="2" name="academic_year"
                                placeholder=" الفصل الدراسي " required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> البرنامج
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="sana_drsia" class="form-control">
                                <option></option>
                                @foreach ($sana_drsia as $sana_drsia)
                                <option value="{{ $sana_drsia->id }}" @if ($id->sana_drsia_id == $sana_drsia->id
                                    )selected @endif>{{ $sana_drsia->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> اسناد الى المعلمة
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="name_teacher" class="form-control">
                                <option></option>
                                @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}" @if ($id->user_id == $teacher->id )selected
                                    @endif>{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">المادة ستدرس في الشعبة
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="section_id" class="form-control">
                                <option></option>
                                @foreach ($sections as $section)
                                <option value="{{ $section->id }}" @if ($id->section->id == $section->id )selected
                                    @endif>{{ $section->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">ملاحظات <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="textarea" required="required" name="nota"
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
