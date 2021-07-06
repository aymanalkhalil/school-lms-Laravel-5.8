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
                    <form class="form-horizontal form-label-left" method="POST" action="/add_subject">
                        @csrf
                        <p>الرجاء كتابة التأكد من ادخال البيانات بالشكل الصحيح</p>
                        <span class="section">بيانات المادة</span>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> اسم
                                المادة <span class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                    data-validate-words="2" name="subject" autocomplete="off" placeholder=" اسم المادة"
                                    required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> الفصل
                                الدراسي <span class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                    data-validate-words="2" name="academic_year" autocomplete="off"
                                    placeholder=" الفصل الدراسي " required="required" type="text">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> البرنامج
                                <span class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="sana_drsia" @if (count($sana_drsia) == 0) disabled @endif class="form-control">
                                    @if (count($sana_drsia) == 0)
                                        <option>من فضلك أضف البرنامج اولاً </option>
                                    @else
                                        <option></option>
                                    @endif
                                    @foreach ($sana_drsia as $sana_drsia)
                                        <option value="{{ $sana_drsia->id }}">{{ $sana_drsia->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> المادة ستدرس في الشعبة
                                <span class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="section_id" @if (count($sections) == 0) disabled @endif class="form-control">
                                    @if (count($sections) == 0)
                                        <option>من فضلك أضف شعبة اولاً </option>
                                    @else
                                        <option></option>
                                    @endif
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"> اسناد الى المعلمة
                                <span class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="name_teacher" @if (count($teachers) == 0) disabled @endif class="form-control">
                                    @if (count($teachers) == 0)
                                        <option>من فضلك أضف معلمة اولاً </option>
                                    @else
                                        <option></option>
                                    @endif
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
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
                                    class="form-control col-md-7 col-xs-12"></textarea>
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
