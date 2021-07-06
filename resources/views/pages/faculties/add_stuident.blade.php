@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@extends('layouts.app')
@section('content')
<style>
   @media (max-width: 768px){#example_wrapper{min-height: .01%;overflow-x: auto;}}
</style>
<form  method="POST" action="/add_student_in_sho3ba/{{ $id }}">
   @csrf
   <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <table id="example" class="table table-striped table-bordered">
            <thead>
               <tr>
                  <th>#</th>
                  <th>الاسم</th>
                  <th>اضافة </th>
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
                  <th>اضافة</th>
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
@endsection
@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
   $(document).ready(function() {
       $('#example').DataTable();
   });
</script>
@endsection