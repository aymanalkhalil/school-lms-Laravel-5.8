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
                    <form class="form-horizontal form-label-left" action="{{ route('upload_homework', $id->id) }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <span class="section">تسليم الواجب</span>


                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ملف الواجب <span
                                    class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="file" name="upload_file" placeholder="الموضوع" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ملاحظات <span
                                    class="required">ليست اجبارية</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="comments" cols="9" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="hw_number" value="{{ $id->hw_number }}">

                        <span class="section text-center" style="color: red">ملاحظة
                            : لا يمكنك
                            تعديل الملف المرفق بعد تسليمه</span>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" class="btn btn-success">تسليم الواجب </button>
                            </div>
                        </div>

                </div>
            </div>
        </div>

        @php
            // $i++;
        @endphp

        </form>
    </div>
    </div>
    </div>
    </div>
@endsection
