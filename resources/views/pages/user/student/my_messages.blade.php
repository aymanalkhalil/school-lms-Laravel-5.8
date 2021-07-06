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
                    <form class="form-horizontal form-label-left" method="POST">
                        @csrf
                        <div class="item form-group">
                            <span class="section">جميع الرسائل</span>
                        </div>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>المرسل اليه</th>
                                    <th>الموضوع</th>
                                    <th>مرفقات الرسالة</th>
                                    <th>الرسالة والرد</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($all_messages as $data)
                                    <tr>
                                        <td>{{ $i }}</td>

                                        <td><input disabled class="form-control" type="text"
                                                value="{{ $data->teacher->name }}">
                                        </td>
                                        <td><input type="text" class="form-control" disabled value="{{ $data->subject }}">
                                        </td>
                                        <td>

                                            @if (empty($data->attachements))
                                                <input disabled class="form-control" type="text"
                                                    value="لا يوجد مرفقات بالرسالة ">
                                            @else
                                                <a target="_blank"
                                                    href="{{ asset('messages_attachments/' . $data->attachements) }}"
                                                    class="btn btn-success">تحميل الملف المرفق</a>
                                            @endif
                                        </td>

                                        <td>
                                            @if (empty($data->reply))
                                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                                    data-target=".bs-example-modal-lg{{ $i }}">
                                                    لم يتم الرد بعد
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-success" data-toggle="modal"
                                                    data-target=".bs-example-modal-lg{{ $i }}">مشاهدة الرد
                                                </button>
                                            @endif
                                            <div class="modal fade bs-example-modal-lg{{ $i }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">الرسالة والرد

                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"><span
                                                                    aria-hidden="true">×</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="x-content">
                                                                <div class="item form-group">
                                                                    <span class="section">الرسالة </span>
                                                                    <textarea disabled cols="9" rows="5"
                                                                        class="form-control">{{ $data->message }}</textarea>
                                                                    <span class="section">رد المعلمة</span>

                                                                    <textarea disabled cols="9" rows="5"
                                                                        class="form-control">{{ !empty($data->reply) ? $data->reply : 'لم يتم الرد بعد ' }}</textarea>

                                                                    <span class="section"></span>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger col-xs-12 col-md-12"
                                                                data-dismiss="modal">إغلاق</button>
                                                            {{-- <input type="hidden" name="assignment_id" value="{{ $data->id }}">
                                                    <button type="submit" class="btn btn-success">تسليم
                                                        الواجب</button> --}}
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
