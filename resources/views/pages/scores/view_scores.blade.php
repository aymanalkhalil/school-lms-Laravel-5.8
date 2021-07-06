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
   .dataTables_filter, .dataTables_length ,.score .dataTables_info, .score .dataTables_paginate {
   display: none;
   }
</style>
<div class="row">
   <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="score">
         <table style="display: none;" id="score" class=" table table-striped table-bordered" >
            <thead>
               <tr>
                  <th>#</th>
                  <th>اسم الطالبه</th>
                  <th>اسم المادة</th>
                  <th>اعمال السنة</th>
                  <th>النهائي</th>
                  <th>الحضور</th>
               </tr>
            </thead>
            <tbody>
               <?php $i = 1;?>
               @foreach ($scoresss as $score)
               <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $score->user->name }}</td>
                  <td>{{ $score->subject->name }}</td>
                  <td>{{ $score->sana }}</td>
                  <td>{{ $score->fainal }}</td>
                  <td>{{ $score->hudur }}</td>
               </tr>
               @endforeach
            </tbody>
            <tfoot>
               <tr>
                  <th>#</th>
                  <th>اسم الطالبه</th>
                  <th>اسم المادة</th>
                  <th>اعمال السنة</th>
                  <th>النهائي</th>
                  <th>الحضور</th>
               </tr>
            </tfoot>
         </table>
      </div>
      <table id="example" class="table table-striped table-bordered" >
         <thead>
            <tr>
               <th>#</th>
               <th>اسم الطالبه</th>
               <th>الإجراء</th>
            </tr>
         </thead>
         <tbody>
            <?php 
            $i = 1;
            $score_edit = Auth::user()->permission->score_edit != 'disable';
            $score_delete = Auth::user()->permission->score_delete != 'disable';
            $score_view = Auth::user()->permission->score_view != 'disable';
            ?>
            @foreach ($scores as $score)
            <tr>
               <td>{{ $i++ }}</td>
               <td>{{ $score->user->name }}</td>
               <td>
               @if ($score_edit)
                  <a href="/edit/{{ $score->user->id }}/score" class="btn btn-primary"><i class="fas fa-user-edit"></i>   تعديل</a>                   
               @endif
               @if ($score_delete)
                  <a href="/delete/{{ $score->user->id }}/score" class="btn btn-danger" onclick="return confirm('هل انت متاكد من انك تريد مسح درجات هذه الطالبه ؟')" ><i class="fas fa-trash-alt"></i>   مسح</a>
               @endif
               @if ($score_view)
                  <a href="/show/{{ $score->user->id }}/score" class="btn btn-success"><i class="fas fa-eye"></i>     مشاهدة</a>                   
               @endif
               </td>
            </tr>
            @endforeach
         </tbody>
         <tfoot>
            <tr>
               <th>#</th>
               <th>اسم الطالبه</th>
               <td>  الإجراء</td>
            </tr>
         </tfoot>
      </table>
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
           ],});
       $('#score').DataTable( {
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