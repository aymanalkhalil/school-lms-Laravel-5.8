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
                        action="{{ route('put_grade', ['id' => $id, 'subject_id' => $subject_id, 'hw_num' => $hw_num]) }}">
                        @csrf
                        @method('PUT')
                        <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>
                        <span class="section">تقييم درجة الواجب</span>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">اسم الطالبة
                                <span class="required">مطلوب</span>
                            </label>
                            <input type="hidden" name="hw_number" value="{{ $id->hw_number }}">

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" readonly class="form-control has-feedback-left"
                                    value="{{ $id->user->name }}" name="">
                                <span class="fa fa-user form-control-feedback left"></span>
                            </div>
                        </div>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">الواجب المرفق
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <a class="btn btn-success" href="{{ asset('assignments_uploads/' . $id->file) }}">تحميل
                                    الملف <i class="fas fa-download"></i></a>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">ملاحظات الطالبة للواجب
                                المرفق
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea readonly name=""
                                    class="form-control col-md-7 col-xs-12">{{ empty($id->comment) ? 'لا يوجد ملاحظات ' : $id->comment }}</textarea>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">الدرجة

                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" min="0" name="mark" value="{{ !empty($id->mark) ? $id->mark : '' }}"
                                    class="form-control">
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-success">حفظ الدرجة</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
