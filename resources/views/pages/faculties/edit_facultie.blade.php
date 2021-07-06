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
                <form class="form-horizontal form-label-left" method="POST" action="/update/{{ $id->id }}/facultie">
                    <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>
                    @csrf
                    @method('put')
                    <span class="section">بيانات اضافة شعبة جديدة </span>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">رقم
                            الشعبة
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="name" value="{{ $id->name }}" class="form-control col-md-7 col-xs-12"
                                data-validate-length-range="6" data-validate-words="2" name="name"
                                placeholder=" عبارة عن الصورة التالية B1440-1 " required="required" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">ملاحظات
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="textarea" required="required" name="nota"
                                class="form-control col-md-7 col-xs-12">{{ $id->nota }}</textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
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
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
<style>
    @media (max-width: 768px) {
        #example_wrapper {
            min-height: .01%;
            overflow-x: auto;
        }
    }
</style>
<form method="POST" action="/edit_student_in_sho3ba/{{ $id->id }}">
    @csrf
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>حذف الطالبه </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $student->user->name }}</td>
                        <td><input value="{{ $student->user->id }}" name="add[]" type="checkbox"></td>
                        <td style="display:none;"><input value="{{ $id }}" name="id_sho3ba" type="text"></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>الاسم </th>
                        <th>حذف الطالبة</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-success">حفظ وارسال</button>
        </div>
    </div>
</form>
@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
       $('#example').DataTable();
   });
</script>
@endsection
@endsection
