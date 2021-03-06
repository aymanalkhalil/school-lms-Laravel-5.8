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
        @php
            $get_questions = App\Question::where('exam_id', $id)
                ->with('exam')
                ->get();
            $get_grade = App\Exam::where('id', $id)->first();

        @endphp
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
                        action="{{ route('add_questions', $id) }}">
                        @csrf
                        <p>???????????? ???????????? ???? ?????????? ???????????????? ???????????? ????????????</p>
                        <span class="section">?????????? ?????????? ???????????????? </span>

                        <div class="item form-group">
                            <label class="control-label col-md-2 col-sm-3 col-xs-12">
                                <span class="required">???????????? ???????????? ?????? ???????????? </span>
                            </label>
                            <input type="radio" name="type" required id="true_false" value="true_false">
                            <label for="true_false">???? ????????</label>&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="type" required id="multiple" value="multiple">
                            <label for="multiple">???????????? ???? ??????????</label>

                        </div>
                        <div class="dragat">
                            <div id="block_multiple">
                                <span class="section"></span>

                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for=""> ????????????
                                    </label>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="question_mul"
                                            class="clearmul form-control has-feedback-left">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for=""> ??????????????1
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="answer_mul[]"
                                            class="clearmul form-control has-feedback-left">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for=""> ??????????????2
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="answer_mul[]"
                                            class="clearmul form-control has-feedback-left">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="">??????????????3
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="answer_mul[]"
                                            class="clearmul form-control has-feedback-left">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="">??????????????4
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="answer_mul[]"
                                            class="clearmul form-control has-feedback-left">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">
                                        <span class="required">?????????????? ??????????????</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="correct_answer_mul"
                                            class="clearmul form-control has-feedback-left">
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="">???????? ????????????
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" min="1" name="mark_mul"
                                            class="clearmul form-control has-feedback-left">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dragat">
                            <div id="block_true">
                                <span class="section"></span>

                                <p style="font-size:16pt">
                                </p>
                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">????????????</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="question_true"
                                            class="cleartrue form-control has-feedback-left">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">?????????????? ????????????</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" readonly name="answer_true[]" value="????"
                                            class="form-control has-feedback-left">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12">?????????????? ??????????????</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" readonly name="answer_true[]" value="??????"
                                            class="form-control has-feedback-left">
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12"> <span class="required">??????????????
                                            ??????????????</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select name="correct_answer_true" required class="form-control">
                                            <option disabled selected>???????????? ???????????? ?????????????? ??????????????</option>
                                            <option value="????">????</option>
                                            <option value="??????">??????</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-1 col-sm-3 col-xs-12" for="">???????? ????????????
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="number" min="1" name="mark_true"
                                            class="cleartrue form-control has-feedback-left">
                                    </div>
                                </div>



                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="submit" id="calculate" class="btn btn-success">??????
                                    ????????????</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
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
                        action="{{ route('add_questions', $id) }}">
                        @csrf
                        <p>???????????? ???????????? ???? ?????????? ???????????????? ???????????? ????????????</p>
                        <span class="section ">???????????? ????????????????</span>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="example" class="table  table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>????????????</th>
                                            <th>???????? ????????????</th>
                                            <th>?????????????? ?????????????? </th>
                                            {{-- <th>?????????? ???????? ???????????????? </th> --}}

                                            <th>??????????????</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                            $marks = [];
                                        @endphp

                                        @foreach ($get_questions as $questions)
                                            @php
                                                $marks[] = $questions->mark;
                                            @endphp
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $questions->question }}</td>
                                                <td>{{ $questions->mark }}</td>
                                                <td>{{ $questions->answer }}</td>


                                                <td>
                                                    <a href="/edit/{{ $questions->id }}/{{ $id }}/question"
                                                        class="btn btn-primary"><i class="fas fa-user-edit"></i>??????????
                                                        ????????????</a>
                                                    <a href="/show/{{ $questions->id }}/question" class="btn btn-info"><i
                                                            class="fas fa-eye"></i>
                                                        ???????????? </a>

                                                    <a href="/delete/{{ $questions->id }}/question" class="btn btn-danger"
                                                        onclick="return confirm('???? ?????? ?????????? ???? ?????? ???????? ?????? ?????? ???????????? ???? ?????????? ??????????????????')"><i
                                                            class="fas fa-trash-alt"></i> ??????</a>


                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>

                                            <th colspan="3" class="text-center">?????????? ?????????? ?????????????? ?????????????? :
                                                {{-- @empty(!array_sum($marks))
                                                    {{ array_sum($marks) }}

                                                @endempty --}}
                                                {{-- {{ !empty(array_sum($marks) ? array_sum($marks) : '') }} --}}
                                                @if (!empty(array_sum($marks)))
                                                    {{ array_sum($marks) }}
                                                @else
                                                    {{ 0 }}
                                                @endif
                                            </th>
                                            <th colspan="2">???????? ???????????????? ?????????????? : {{ $get_grade->grade }}</th>

                                        </tr>
                                        {{-- <tr>
                                        <td></td>
                                    </tr> --}}
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
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js">
    </script>
    <script>
        $(function() {
            // true_false
            // multiple
            $("#block_multiple").hide();
            $("#block_true").hide();
            $('input:radio[name=type]').change(function() {
                var checked_radio = $("input[name='type']:checked").val()
                if (checked_radio == "true_false") {
                    $("#block_true").show();
                    $(".clearmul").val("");
                    $("#block_multiple").hide();
                } else {

                    $("#block_multiple").show();
                    $(".cleartrue").val("");
                    $("#block_true").hide();
                }
            });
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
                        titleAttr: 'PDF',
                        footer: true
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
