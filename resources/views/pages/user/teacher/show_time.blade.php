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
                        @foreach ($time as $item)
                        @if ($item->yom == $array && $item->no == $i && $item->subject[0]->user_id == Auth::id())
                        <option>{{ $item->collection_time[0]->sho3ba }} -- {{ $item->subject[0]->name }}</option>
                        @endif              
                        @endforeach             
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