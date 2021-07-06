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
                {{-- لديك محاولة واحدة فقط
    الرجاء عدم الخروج من صفحة الاختبار --}}

                <div class="x_content">

                    @csrf
                    @php
                        
                        $hours = floor($id->timer / 3600);
                        $minutes = ($id->timer / 60) % 60;
                        
                    @endphp
                    <div class="item form-group">
                        <span class="section ">الاختبار: {{ $id->exam_no }}</span>
                        <span class="section ">تاريخ الاختبار:{{ $id->exam_date }} </span>
                        <span class="section ">وقت الاختبار من {{ date('h:i A', strtotime($id->exam_open)) }} الى
                            {{ date('h:i A', strtotime($id->exam_close)) }}</span>
                        @if ($minutes == 0)
                            <span class="section">مدة الاختبار: {{ $hours . ' ساعة ' }}</span>
                        @else
                            <span class="section">مدة الاختبار:
                                {{ $hours . ' ساعة و ' . $minutes . ' دقيقة ' }}</span>

                        @endif
                    </div>
                    <div class="item form-group">
                        <span style="color:red" class="section text-center ">ملاحظات مهمة جداً</span>
                        <span class="section" style="color:red">
                            <ol>
                                <li>لديكِ محاولة واحدة فقط</li>
                                <li>عند انتهاء الوقت المحدد للاختبار سيتم اغلاقه تلقائياً</li>

                            </ol>
                        </span>

                    </div>
                    <div class="item form-group text-center ">

                        <a href="{{ route('make_exam', $id->id) }}" class="btn btn-success">بدء
                            الإختبار</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
