@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@extends('layouts.app')
@section('content')
    <form class="form-horizontal form-label-left" method="POST" action="/absent/{{ $no }}/{{ $facultie }}">
        @csrf
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>حضور</th>
                            <th>غياب</th>
                            <th>استأذن</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $student->user->name }}</td>
                                <td>
                                    <input type="radio" class="disabled-input" data-id="{{ $student->user->id }}"
                                        name="status[]{{ $student->user->id }}" value="{{ $student->user->id }}-active">
                                </td>
                                <td>
                                    <input type="radio" class="disabled-input" data-id="{{ $student->user->id }}"
                                        name="status[]{{ $student->user->id }}"
                                        value="{{ $student->user->id }}-Notactive">
                                </td>
                                <td>
                                    <input type="radio" class="status-excuse" data-id="{{ $student->user->id }}"
                                        name="status[]{{ $student->user->id }}"
                                        value="{{ $student->user->id }}-excuse">
                                    <input type="text" disabled name="nota[]" required="required"
                                        class="form-control col-md-7 col-xs-12 status-excuse-{{ $student->user->id }}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>حضور</th>
                            <th>غياب</th>
                            <th>استأذن</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <button type="submit" class="btn btn-success">حفظ وارسال</button>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $(".status-excuse").click(function() {
                var id = $(this).data('id');
                $(`.status-excuse-` + id + ``).removeAttr('disabled');
            });
            $(".disabled-input").click(function() {
                var id = $(this).data('id');
                $(`.status-excuse-` + id + ``).attr("disabled", true);
            });

        });

    </script>
@endsection
