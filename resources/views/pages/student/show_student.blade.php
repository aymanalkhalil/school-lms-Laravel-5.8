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
                    <span class="section">البيانات الشخصية</span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">الرقم الاكاديمي
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="{{ $id->student['rakam_akdemi'] }}" class="form-control col-md-7 col-xs-12"
                                type="text" disabled>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الاسم
                            الرباعي
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" value="{{ $id->name }}" class="form-control col-md-7 col-xs-12" type="text"
                                disabled>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">الايميل</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="{{ $id->email }}" type="email" id="email" name="email" required="required"
                                class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">رقم الهوية الوطنية او جواز
                            السفر </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input value="{{ $id->National_ID }}" type="number" required="required"
                                class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="password" class="control-label col-md-3">المدينة و المنطقة</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input disabled id="password" name="city" type="text" value="{{ $id->student->city }}"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">رقم الجوال
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input disabled value="{{ $id->phone }}" required="required"
                                class="form-control col-md-7 col-xs-12" disabled>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">الشعبة</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select disabled class="form-control">
                                <?php
                             use App\Section; $Facultie = Section::where('id',$id->sana)->first();?>
                                <option>
                                    @if ($Facultie)
                                    {{ $Facultie->name }}
                                    @else
                                    لقد قمت بمسح الشعبة
                                    @endif
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">الدرجة العلمية</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select disabled name="years" class="form-control">
                                <option>{{ $id->years }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sana_drasia">البرنامج <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="{{ $id->student->sana_drasia }}" name="sana_drasia"
                                required="required" data-validate-length-range="8,20"
                                class="form-control col-md-7 col-xs-12" readonly>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">تاريخ الميلاد </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input disabled type="date" value="{{ $id->date }}" class="form-control has-feedback-left"
                                name="date">
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">ملاحظات </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea disabled class="form-control col-md-7 col-xs-12">{{ $id->note }}</textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <span class="section">في حالة الطوارئ سيتم الاتصال بـ </span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">الاسم </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input disabled class="form-control col-md-7 col-xs-12"
                                value="{{ $id->student->name_arabda }}" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">رقم الجوال </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input disabled value="{{ $id->student->phone_arabda }}"
                                class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">صلة القرابة</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select disabled class="form-control">
                                <option>{{ $id->student->arabda }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection