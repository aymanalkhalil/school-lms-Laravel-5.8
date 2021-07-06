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
                    <form id="myForm" class="form-horizontal form-label-left" action="{{ route('finish_exam') }}"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <span style="border:2px solid red" class="section text-center" id="demo">

                        </span>

                        <input type="hidden" id='timer' value=>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($get_questions as $question)

                            <span class="section"> السؤال: {{ $question->question }}</span>
                            @foreach ($question->choice as $choice)
                                {{-- @if ($question->type == 0) --}}


                                <div class="item form-group d-flex">
                                    <input type="hidden" name="question_id[{{ $i }}]"
                                        value="{{ $choice->question_id }}">
                                    <input type="radio" name="answer[{{ $i }}]" value="{{ $choice->choice }}">
                                    <label>{{ $choice->choice }}</label>

                                </div>

                            @endforeach
                            @php
                                $i++;
                            @endphp
                        @endforeach
                        <span class="section"></span>
                        <input type="hidden" name="exam_id" value="{{ $question->exam_id }}">
                        <input type="hidden" name="exam_no" value="{{ $question->exam->exam_no }}">
                        <button type="submit" onclick="return confirm('هل انت متاكد من انك تريد انهاء الاختبار؟')"
                            class="btn btn-success"><i class="fas fa-save"></i>
                            انهاء الاختبار</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @php

    $exam_close = $id->exam_close;
    @endphp
@endsection
@section('script')
    <script>
        $(function() {
            var count = null;
            if (localStorage.getItem("count") !== null) {
                count = localStorage.getItem("count")
            } else {
                count = {{ $id->timer }}
            }

            function format(seconds) {
                var h = Math.floor(seconds / 3600);
                var m = Math.floor(seconds / 60) % 60;
                var s = seconds % 60;
                if (h < 10) h = "0" + h;
                if (m < 10) m = "0" + m;
                if (s < 10) s = "0" + s;
                return h + ":" + m + ":" + s;
            }
            var counter = setInterval(timer, 1000);

            function timer() {
                count--;
                if (count < 0) {
                    if (localStorage.getItem("count") !== null) {
                        localStorage.removeItem('count');
                    }
                    return document.getElementById("myForm").submit();
                }
                // window.location.href = "{{ route('finish_exam') }}";
                $("#demo").html(format(count));
                window.localStorage.setItem("count", count);
            }
            window.onload = function() {
                sec = parseInt(window.localStorage.getItem("count"))
                // display = document.querySelector('#demo');
                $("#demo").html(format(sec));
            };
        });

    </script>
@endsection
