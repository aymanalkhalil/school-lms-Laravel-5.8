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
                    <form class="form-horizontal form-label-left" method="POST"
                        action="{{ route('save_finance_record') }}">
                        @csrf

                        <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>
                        <span class="section">الادارة المالية</span>

                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">الشهر
                                <span class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="month" class="form-control">
                                    <option value="" disabled selected>الرجاء اختيار الشهر</option>
                                    <?php $months = ['يناير', 'فبراير', 'مارس', 'ابريل', 'مايو', 'يونيو',
                                    'يوليو', 'اغسطس', 'سبتمبر', 'اكتوبر', 'نوفمبر', 'ديسمبر']; ?>
                                    @foreach ($months as $month)
                                        <option value="{{ $month }}">{{ $month }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">السنة
                                <span class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="year" class="form-control">
                                    <option value="" disabled selected>الرجاء اختيار السنة</option>
                                    <?php $years = [2021, 2022, 2023, 2024, 2025, 2026, 2027, 2028, 2029,
                                    2030, 2040, 2041, 2042, 2043, 2044, 2045]; ?>

                                    @foreach ($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">الايرادات
                                <span class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" min="0" name="income" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">المصروفات
                                <span class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" min="0" name="expense" class="form-control">
                            </div>
                        </div>




                        </tbody>
                        </table>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button id="send" type="submit" class="btn btn-success">حفظ
                                    وارسال</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="x_panel">
            <span class="section">بيانات المصروفات والايرادات</span>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <table id="example" class="table  table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الشهر و السنة</th>
                            <th>الايرادات </th>
                            <th>المصروفات </th>
                            <th>اجمالي العائد </th>
                            <th>الاجراء </th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($all_finance as $finance)
                            @php
                                $total = $finance->income - $finance->expense;
                                $sum_income[] = $finance->income;
                                $sum_expense[] = $finance->expense;
                            @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $finance->month . ' - ' . $finance->year }}</td>
                                <td>{{ $finance->income }} ريال</td>
                                <td>{{ $finance->expense }} ريال</td>
                                <td>{{ $total_income[] = $total }} ريال</td>
                                <td>
                                    <a href="{{ route('edit_finance', $finance->id) }}" class="btn btn-primary"><i
                                            class="fas fa-user-edit"></i> تعديل</a>

                                    <a href="{{ route('delete_finance', $finance->id) }}" class="btn btn-danger"
                                        onclick="return confirm('هل انت متاكد من انك تريد حذف البيانات ؟')"><i
                                            class="fas fa-trash-alt"></i> مسح</a>

                                </td>

                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="background-color:#f9f9f9">1</th>
                            <th class="bg-primary ">الإجمالي</th>

                            <th colspan="1" class="bg-success text-right">
                                {{ !empty($sum_income) ? array_sum($sum_income) . ' ريال ' : 0 }}
                            </th>
                            <th colspan="1" class="bg-success text-right">
                                {{ !empty($sum_expense) ? array_sum($sum_expense) . ' ريال ' : 0 }}
                            </th>
                            <th colspan="1" class="bg-success text-right">
                                {{ !empty($total_income) ? array_sum($total_income) . ' ريال ' : 0 }}
                            </th>

                        </tr>
                    </tfoot>
                </table>
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
                        titleAttr: 'Excel',
                        footer: true
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        titleAttr: 'PDF'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Print',
                        titleAttr: 'Print',
                        footer: true
                    },
                ]
            });


        });

    </script>
@endsection
