@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@extends('layouts.app')
@section('content')
<style>
    .buttons-excel,
    .buttons-pdf,
    .buttons-print {
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

    .buttons-excel:hover {
        background-color: white;
        border-color: #2e6da4;
        color: #2e6da4;
    }

    .buttons-pdf:hover {
        background-color: white;
        border-color: #d43f3a;
        color: #d43f3a;
    }

    .buttons-print:hover {
        background-color: white;
        border-color: #169f85;
        color: #169f85;
    }

    .dt-buttons {
        padding-bottom: 15px;
    }

    @media (max-width: 768px) {
        #example_wrapper {
            min-height: .01%;
            overflow-x: auto;
        }
    }
</style>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>اسم المادة</th>
                    <th>المعلمة </th>
                    <th> البرنامج</th>
                    <th> الشعبة</th>
                    <th> السنة الدراسية</th>
                    <th> الإجراء </th>
                </tr>
            </thead>
            <tbody>
                <?php
            $subject_edit = Auth::user()->permission->subject_edit != 'disable';
            $subject_delete = Auth::user()->permission->subject_delete != 'disable';
            $subject_view = Auth::user()->permission->subject_view != 'disable';
            $i = 1;
            ?>
                @foreach ($subjects as $subject)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->user->name }}</td>
                    <td>{{ $subject->sana_drsia->name }}</td>
                    <td>{{ $subject->section->name }}</td>
                    <td>{{ $subject->academic_year }}</td>
                    <td>
                        @if ($subject_edit)
                        <a href="/edit/{{ $subject->id }}/subject" class="btn btn-primary"><i
                                class="fas fa-user-edit"></i> تعديل</a>
                        @endif
                        @if ($subject_delete)
                        <a href="/delete/{{ $subject->id }}/subject" class="btn btn-danger"
                            onclick="return confirm('هل انت متاكد من انك تريد مسح هذه المادة الدراسية {{ $subject->name }} من قاعدة البايانات ؟')"><i
                                class="fas fa-trash-alt"></i> مسح</a>
                        @endif
                        @if ($subject_view)
                        <a href="/show/{{ $subject->id }}/subject" class="btn btn-success"><i class="fas fa-eye"></i>
                            مشاهدة</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>اسم المادة</th>
                    <th>المعلمة </th>
                    <th> البرنامج</th>
                    <th> الشعبة</th>
                    <th> السنة الدراسية</th>
                    <th> الإجراء </th>
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
