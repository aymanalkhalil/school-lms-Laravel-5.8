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
                        action="{{ route('update_adv', $id->id) }}">
                        @csrf
                        @method('PUT')
                        <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>
                        <span class="section">تعديل اعلان البرنامج </span>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">اسم البرنامج <span
                                    class="required">مطلوب</span></label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="programme_id" class="form-control">

                                    @foreach ($programs as $_programs)
                                        <option value="{{ $_programs->id }}"
                                            {{ $_programs->id == $id->programme_id ? 'selected ' : '' }}>
                                            {{ $_programs->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">الفئة المستهدفة <span
                                    class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="email" name="target_audience" value="{{ $id->target_audience }}"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">الفترة <span
                                    class="required">مطلوب</span></label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="period" class="form-control">
                                    <option value="" disabled selected>الرجاء اختيار الفترة</option>

                                    <?php $period = ['صباحية', 'مسائية', 'صباحية ومسائية']; ?>
                                    @foreach ($period as $periods)
                                        <option {{ $periods == $id->period ? 'selected' : '' }}>{{ $periods }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">اليوم <span
                                    class="required">مطلوب</span></label>

                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <select name="day" class="form-control">
                                    <option value="" disabled selected>الرجاء اختيار اليوم</option>

                                    <?php $days = ['السبت', 'الاحد', 'الاثنين', 'الثلاثاء', 'الاربعاء',
                                    'الخميس', 'الجمعة']; ?>
                                    @foreach ($days as $day)
                                        <option value="{{ $day }}" {{ $day == $id->day ? 'selected' : '' }}>
                                            {{ $day }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">التاريخ <span
                                    class="required">مطلوب</span></label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="email" value="{{ $id->date }}" name="date"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        {{-- programme_id
                        target_audience
                        period
                        day
                        date
                        course_name
                        course_period
                        from
                        to
                        teacher
                        price --}}


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">اسم الدورة <span
                                    class="required">مطلوب</span></label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="course_name" @if (count($courses) == 0) {{ 'disabled' }} @endif class="form-control">
                                    <option value="" disabled selected>الرجاء اختيار اسم الدورة</option>
                                    @if (count($courses) > 0)
                                        @foreach ($courses as $course)
                                            <option value="{{ $course->name }}"
                                                {{ $id->course_name == $course->name ? 'selected' : '' }}>
                                                {{ $course->name }}
                                            </option>
                                        @endforeach

                                    @else
                                        <option value="" selected disabled>لم يتم اضافة برامج بعد</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">المدة<span
                                    class="required"> مطلوب </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="telephone" value="{{ $id->course_period }}" name="course_period"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone"> الوقت من<span
                                    class="required"> مطلوب </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="telephone" value="{{ $id->from }}" name="from"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone"> الوقت الى<span
                                    class="required"> مطلوب </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" id="telephone" value="{{ $id->to }}" name="to"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone"> المدربة<span
                                    class="required"> مطلوب </span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="teacher" class="form-control">
                                    <option value="" disabled selected>الرجاء اختيار المعلمة</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->name }}"
                                            {{ $teacher->name == $id->teacher ? 'selected' : '' }}>
                                            {{ $teacher->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>





                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">ملاحظات <span
                                    class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="textarea" placeholder="السعر..." name="price"
                                    class="form-control col-md-7 col-xs-12">{{ $id->price }}</textarea>
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
