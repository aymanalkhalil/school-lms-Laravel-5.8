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
                        <span class="section">الدورات</span>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الدورة</th>
                                <th>وصل الدفع</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach ($student_course as $data)
                            <tr>
                                <td>{{ $i }}</td>
                                <td><input disabled class="form-control" type="text" value="{{ $data->course->name }}">
                                </td>
                                <td>

                                    @if(empty($data->bill))
                                    <input disabled class="form-control" type="text" value="لا يوجد وصل دفع">
                                    @else
                                    <a target="_blank" href="{{ asset('images/bills/'.$data->bill) }}"
                                        class="btn btn-success">تحميل وصل
                                        الدفع المرفق</a>
                                    @endif
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