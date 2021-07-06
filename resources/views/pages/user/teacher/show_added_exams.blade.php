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
            <table id="example" class="table  table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم المادة</th>
                        <th>رقم الشعبة </th>
                        <th>رقم الاختبار </th>
                        {{-- <th>تاريخ الاختبار </th> --}}
                        <th> بداية الاختبار </th>
                        <th> انتهاء الاختبار</th>
                        <th>درجة الاختبار</th>
                        <th>زمن الاختبار</th>
                        <th>اضافة اسئلة</th>
                        <th>الاجراء</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($exam_data as $exam)
                        @php
                            $hours = floor($exam->timer / 3600);
                            $minutes = ($exam->timer / 60) % 60;

                        @endphp

                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $exam->subject->name }}</td>
                            <td>{{ $exam->section->name }}</td>
                            <td>{{ $exam->exam_no }}</td>
                            {{-- <td>{{ $exam->exam_date }}</td> --}}
                            <td>{{ date('Y-m-d h:i A', strtotime($exam->exam_open . ',' . $exam->exam_date)) }}</td>
                            <td>{{ date('Y-m-d h:i A', strtotime($exam->exam_close . ',' . $exam->exam_date)) }}</td>
                            <td>{{ $exam->grade }}</td>
                            <td>{{ $hours . ' ساعة و  ' . $minutes . ' دقيقة ' }}</td>
                            {{-- <td>{{ sprintf('%2d:%02d', $hours, $minutes) }}</td> --}}
                            <td><a class="btn btn-success" href="/add_questions_exam/{{ $exam->id }}"><i
                                        class="fa fa-plus"></i>اضافة اسئلة للاختبار</a></td>
                            <td>

                                <a href="{{ route('edit_exam', $exam->id) }}" class="btn btn-primary"><i
                                        class="fas fa-user-edit"></i>
                                    تعديل</a>

                                <a href="{{ route('delete_exam', $exam->id) }}" class="btn btn-danger"
                                    onclick="return confirm('هل انت متاكد من انك تريد حذف هذا الاختبار من قاعدة البيانات؟')"><i
                                        class="fas fa-trash-alt"></i> مسح</a>
                                <a href="{{ route('show_exam', $exam->id) }}" class="btn btn-info"><i
                                        class="fas fa-eye"></i>
                                    مشاهدة</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>اسم المادة</th>
                        <th>رقم الشعبة </th>
                        <th>رقم الاختبار </th>
                        {{-- <th>تاريخ الاختبار </th> --}}
                        <th> بداية الاختبار </th>
                        <th> انتهاء الاختبار</th>
                        <th>درجة الاختبار</th>
                        <th>زمن الاختبار</th>
                        <th>اضافة اسئلة</th>
                        <th>الاجراء</th>
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
        });

    </script>
@endsection
