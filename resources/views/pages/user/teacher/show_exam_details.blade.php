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
                    action="{{ route('update_exam', $id) }}">
                    @csrf
                    @method("PUT")
                    <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>
                    <span class="section">تعديل بيانات الاختبار</span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">اسم المادة <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select disabled @if (count($teacher_subjects)==0) disabled @endif id='subject'
                                name="subject" class="form-control">
                                <option disabled selected>الرجاء اختيار اسم المادة</option>
                                @if (count($teacher_subjects) > 0)
                                @foreach ($teacher_subjects as $subject)
                                <option value="{{ $subject->id }}"
                                    {{ $subject->id == $id->subject_id ? 'selected' : '' }}>
                                    {{ $subject->name }}</option>
                                @endforeach
                                @else
                                <option selected> لا يوجد مواد متاحة حالياً</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">رقم الشعبة <span
                                class="required">تلقائي</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select disabled id='section' readonly name="section" class="form-control">
                                <option value="{{ $id->section_id }}">{{ $id->section->name }}</option>
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
                            <select disabled required name="exam_number" readonly class="form-control">
                                <option value disabled selected>الرجاء اختيار رقم الاختبار</option>
                                @foreach ($hw_no as $number)
                                <option value="{{ $number }}" {{ $number == $id->exam_no ? 'selected' : '' }}>
                                    {{ $number }}
                                </option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> درجة الاختبار
                            <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="number" readonly name='grade' class="form-control has-feedback-left"
                                value="{{ $id->grade }}">
                            <span class="fa fa-mark-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">تاريخ الاختبار
                            <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" readonly class="form-control has-feedback-left"
                                value="{{ $id->exam_date }}" name="exam_date">
                            <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">وقت فتح الاختبار
                            <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="time" id='exam_open' readonly class="form-control has-feedback-left"
                                value="{{ $id->exam_open }}" name="exam_open">
                            <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="">وقت غلق الاختبار
                            <span class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="time" id='exam_close' readonly class="form-control has-feedback-left"
                                value="{{ $id->exam_close }}" name="exam_close">
                            <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>
                    <input type="hidden" name="exam_period" value="{{ $id->timer }}" id='result'>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for=""> مدة الاختبار
                            <span class="required">تلقائي</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id='result_convert' readonly class="form-control has-feedback-left"
                                value="{{ old('exam_close') }}">
                            <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>



                    <div class="ln_solid"></div>
                    {{-- <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" class="btn btn-success">حفظ وارسال</button>
                        </div>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(function() {

            var exam_open = $("#exam_open").val();
            var exam_close = $("#exam_close").val();
            var diff = (new Date("1970-1-1 " + exam_close) - new Date("1970-1-1 " + exam_open)) / 1000 / 60 / 60 *
                60;


            var hrs = Math.floor(diff / 60);
            var min = diff % 60;
            $("#result_convert").val(hrs + " ساعة و " + min + " دقيقة");
            $("#result").val(diff);


        });

</script>
@endsection