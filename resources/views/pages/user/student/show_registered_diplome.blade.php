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
                    <form class="form-horizontal form-label-left" action="{{ route('upload_diplome_bill') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="item form-group">
                            <span class="section">البرامج المسجلة</span>
                        </div>
                        <br>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اسم البرنامج</th>
                                    <th>وصل الدفع</th>
                                    <th>ارفاق وصل الدفع</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($get_diplome as $data)

                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td><input disabled class="form-control" type="text"
                                                value="{{ $data->sana_drasia }}">

                                        </td>
                                        <td>

                                            @if (empty($data->bill))
                                                <input disabled class="form-control" type="text" value="لا يوجد وصل دفع">
                                            @else
                                                <a target="_blank" href="{{ asset('images/diplome_bills/' . $data->bill) }}"
                                                    class="btn btn-success">تحميل وصل الدفع المرفق</a>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target=".bs-example-modal-lg{{ $i }}">ارفاق وصل الدفع
                                            </button>
                                            <div class="modal fade bs-example-modal-lg{{ $i }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="myModalLabel">ارفاق وصل الدفع

                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"><span
                                                                    aria-hidden="true">×</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="x-content">
                                                                <div class="item form-group">
                                                                    <label style="color: red">مطلوب</label>
                                                                    <input type="file" name="upload_file"
                                                                        class="form-control">
                                                                    <span class="section"></span>


                                                                    <span class="section"></span>
                                                                    {{-- @if (!empty($data->bill))
                                                            <span class="section text-center" style="color: red">ملاحظة
                                                                : </span>
                                                            @endif --}}

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">إغلاق</button>
                                                            <input type="hidden" name="user_id" value="{{ $data->id }}">
                                                            <button type="submit" class="btn btn-success">ارفاق الوصل
                                                            </button>
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
