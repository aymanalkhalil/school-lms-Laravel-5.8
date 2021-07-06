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
                <form class="form-horizontal form-label-left" method="POST" action="{{ route('send_reply',$id) }}">
                    @csrf
                    @method('PUT')
                    <span class="section"> رسالة الطالبة : {{ $id->user->name }}</span>

                    <p style="font-size:16pt">
                    </p>
                    <div class="item form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12">الموضوع</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input disabled value="{{ $id->subject }}" class="form-control has-feedback-left">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12">رسالة الطالبة</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea disabled rows="7" cols="15"
                                class="form-control has-feedback-left">{{ $id->message }}</textarea>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-1 col-sm-3 col-xs-12">الرد </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea rows="7" name="reply" placeholder="كتابة الرد هنا" cols="15"
                                class="form-control has-feedback-left"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="submit" id="calculate" class="btn btn-success">ارسال الرد
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

</div>
@endsection