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
                <form class="form-horizontal form-label-left" method="POST" action="/update/{{ $id->id }}/student">
                    <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>
                    @csrf
                    @method('put')
                    <span class="section">البيانات الشخصية</span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الاسم
                            الرباعي <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" value="{{ $id->name }}" class="form-control col-md-7 col-xs-12"
                                data-validate-length-range="6" data-validate-words="2" name="name"
                                placeholder="الاسم الرباعي" required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">البريد الالكتروني
                            <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="{{ $id->email }}" type="email" id="email" name="email" required="required"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">رقم
                            الهوية الوطنية او جواز السفر <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="{{ $id->National_ID }}" type="number" id="number" name="National_ID"
                                required="required" data-validate-minmax="10,100"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="password" class="control-label col-md-3">المدينة و المنطقة</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="password" name="city" type="text" value="{{ $id->student->city }}"
                                data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">رقم
                            الجوال <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="{{ $id->phone }}" type="tel" id="telephone" name="phone" required="required"
                                data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">الدرجة العلمية
                            <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="years" class="form-control">
                                <option></option>
                                <?php $years = array('دبلوم','بكالوريس','ماجستير','دكتوراه','ثانوي' );?>
                                @foreach ($years as $year)
                                <option @if($id->years == $year )selected @endif>{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"> البرنامج<span class="required"> مطلوب
                            </span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="sana_drsia" class="form-control">
                                <option></option>
                                @if (count($sana_drsia) > 0 )
                                @foreach ($sana_drsia as $sana_drsia)
                                <option @if ($sana_drsia->name == $id->student->sana_drasia) selected
                                    @endif>{{ $sana_drsia->name }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">تاريخ الميلاد <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" value="{{ $id->date }}" class="form-control has-feedback-left"
                                name="date">
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">ملاحظات <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="textarea" required="required" name="note"
                                class="form-control col-md-7 col-xs-12">{{ $id->note }}</textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <span class="section">في حالة الطوارئ سيتم الاتصال بـ </span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الاسم <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                data-validate-words="2" value="{{ $id->student->name_arabda }}" name="name_arabda"
                                placeholder="الاسم " required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">رقم الجوال <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="tel" id="telephone" value="{{ $id->student->phone_arabda }}"
                                name="phone_arabda" required="required" data-validate-length-range="8,20"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">صلة القرابة</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="arabda" class="form-control">
                                <option></option>
                                <?php $arabdas = array('أب','أم','أخ او أخت','زوج او زوجة','اخرى' );?>
                                @foreach ($arabdas as $arabda)
                                <option @if($id->student->arabda == $arabda )selected @endif>{{ $arabda }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <span class="section">الحالة </span>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>فعال </th>
                                <th>موقوف </th>
                                <th>مفصول </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $status = array('enable','disable','stop' );?>
                            <tr>
                                @foreach ($status as $item)
                                <th><input type="radio" @if($id->student->status == $item ) checked @endif
                                    value="{{ $item }}" name="status"></th>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-success">حفظ وارسال</button>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal form-label-left" method="POST" action="/update/{{ $id->id }}/password">
                    <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>
                    @csrf
                    @method('put')
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">كلمة المرور
                        </label>
                        <div class="col-md-6">
                            <input id="password" type="password"
                                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">اعد كتابة كلمة المرور
                        </label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation">
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
