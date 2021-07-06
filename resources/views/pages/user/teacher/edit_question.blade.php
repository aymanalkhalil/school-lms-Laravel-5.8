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
                        action="{{ route('update_question', ['id' => $id, 'exam_id' => $exam_id]) }}">
                        @csrf
                        @method('PUT')
                        <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>
                        <span class="section">تعديل سؤال الاختبار </span>
                        @if ($id->type == 1)
                            <div id="block_multiple">

                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for=""> السؤال
                                    </label>
                                    <input type="hidden" name="type" value="multiple">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="question_mul" value="{{ $id->question }}"
                                            class="form-control has-feedback-left">
                                    </div>
                                </div>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($get_choices as $item)
                                    <div class="item form-group">
                                        <label class="control-label col-md-1 col-sm-3 col-xs-12" for="">
                                            الاجابة {{ $i }}
                                        </label>
                                        <input type="hidden" name="choice_id[]" value="{{ $item->id }}">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" name="answer_mul[]" value="{{ $item->choice }}"
                                                class="form-control has-feedback-left">
                                        </div>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach




                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">
                                        <span class="required">الاجابة الصحيحة</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="correct_answer_mul" value="{{ $id->answer }}"
                                            class="form-control has-feedback-left">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="">درجة السؤال
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" min="1" value="{{ $id->mark }}" name="mark_mul"
                                            class="mark form-control has-feedback-left">
                                    </div>
                                </div>
                            </div>
                        @else
                            <div id="block_true">
                                <span class="section"></span>
                                <p style="font-size:16pt">
                                </p>
                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">السؤال</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" value="{{ $id->question }}" name="question_true"
                                            class="form-control has-feedback-left">
                                    </div>
                                </div>
                                <input type="hidden" name="type" value="true_false">

                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">الاجابة الاولى</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" readonly name="answer_true[]" value="صح"
                                            class="form-control has-feedback-left">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">الاجابة الثانية</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" readonly name="answer_true[]" value="خطأ"
                                            class="form-control has-feedback-left">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12"> <span class="required">الاجابة
                                            الصحيحة</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="correct_answer_true" required class="form-control">
                                            <option disabled selected>الرجاء اختيار الاجابة الصحيحة</option>
                                            <option @if ($id->answer == 'صح') selected @endif value="صح">صح</option>
                                            <option @if ($id->answer == 'خطأ') selected @endif value="خطأ">خطأ</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="">درجة السؤال
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" min="1" value="{{ $id->mark }}" name="mark_true"
                                            class="mark form-control has-feedback-left">
                                    </div>
                                </div>



                            </div>
                        @endif

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" id="calculate" class="btn btn-success">حفظ
                                    وارسال</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
@endsection
