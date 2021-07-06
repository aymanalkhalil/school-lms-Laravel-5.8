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
                    <form class="form-horizontal form-label-left" method="POST" action="/add_time/sana_drsia">
                        @csrf
                        <div class="form-group row">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sana_drsia"> البرنامج <span
                                    class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select @if (count($sana_drsia) == 0) disabled @endif name="sana_drsia" class="form-control">
                                    @if (count($sana_drsia) > 0)
                                        <option></option>
                                        @foreach ($sana_drsia as $sana_drsia)
                                            <option value="{{ $sana_drsia->id }}">{{ $sana_drsia->name }}</option>
                                        @endforeach
                                    @else
                                        <option>من فضلك قم باضافة البرنامج اولاً</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <br>
                                    <button type="submit" class="btn btn-success">التالي</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
