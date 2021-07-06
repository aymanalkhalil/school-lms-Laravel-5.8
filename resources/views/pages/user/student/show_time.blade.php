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
            <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sho3ba"> اسم الشعبة </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <input disabled value="{{ $collection_time->sho3ba }}" type="text" class="form-control">                     
                  </div>
               </div>
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
                        <?php $found = false;?>
                        @foreach ($time as $item)
                        @if ($item->yom == $array && $item->no == $i)
                        <option>{{ $item->subject[0]->name }}</option>
                        <?php $found = true; ?>
                        @endif              
                        @endforeach
                        @if(!$found)

                        @endif              
                     </td>
                     @endfor
                  </tr>
                  @endforeach
               </table>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection