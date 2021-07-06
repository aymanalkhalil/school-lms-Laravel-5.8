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
    {{-- Example --}}
    <div class="row">
        <span class="section text-center">طالبات الشعبة</span>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <table id="example" class="table  table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الطالبة</th>
                        <th>اسم المادة</th>
                        <th>رقم الشعبة </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;

                    $get_subject_name = App\Subject::where('id', $subject_id)->first();
                    ?>
                    @foreach ($user as $data_user)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $data_user->user->name }}</td>
                            <td>{{ $get_subject_name->name }}</td>
                            <td>{{ $data_user->section->name }}</td>


                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>اسم الطالبة</th>
                        <th>اسم المادة</th>
                        <th>رقم الشعبة </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {{-- Example 1 --}}
    <div class="row">
        <span class="section text-center">درجات الواجبات</span>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <table id="example1" class="table  table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الطالبة</th>
                        <th> المجموع </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    global $mark1;
                    global $mark2;
                    global $mark3;
                    global $mark4;
                    global $mark5;
                    ?>
                    @foreach ($user_assignment as $upload)
                        @if ($upload->student->sana == $section_id)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $upload->name }}</td>
                                @foreach ($assignment as $assignment_data)
                                    @foreach ($upload->assignment_upload as $uploaded)

                                        @if ($assignment_data->id == $uploaded->assignment_id)
                                            @php
                                                $uploaded->hw_number == 'الاول' ? ($mark1 = $uploaded->mark) : '';
                                                $uploaded->hw_number == 'الثاني' ? ($mark2 = $uploaded->mark) : '';
                                                $uploaded->hw_number == 'الثالث' ? ($mark3 = $uploaded->mark) : '';
                                                $uploaded->hw_number == 'الرابع' ? ($mark4 = $uploaded->mark) : '';
                                                $uploaded->hw_number == 'الخامس' ? ($mark5 = $uploaded->mark) : '';

                                                $sum = $mark1 + $mark2 + $mark3 + $mark4 + $mark5;
                                            @endphp
                                        @endif
                                    @endforeach
                                @endforeach

                                <td>{{ !empty($sum) ? $sum : 0 }}</td>
                        @endif
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>

                        <th colspan="3" class="text-danger text-center">ملاحظة مهمة : في حالة عدم ظهور اسم الطالبة فهذا يعني
                            انها لم تسلم الواجب </th>


                    </tr>
                </tfoot>
            </table>
        </div>
    </div>


    {{-- Example 2 --}}
    <div class="row">
        <span class="section text-center">درجات الاختبارات</span>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <table id="example2" class="table  table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم الطالبة</th>
                        <th>المجموع </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    global $markE1;
                    global $markE2;
                    global $markE3;
                    global $markEfinal;
                    global $sumExam;
                    ?>

                    @foreach ($user_exam as $exam_data)

                        @if ($exam_data->student->sana == $section_id)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $exam_data->name }}</td>
                                @foreach ($exams as $exam)
                                    @foreach ($exam_data->exam as $item)
                                        @if ($exam->id == $item->exam_id)

                                            @php

                                                $item->exam_no == 'الاول' ? ($markE1 = $item->grade) : '';
                                                $item->exam_no == 'الثاني' ? ($markE2 = $item->grade) : '';
                                                $item->exam_no == 'الثالث' ? ($markE3 = $item->grade) : '';
                                                $item->exam_no == 'النهائي' ? ($markEfinal = $item->grade) : '';

                                                $sumExam = $markE1 + $markE2 + $markE3 + $markEfinal;
                                            @endphp
                                        @endif
                                    @endforeach
                                @endforeach

                                <td>{{ $sumExam }}</td>
                        @endif
                        </tr>

                    @endforeach
                </tbody>
                <tfoot>
                    <tr>

                        <th colspan="3" class="text-danger text-center">ملاحظة مهمة : في حالة عدم ظهور اسم الطالبة فهذا يعني
                            انها لم تقدم الاختبار </th>

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
            $('#example').DataTable({
                aLengthMenu: [
                    [25, 50, 100, 200, -1],
                    [25, 50, 100, 200, "All"]
                ],
                dom: 'Blfrtip',
                buttons: [

                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i> Excel',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        titleAttr: 'PDF'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Print',
                        titleAttr: 'Print'
                    },
                ]
            });
            $('#example1').DataTable({
                aLengthMenu: [
                    [25, 50, 100, 200, -1],
                    [25, 50, 100, 200, "All"]
                ],
                dom: 'Blfrtip',
                buttons: [

                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i> Excel',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        titleAttr: 'PDF'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Print',
                        titleAttr: 'Print'
                    },
                ]
            });
            $('#example2').DataTable({
                aLengthMenu: [
                    [25, 50, 100, 200, -1],
                    [25, 50, 100, 200, "All"]
                ],
                dom: 'Blfrtip',
                buttons: [

                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i> Excel',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        titleAttr: 'PDF'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Print',
                        titleAttr: 'Print'
                    },
                ]
            });
        });

    </script>
@endsection
