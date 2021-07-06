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
                    <form class="form-horizontal form-label-left" action="{{ route('send_message') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="item form-group">
                            <span class="section">مقررات الدبلوم</span>
                        </div>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم المادة</th>
                                    <th>الشعبة</th>
                                    <th>الدبلوم</th>
                                    <th>مدرسة المادة</th>
                                    <th>الاجراء</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($diploma_data as $data)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td><input disabled class="form-control" type="text" value="{{ $data->name }}">
                                        </td>
                                        <td><input disabled class="form-control" type="text"
                                                value="{{ $data->section->name }}">

                                        </td>
                                        <td><input disabled class="form-control" type="text"
                                                value="{{ $data->sana_drsia->name }}">
                                        </td>
                                        <td><input disabled class="form-control" type="text"
                                                value="{{ $data->user->name }}">
                                        </td>
                                        <td>
                                            <!-- modals -->
                                            <!-- Large modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target=".bs-example-modal-lg{{ $i }}">التواصل مع
                                                المعلمة</button>

                                            <div class="modal fade bs-example-modal-lg{{ $i }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">ارسال رسالة للمعلمة
                                                                {{ $data->user->name }}
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"><span
                                                                    aria-hidden="true">×</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="x-content">
                                                                <div class="item form-group">
                                                                    {{-- <span class="section">الموضوع</span> --}}
                                                                    <input type="text" name="subject" placeholder="الموضوع"
                                                                        class="form-control">
                                                                    <span class="section "></span>
                                                                    {{-- <span class="section ">الرسالة</span> --}}
                                                                    <textarea name="message" required
                                                                        placeholder="نص الرسالة" class="form-control" id=""
                                                                        cols="25" rows="10"></textarea>
                                                                    <span class="section"></span>
                                                                    <label for="" style="color: red">مرفقات (إن وجد)</label>
                                                                    <input type="file" name="file" class="form-control">
                                                                    <span class="section text-center"
                                                                        style='color:red'>ملاحظة:
                                                                        ستجدي الرد من مدرسة المادة
                                                                        في صفحة
                                                                        الرسائل</span>
                                                                    <p></p>

                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger  "
                                                                data-dismiss="modal">اغلاق</button>
                                                            <input type="hidden" name="teacher_id"
                                                                value="{{ $data->user_id }}">
                                                            <button type="submit" class="btn btn-success  ">ارسال</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
