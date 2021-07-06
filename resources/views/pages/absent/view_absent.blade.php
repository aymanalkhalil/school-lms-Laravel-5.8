@extends('layouts.app')
@section('content')
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
         <div class="x_title">
            <ul class="nav navbar-right panel_toolbox">
               <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
               <li class="dropdown"></li>
            </ul>
            <div class="clearfix"></div>
         </div>
         <div class="x_content">
            <form class="form-horizontal form-label-left"  method="POST" action="/absent/view_all">
               @csrf
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">اختار الشعبة  
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <select name="facultie" @if (count($facultie) == 0) disabled @endif class="form-control">
                     @if (count($facultie) == 0)
                     <option>من فضلك أضف الشعبة اولاً </option>
                     @else
                     <option></option>
                     @foreach ($facultie as $facultie)
                     <option value="{{ $facultie->id }}">{{ $facultie->name }}</option>
                     @endforeach
                     @endif
                     </select>
                  </div>
               </div>
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">اختار الحصة  
                  </label>
                  <?php $hasas = array('الحصة الاولى'=>'1','الحصة الثانية'=>'2','الحصة الثالثة'=>'3','الحصة الرابعة'=>'4','الحصة الخامسة'=>'5' ,'الحصة السادسة'=>'6','الحصة السابعة'=>'7' ,'الحصة الثامنة'=>'8');?>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <select name="no" class="form-control">
                        <option></option>
                        @foreach ($hasas as $hasas => $no)
                        <option value="{{ $no }}">{{ $hasas }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">اختار اليوم  
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <select name="day" @if (count($days) == 0) disabled @endif class="form-control">
                     @if (count($days) == 0)
                     <option>عفواً لا  يوجد اي سجلات في قاعدة البايانات </option>
                     @else
                        <option></option>
                        @foreach ($days as $day)
                        <option>{{ $day->day }}</option>
                        @endforeach
                        @endif
                     </select>
                  </div>
               </div>

               <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                     <button type="submit" class="btn btn-success">التالي</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection