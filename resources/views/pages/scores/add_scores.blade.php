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
            <form class="form-horizontal form-label-left"  method="POST" action="/add_scores">
               @csrf
               <p>الرجاء  التأكد من ادخال البيانات بالشكل الصحيح</p>
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">اختار اسم الطالب</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <select required="required"name="name" class="form-control">
                        <option></option>
                        @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div style="float: left;" class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                     <a href="#" class="add btn btn-success"><i class="fas fa-plus"></i></a>
                  </div>
               </div>
               <br>
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>المادة</th>
                        <th>أعمال السنة</th>
                        <th>النهائي</th>
                        <th>الحضور والغياب</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>1</td>
                        <td>
                           <select required="required" name="dragat[]" class="form-control">
                              <option></option>
                              @foreach ($subjects as $subject)
                              <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                              @endforeach
                           </select>
                        </td>
                        <td><input required="required" class="form-control" type="number" name="dragat[]" min="1" max="50"></td>
                        <td><input required="required" class="form-control" type="number" name="dragat[]" min="1" max="40"></td>
                        <td><input required="required" class="form-control" type="number" name="dragat[]" min="1" max="10"></td>
                     </tr>
                  </tbody>
               </table>
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
@endsection
@section('script')
<script type="text/javascript">
   jQuery(document).ready(function () {
      var count = 2;
      jQuery(".add").on("click", function (e) {
         e.preventDefault();
         if(count < 16){
            var html =`
<tr class="dragat`+count+`">
   <td>`+count+`</td>
   <td>
      <select required="required" name="dragat[]" class="form-control">
         <option></option>`+
         <?php foreach ($subjects as $subject):?>
         `<option value="{{ $subject->id }}">{{ $subject->name }}</option>`+
         <?php endforeach; ?>
      `</select>
   </td>
   <td><input required="required" class="form-control" type="number" name="dragat[]" min="1" max="50"></td>
   <td><input required="required" class="form-control" type="number" name="dragat[]" min="1" max="40"></td>
   <td><input required="required" class="form-control" type="number" name="dragat[]" min="1" max="10"></td>
   <td><a href="#" data-remove=`+count+` class="remove btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
</tr>
            `;
                        count++;
                        $("tbody").append(html);
         }else{
            alert("لقد تعديت الحد الاقصي للمواد");
         }

      });
      $('body').on('click','.remove',function(e){
         e.preventDefault();
         let remove = $(this).data("remove");
         $(`.dragat`+remove+``).remove();
      });

   });
</script>
@endsection
