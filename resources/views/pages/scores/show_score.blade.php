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
            <form class="form-horizontal form-label-left">
               <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12"> اسم الطالب</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <select disabled required="required" name="name" class="form-control">
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                     </select>
                  </div>
               </div>
               <br>
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>المادة</th>
                        <th>اعمال السنة</th>
                        <th>النهائي</th>
                        <th>الحضور والغياب</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($scores as $score)
                     <tr>
                        <td>
                           <select disabled required="required" name="dragat[]" class="form-control">
                              <option></option>
                              @foreach ($subjects as $subject)
                              <option value="{{ $subject->id }}" @if ($subject->id == $score->subject_id ) selected @endif>{{ $subject->name }}</option>
                              @endforeach
                           </select>
                        </td>
                        <td><input disabled required="required" class="form-control" type="number" value="{{ $score->sana }}" name="dragat[]" min="1" max="50"></td>
                        <td><input disabled required="required" class="form-control" type="number" value="{{ $score->fainal }}" name="dragat[]" min="1" max="40"></td>
                        <td><input disabled required="required" class="form-control" type="number" value="{{ $score->hudur }}" name="dragat[]" min="1" max="10"></td>
                     </tr>
                     @endforeach
                  </tbody>
               </table>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection