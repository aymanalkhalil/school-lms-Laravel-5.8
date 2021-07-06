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
               <p>الرجاءالتأكد من ادخال البيانات بالشكل الصحيح</p>
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
               <div class="ln_solid"></div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection