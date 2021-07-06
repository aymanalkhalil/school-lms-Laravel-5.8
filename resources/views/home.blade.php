@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif



                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    رسالة الترحيب
                    <small></small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                                class="fa fa-wrench"></i></a>
                    </li>
                    <li>
                        <a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: block;">

                <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">

                        <h3>{{ Auth::user()->name }}</h3>

                        <p>مرحباً بك في لوحة التحكم الخاصة بك </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>مساعدة
                    <small></small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="https://alburhan.tech/documentation" class="dropdown-toggle" data-toggle="dropdown"
                            role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    </li>
                    <li>
                        <a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display: block;">
                <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                        <h3>شرح النظام</h3>
                        <p>في حال مواجهة أخطاء في النظام يمكن الرجوع الى ملف التعليمات </p>

                        <a href='https://alburhan.tech/documentation' target="_blank" rel="nofollow">المزيد من
                            التعليمات...</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
