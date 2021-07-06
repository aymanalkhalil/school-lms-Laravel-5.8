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
                <form class="form-horizontal form-label-left" method="POST" enctype="multipart/form-data"
                    action="{{ route('update_assignment',$id->id) }}">
                    <input type="hidden" name="id" value="{{ $id->id }}">
                    @csrf
                    @method('PUT')
                    <span class="section"> بيانات الواجب</span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">اسم المادة <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select disabled name="subject" class="form-control">
                                <option selected value="{{ $id->id }}">{{ $id->subject->name }}</option>

                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">رقم الشعبة <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select disabled name="section" class="form-control">
                                <option value="{{ $id->id }}">{{ $id->section->name }}</option>

                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">تاريخ التسليم النهائي
                            <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" readonly class="form-control has-feedback-left"
                                value="{{ $id->final_date }}" name="final_date">
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">وقت التسليم النهائي
                            <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="time" readonly class="form-control has-feedback-left" @php
                                $date=date('H:i',strtotime($id->final_time))
                            @endphp
                            value="{{ $date }}" name="final_time" >
                            <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">الواجب <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <a class="btn btn-success" href="{{asset('assignments/' . $id->file)}}">تحميل
                                الملف <i class="fas fa-download"></i></a>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">ملاحظات <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="textarea" name="note" class="form-control col-md-7 col-xs-12"
                                readonly>{{ $id->note }}</textarea>
                        </div>
                    </div>



                    <div class="ln_solid"></div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
