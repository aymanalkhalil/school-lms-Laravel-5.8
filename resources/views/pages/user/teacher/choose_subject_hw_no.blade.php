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
                <form class="form-horizontal form-label-left" method="POST" action="{{ route('get_subject_hw_no') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="subject_id"> اختر اسم المادة
                                <span class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select required @if (count($subjects)==0) disabled @endif name="subject_id"
                                    class="form-control">
                                    @if (count($subjects) > 0)
                                    <option value="" disabled selected>من فضلك اختار اسم المادة</option>
                                    @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                    @else
                                    <option>عذراً لا يوجد لديكي مواد مسندة</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">رقم الواجب <span
                                    class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                @php
                                $hw_no = ['الاول', 'الثاني', 'الثالث', 'الرابع', 'الخامس'];
                                @endphp
                                <select required name="homework_number" class="form-control">
                                    <option value disabled selected>الرجاء اختيار رقم الواجب</option>
                                    @foreach ($hw_no as $number)
                                    <option value="{{ $number }}">{{ $number }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <br>
                                <button type="submit" @if (count($subjects)==0) disabled @endif
                                    class="btn btn-success">التالي</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection