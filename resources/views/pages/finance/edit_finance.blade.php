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
                    <form class="form-horizontal form-label-left" method="POST"
                        action="{{ route('update_finance', $id->id) }}">
                        @csrf
                        @method("PUT")

                        <p>الرجاء التأكد من ادخال البيانات بالشكل الصحيح</p>
                        <span class="section">تعديل البيانات المالية</span>

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
                                        <option value="{{ $month }}" {{ $month == $id->month ? 'selected' : '' }}>
                                            {{ $month }}</option>
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
                                        <option value="{{ $year }}" {{ $year == $id->year ? 'selected' : '' }}>
                                            {{ $year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">الايرادات
                                <span class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" min="0" value="{{ $id->income }}" name="income" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">المصروفات
                                <span class="required">مطلوب</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="number" min="0" value="{{ $id->expense }}" name="expense"
                                    class="form-control">
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
@endsection
