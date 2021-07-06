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
            <form class="form-horizontal form-label-left"  method="POST" action="/update/{{ $id->id }}/time">
               @csrf
               @method('put')
               <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>
               <table class="table table-bordered">
                  <tr>
                     <th>الايام</th>
                     @for ($i = 1; $i < 9 ; $i++)
                     <th>الحصة {{ $i }}</th>
                     @endfor
                  </tr>
                  <?php  $arrayName = array('الأحد','الإثنين','الثلاثاء','الأربعاء','الخميس'); ?>
                  @foreach ($arrayName as $array )
                  <tr>
                     <td>{{ $array }}</td>
                     @for ($i = 1; $i < 9 ; $i++)
                     <td>
                        <select name="subject[]" class="form-control">
                           <option></option>
                           @foreach ($time as $item)
                           @if ($item->yom == $array && $item->no == $i)
                           <option selected value="{{ $item->subject[0]->id }}">{{ $item->subject[0]->name }}</option>
                           @endif  
                           @endforeach
                           @foreach($subjects as $subject)
                           <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                           @endforeach
                        </select>
                     </td>
                     @endfor
                  </tr>
                  @endforeach
               </table>
               <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sho3ba"> رقم الشعبة <span
                     class="required">مطلوب</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <select name="sho3ba" class="form-control">
                        <option></option>
                        @foreach($faculties as $facultie)
                        <option @if($facultie->name == $id->sho3ba) selected @endif>{{ $facultie->name }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
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