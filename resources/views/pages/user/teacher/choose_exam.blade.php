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
                    action="{{ route('get_exam_data') }}">
                    @csrf
                    <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>
                    <span class="section">عرض الاختبارات</span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">اسم المادة <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select @if (count($teacher_subjects)==0) disabled @endif id='subject' name="subject"
                                class="form-control">
                                <option disabled selected>الرجاء اختيار اسم المادة</option>
                                @if (count($teacher_subjects) > 0)
                                @foreach ($teacher_subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                                @else
                                <option selected> لا يوجد مواد متاحة حالياً</option>
                                @endif
                            </select>
                        </div>
                    </div>


                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">رقم الاختبار <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            @php
                            $hw_no = ['الاول', 'الثاني', 'الثالث', 'النهائي'];
                            @endphp
                            <select required name="exam_number" class="form-control">
                                <option value disabled selected>الرجاء اختيار رقم الاختبار</option>
                                @foreach ($hw_no as $number)
                                <option value="{{ $number }}">{{ $number }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-success">التالي</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection