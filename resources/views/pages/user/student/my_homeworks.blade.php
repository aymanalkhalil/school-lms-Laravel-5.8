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
                    <form class="form-horizontal form-label-left" action="#" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="item form-group">
                            <span class="section">الواجبات</span>
                        </div>
                        <br>
                        <table id="example" style="width: 100%" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم المادة</th>
                                    <th>الشعبة</th>
                                    <th>رقم الواجب</th>
                                    <th>التاريخ والوقت النهائي للتسليم</th>
                                    <th>ملف الواجب</th>
                                    <th>ملاحظات</th>
                                    <th>الدرجة</th>
                                    <th>الحالة</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                    $now_date_time = date('Y-m-d h:i');
                                @endphp
                                @foreach ($get_assignment as $data)
                                    @php
                                        $combine_date_time = date('Y-m-d h:i', strtotime("$data->final_date $data->final_time"));
                                    @endphp

                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $data->subject->name }}</td>
                                        <td>{{ $data->section->name }}</td>
                                        <td>{{ $data->hw_number }}</td>
                                        <td>{{ $data->final_date }} {{ $data->final_time }}</td>

                                        <td><a class="btn btn-success" target="_blank"
                                                href="{{ asset('assignments/' . $data->file) }}"> تحميل
                                                الواجب <i class="fa fa-download"></i></a></td>
                                        <td>{{ !empty($data->note) ? $data->note : 'لا يوجد ملاحظات' }}</td>

                                        @if (count($data->uploads) > 0)
                                            @foreach ($data->uploads as $item)
                                                <td>{{ $item->mark }}
                                                </td>
                                            @endforeach
                                        @else
                                            <td>{{ 'لم يتم تحديد الدرجة' }}
                                            </td>
                                        @endif

                                        <td>
                                            @if ($now_date_time > $combine_date_time)
                                                <button type="button" disabled class="btn btn-danger">انتهى الوقت
                                                    المتاح للتسليم
                                                </button>
                                            @else

                                                @if (count($data->uploads) > 0)
                                                    <button type="button" class="btn btn-primary">تم تسليم الواجب
                                                        <i class='fa fa-upload'></i></button>
                                                @else
                                                    <a href="{{ route('view_homework', $data->id) }}"
                                                        class="btn btn-info">تسليم الواجب
                                                        <i class='fa fa-upload'></i></a>
                                                @endif
                                                {{-- @foreach ($data->uploads as $item)
                                                    @if (!empty($item->file) && $item->user_id == Auth::user()->id)



                                                    @endif

                                                @endforeach --}}
                                            @endif

                                            @foreach ($data->uploads as $item)

                                                @if (!empty($item->file) && $item->user_id == Auth::user()->id)
                                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                                        data-target=".bs-example-modal-lg{{ $i }}">مشاهدة
                                                        الواجب
                                                        المرفق
                                                    </button>
                                                @endif
                                            @endforeach

                                            @if (!empty($item->file))
                                                <div class="modal fade bs-example-modal-lg{{ $i }}"
                                                    tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="myModalLabel">
                                                                    الواجب المرفق
                                                                </h4>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="x-content">
                                                                    <div class="item form-group">
                                                                        <a class="btn btn-success col-md-12 col-xs-12 col-lg-12"
                                                                            target="_blank"
                                                                            href="{{ asset('assignments_uploads/' . $item->file) }}">
                                                                            تحميل
                                                                            الواجب المرفق <i class="fa fa-download"></i></a>

                                                                        <span class="section"></span>
                                                                        <textarea name="comments" readonly
                                                                            placeholder="ملاحظات (ليست اجبارية)" cols="9"
                                                                            rows="5"
                                                                            class="form-control">{{ !empty($item->comments) ? $item->comments : 'لا يوجد ملاحظات مرفقة مع الواجب' }}</textarea>

                                                                        <span class="section"></span>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-danger col-md-12 col-xs-12"
                                                                    data-dismiss="modal">إغلاق</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                        </td>


                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
