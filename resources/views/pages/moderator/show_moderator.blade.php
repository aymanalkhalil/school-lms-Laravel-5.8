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
            <form class="form-horizontal form-label-left">
               <p>الرجاء  التأكد من ادخال البيانات بالشكل الصحيح</p>
               <span class="section">البيانات الشخصية</span>
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الاسم
                  الرباعي <span class="required">مطلوب</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <input id="name" value="{{ $id->name }}" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                        data-validate-words="2" name="name" placeholder="الاسم الرباعي" required="required"
                        type="text" disabled>
                  </div>
               </div>
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">البريد الالكتروني
                  <span class="required">مطلوب</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <input value="{{ $id->email }}" type="email" id="email" name="email" required="required"
                        class="form-control col-md-7 col-xs-12" disabled>
                  </div>
               </div>
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">رقم
                  الهوية الوطنية او جواز السفر <span class="required">مطلوب</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <input value="{{ $id->National_ID }}" type="number" id="number" name="National_ID" required="required"
                        data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12" disabled>
                  </div>
               </div>
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">رقم
                  الجوال <span class="required">مطلوب</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <input value="{{ $id->phone }}" type="tel" id="telephone" name="phone" required="required"
                        data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12" disabled>
                  </div>
               </div>
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">الدرجة العلمية
                  <span class="required">مطلوب</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <select disabled name="years" class="form-control">
                        <option>{{ $id->years }}</option>
                     </select>
                  </div>
               </div>
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">تاريخ الميلاد <span
                     class="required">مطلوب</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <input disabled type="date" value="{{ $id->date }}" class="form-control has-feedback-left"
                        name="date">
                     <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                  </div>
               </div>
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">ملاحظات <span
                     class="required">مطلوب</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <textarea disabled id="textarea" required="required"  name="note"
                        class="form-control col-md-7 col-xs-12">{{ $id->note }}</textarea>
                  </div>
               </div>
               <span class="section">الصلاحيات </span>
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>الصلاحيات</th>
                        <th>مسح</th>
                        <th>اضافة</th>
                        <th>تعديل</th>
                        <th>مشاهدة</th>
                     </tr>
                  </thead>
                  <tbody>
                  <?php
                  $student    = array('student_delete','student_add','student_edit','student_view' );
                  $moderator  = array('moderator_delete','moderator_add','moderator_edit','moderator_view' );
                  $teacher    = array('teacher_delete','teacher_add','teacher_edit','teacher_view' );
                  $score      = array('score_delete','score_add','score_edit','score_view' );
                  $subject    = array('subject_delete','subject_add','subject_edit','subject_view' );
                  $time       = array('time_delete','time_add','time_edit','time_view' );
                  $facultie   = array('facultie_delete','facultie_add','facultie_edit','facultie_view' );
                  $absent     = array('absent_delete','absent_add','absent_edit','absent_view' );
                  $sana_drsia = array('sana_drsia_delete','sana_drsia_add','sana_drsia_edit','sana_drsia_view' );
                  ?>
                     <tr>
                        <th>الطالبات</th>
                        @foreach ($student as $item)
                        <th><input type="checkbox"  @if($id->permission->$item == 'enable') checked @endif value="enable" name="{{ $item }}"></th>                            
                        @endforeach
                     </tr>
                     <tr>
                        <th>المعلمات</th>
                        @foreach ($teacher as $item)
                        <th><input type="checkbox" @if($id->permission->$item == 'enable') checked @endif value="enable" name="{{ $item }}"></th>                            
                        @endforeach
                     </tr>
                     <tr>
                        <th>المشرفات</th>
                        @foreach ($moderator as $item)
                        <th><input type="checkbox" @if($id->permission->$item == 'enable') checked @endif value="enable" name="{{ $item }}"></th>                            
                        @endforeach
                     </tr>
                     <tr>
                        <th>الدرجات</th>
                        @foreach ($score as $item)
                        <th><input type="checkbox" @if($id->permission->$item == 'enable') checked @endif value="enable" name="{{ $item }}"></th>                            
                        @endforeach
                     </tr>
                     <tr>
                        <th>المواد</th>
                        @foreach ($subject as $item)
                        <th><input type="checkbox" @if($id->permission->$item == 'enable') checked @endif value="enable" name="{{ $item }}"></th>                            
                        @endforeach
                     </tr>
                     <tr>
                        <th>الجداول الدراسية</th>
                        @foreach ($time as $item)
                        <th><input type="checkbox" @if($id->permission->$item == 'enable') checked @endif value="enable" name="{{ $item }}"></th>                            
                        @endforeach
                     </tr>
                     <tr>
                        <th>الشعب</th>
                        @foreach ($facultie as $item)
                        <th><input type="checkbox" @if($id->permission->$item == 'enable') checked @endif value="enable" name="{{ $item }}"></th>                            
                        @endforeach
                     </tr>
                     <tr>
                        <th>الحضور</th>
                        @foreach ($absent as $item)
                        <th><input type="checkbox" @if($id->permission->$item == 'enable') checked @endif value="enable" name="{{ $item }}"></th>                            
                        @endforeach
                     </tr>
                     <tr>
                        <th> البرامج </th>
                        @foreach ($sana_drsia as $item)
                        <th><input type="checkbox" @if($id->permission->$item == 'enable') checked @endif value="enable" name="{{ $item }}"></th>                            
                        @endforeach
                     </tr>
                  </tbody>
               </table>
               <div class="ln_solid"></div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection