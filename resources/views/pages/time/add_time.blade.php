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
                <form class="form-horizontal form-label-left" method="POST" action="/add_time">
                    @csrf
                    <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>
                    <table class="table table-bordered">
                        <tr>
                            <th>الايام</th>
                            @for ($i = 1; $i < 9 ; $i++) <th>الحصة {{ $i }}</th>
                                @endfor
                        </tr>
                        <?php  $arrayName = array('الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس'); ?>
                        @foreach ($arrayName as $array )
                        <tr>
                            <td>{{ $array }}</td>
                            @for ($i = 1; $i < 9 ; $i++) <td>
                                @if (count($subjects) > 0)
                                <select name="subject[]" class="form-control">
                                    <option></option>
                                    @foreach($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                                @else
                                <select disabled class="form-control">
                                    <option>لا يوجد مواد</option>
                                </select>
                                @endif
                                </td>
                                @endfor
                        </tr>
                        @endforeach
                    </table>
                    <div class="form-group row">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sho3ba"> رقم الشعبة <span
                                class="required">مطلوب</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            @if (count($faculties) > 0)
                            <select name="sho3ba" class="form-control">
                                <option></option>
                                @foreach($faculties as $facultie)
                                <option>{{ $facultie->name }}</option>
                                @endforeach
                            </select>
                            @else
                            <select disabled class="form-control">
                                <option>لا يوجد شعبة</option>
                            </select>
                            @endif
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
