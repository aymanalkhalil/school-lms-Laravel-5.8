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
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="item form-group">
                        <span class="section">الاختبارات</span>
                    </div>
                    <br>
                    <table id="example" style="width: 100%" class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المادة</th>
                                <th>الشعبة</th>
                                <th>رقم الاختبار</th>
                                <th>تاريخ الاختبار </th>
                                <th>وقت اتاحة الاختبار واغلاقه</th>
                                <th>مدة الاختبار</th>
                                <th>درجة الاختبار</th>
                                <th>حالة الإختبار</th>
                                <th>الاجراء</th>
                                <th>الدرجة </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php

                                $i = 1;
                                $now_date_time = date('Y-m-d h:i');

                            @endphp
                            @foreach ($exam as $data)


                                @php
                                    $check_user = App\UserExam::where(['exam_id' => $data->id, 'user_id' => Auth::user()->id])->first();
                                    $exam_opened = date('h:i A', strtotime($data->exam_open));
                                    $exam_closed = date('h:i A', strtotime($data->exam_close));

                                    $hours = floor($data->timer / 3600);
                                    $minutes = ($data->timer / 60) % 60;

                                    $combine_date_time_open = date('Y-m-d h:i', strtotime("$data->exam_date $data->exam_open"));
                                    $combine_date_time_close = date('Y-m-d h:i', strtotime("$data->exam_date $data->exam_close"));

                                    if ($now_date_time < $combine_date_time_open) {
                                        // غير متاح حالياً
                                        $status = 0;
                                    } elseif ($now_date_time >= $combine_date_time_open && $now_date_time <= $combine_date_time_close) {
                                        //  متاح حالياً
                                        $status = 1;
                                    } elseif ($now_date_time >= $combine_date_time_close) {
                                        //  انتهى الوقت المتاح

                                        $status = -1;
                                    }

                                @endphp
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $data->subject->name }}</td>
                                    <td>{{ $data->section->name }}</td>
                                    <td>{{ $data->exam_no }}</td>
                                    <td>{{ $data->exam_date }}</td>
                                    <td>{{ 'من الساعة ' . $exam_opened . ' الى الساعة ' . $exam_closed }}</td>
                                    {{-- <td>{{ $minutes }}</td> --}}
                                    @if ($minutes == 0)
                                        <td>{{ $hours . ' ساعة ' }}</td>

                                    @else
                                        <td>{{ $hours . ' ساعة و  ' . $minutes . ' دقيقة ' }}</td>
                                    @endif
                                    <td>{{ $data->grade }}</td>
                                    <td>
                                        @if ($status == 0)
                                            <button type="button" class="btn btn-danger">الاختبار غير متاح
                                                الان</button>
                                        @elseif($status == 1)
                                            <button type="button" class="btn btn-success">الاختبار متاح حالياً
                                            </button>
                                        @elseif($status == -1 )
                                            <button type="button" class="btn btn-danger">انتهى الوقت المحدد
                                                للاختبار</button>


                                        @endif

                                    </td>
                                    <td>
                                        @if ($status == 1 && !$check_user)

                                            <a href="{{ route('instruction_exam', $data->id) }}"
                                                class="btn btn-success">اجراء
                                                الاختبار</a>

                                        @elseif($status == 1 && $check_user)

                                            <button class="btn btn-primary">تم اجراء الاختبار</button>


                                        @endif

                                    </td>
                                    <td>
                                        @if (isset($check_user))
                                            @if ($check_user->grade == 0)
                                                {{ 0 . '/' . $data->grade }}
                                            @else
                                                {{ $check_user->grade . '/' . $data->grade }}
                                            @endif
                                        @endif
                                    </td>

                                </tr>
                                @php
                                    $i++;
                                @endphp


                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div> @endsection
