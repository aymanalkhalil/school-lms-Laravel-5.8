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
        <span class="section text-center">جميع اعضاء هيئة التدريس</span>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>رقم الهوية او جواز السفر </th>
                        <th>الاجراء </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $student_edit = Auth::user()->permission->student_edit != 'disable';
                    $student_delete = Auth::user()->permission->subject_delete != 'disable';
                    $student_view = Auth::user()->permission->student_view != 'disable';
                    $finance = Auth::user()->permission->finance != 'disable';
                    ?>
                    @foreach ($all_mod as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->National_ID }}</td>
                            <td>

                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#exampleModalCenter{{ $i }}">
                                    <i class="fa fa-money"></i> اضافة الراتب
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter{{ $i }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle"> اضافة الراتب لعضو هيئة
                                                    التدريس
                                                    <label for="" class="text-primary">{{ $item->name }}</label>
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('save_teacher_salaries') }}" method="post">
                                                @csrf
                                                <div class="modal-body">

                                                    <div class="form-group">
                                                        <label for="">التاريخ</label>
                                                        <input type="date" class="form-control" name="date">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">الراتب</label>
                                                        <input type="number" class="form-control" min="1" name="salary">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">البيان</label>
                                                        <textarea id="" class="form-control" name="description" cols="10"
                                                            rows="5"></textarea>
                                                    </div>



                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">إغلاق</button>
                                                    <input type="hidden" name="user_id" value="{{ $item->id }}">
                                                    <button type="submit" class="btn btn-success">حفظ وارسال</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp

                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>رقم الهوية او جواز السفر </th>
                        <th>الاجراء </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row">
        <span class="section text-center"> بيانات رواتب أعضاء هيئة التدريس </span>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <table id="example1" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>التاريخ </th>
                        <th>البيان</th>
                        <th>المبلغ </th>
                        <th>الاجراء</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $student_edit = Auth::user()->permission->student_edit != 'disable';
                    $student_delete = Auth::user()->permission->subject_delete != 'disable';
                    $student_view = Auth::user()->permission->student_view != 'disable';
                    $finance = Auth::user()->permission->finance != 'disable';
                    ?>
                    @foreach ($all_salaries as $salaries)
                        @if ($salaries->user->role == 2)



                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $salaries->user->name }}</td>
                                <td>{{ $salaries->date }}</td>
                                <td>{{ $salaries->description }}</td>
                                <td>{{ $salaries->salary }}</td>

                                </td>
                                <td>
                                    <a href="{{ route('edit_salary_teacher', $salaries->id) }}"
                                        class="btn btn-primary"><i class="fas fa-user-edit"></i>
                                        تعديل</a>
                                    <a href="{{ route('delete_salary_teacher', $salaries->id) }}" class="btn btn-danger"
                                        onclick="return confirm('هل انت متاكد من انك تريد مسح  بيانات الراتب من قاعدة البيانات ؟')"><i
                                            class="fas fa-trash-alt"></i> مسح</a>

                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endif
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>

                        <th>التاريخ </th>
                        <th>البيان</th>
                        <th>المبلغ </th>
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
        });

    </script>
@endsection
