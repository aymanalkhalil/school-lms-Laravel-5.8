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
                    <form class="form-horizontal form-label-left" method="POST"
                        action="/update/{{ $id->id }}/sana_drsia">
                        @csrf
                        @method('put')
                        <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">اسم البرنامج <span
                                    class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                    data-validate-words="2" name="name" placeholder="اسم البرنامج " required="required"
                                    type="text" value="{{ $id->name }}">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> اتاحة التسجيل<span
                                    class="required"> </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12 ">
                                <label class="" for="yes"> نعم
                                    <input id="yes" name="available" {{ $id->available == 1 ? 'checked' : '' }}
                                        value="yes" type="radio"> &nbsp;

                                </label>
                                <label class="" for="no"> لا
                                    <input id="no" name="available" {{ $id->available == 0 ? 'checked' : '' }} value="no"
                                        type="radio"> &nbsp;
                                </label>
                            </div>
                        </div>
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
