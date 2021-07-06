@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@extends('layouts.app')
@section('content')
<style>
   .buttons-excel , .buttons-pdf , .buttons-print{
   display: inline-block;
   padding: 6px 12px;
   margin-bottom: 0;
   font-size: 14px;
   font-weight: 400;
   line-height: 1.42857143;
   text-align: center;
   white-space: nowrap;
   vertical-align: middle;
   -ms-touch-action: manipulation;
   touch-action: manipulation;
   cursor: pointer;
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
   background-image: none;
   border: 1px solid transparent;
   border-radius: 4px;
   }
   .buttons-excel:hover{
   background-color: white;
   border-color: #2e6da4;
   color: #2e6da4;
   }
   .buttons-pdf:hover{
   background-color: white;
   border-color: #d43f3a;
   color: #d43f3a;
   }
   .buttons-print:hover{
   background-color: white;
   border-color: #169f85;
   color: #169f85;
   }
   .dt-buttons{padding-bottom: 15px;}
   @media (max-width: 768px){#example_wrapper{min-height: .01%;overflow-x: auto;}}
</style>
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
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">الشعبة  
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <select disabled  class="form-control">
                        @foreach ($facultie1 as $item)
                        @if ($item->id == $facultie)
                        <option>{{ $item->name }}</option>
                        @endif
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">الحصة  
                  </label>
                  <?php $hasas = array('الحصة الاولى'=>'1','الحصة الثانية'=>'2','الحصة الثالثة'=>'3','الحصة الرابعة'=>'4','الحصة الخامسة'=>'5' ,'الحصة السادسة'=>'6','الحصة السابعة'=>'7' ,'الحصة الثامنة'=>'8');?>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <select disabled class="form-control">
                        @foreach ($hasas as $item => $key)
                        @if ($key == $no)
                        <option>{{ $item }}</option>
                        @endif
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">اليوم  
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <select disabled class="form-control">
                        <option>{{ $day }}</option>
                     </select>
                  </div>
               </div>
               <div class="ln_solid"></div>
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <table id="example" class="table table-striped table-bordered">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>الاسم</th>
                              <th>حضور او غياب او استأذان</th>
                              <th>السبب</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i = 1;?>
                           @foreach ($absents as $absent)
                           <tr>
                              <td>{{ $i++ }}</td>
                              <td>{{ $absent->user->name }}</td>
                              <td><span class="label @if($absent->status == 1) label-success @endif @if($absent->status == 0) label-danger @endif @if($absent->status == 2) label-warning @endif">
                                 @if($absent->status == 1) حضور @endif @if($absent->status == 0) غياب @endif @if($absent->status == 2) استأذان @endif
                              </td>
                              <td>@if($absent->status == 2) {{ $absent->nota }} @else لا يوجد سبب @endif</td>
                           </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                           <tr>
                              <th>#</th>
                              <th>الاسم</th>
                              <th>حضور او غياب او استأذان</th>
                              <th>السبب</th>
                           </tr>
                        </tfoot>
                     </table>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script>
   $(document).ready(function() {
       $('#example').DataTable( {
           aLengthMenu: [
           [25, 50, 100, 200, -1],
           [25, 50, 100, 200, "All"]
           ],
           dom: 'Blfrtip',
           buttons: [
   
               {
                   extend:    'excelHtml5',
                   text:      '<i class="fas fa-file-excel"></i> Excel',
                   titleAttr: 'Excel'
               },
               {
                   extend:    'pdfHtml5',
                   text:      '<i class="fas fa-file-pdf"></i> PDF',
                   titleAttr: 'PDF'
               },
               {
                   extend:    'print',
                   text:      '<i class="fas fa-print"></i> Print',
                   titleAttr: 'Print'
               },
           ]
       } );
   });
</script>
@endsection