@extends('admin.layouts.master')

@section('page_header')
    Заказы
@endsection

@section('content')
    @include('admin.parts.message')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Фильтр</h3>
        </div>
        <div class="box-body table-responsive no-padding">
            {{--<form action="" method="get">--}}
                {{--{{ csrf_field() }}--}}
                {{--<div class="col-xs-4">--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="order_id" class="control-label">Заказ №</label>--}}
                        {{--<input type="text" value="{{ Request::input('order_id') }}" id="order_id" name="order_id" class="form-control" placeholder="Заказ №">--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-xs-4">--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="person_name" class="control-label">Покупатель</label>--}}
{{--                        <input type="text" value="{{ Request::input('person_name') }}" id="person_name" name="person_name" class="form-control" placeholder="Покупатель">--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-xs-4">--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="phone" class="control-label">Телефон</label>--}}
                        {{--<input type="text" value="{{ Request::input('phone') }}" id="phone" name="phone" class="form-control" placeholder="Телефон">--}}
                    {{--</div>--}}
                {{--</div>--}}



                {{--<div class="col-xs-4">--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="city" class="control-label">Город</label>--}}
                        {{--<input type="text" value="{{ Request::input('city') }}" id="city" name="city" class="form-control" placeholder="Город">--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-xs-4">--}}
                    {{--<div class="form-group">--}}
                        {{--<label for="status" class="control-label">Статус</label>--}}
                        {{--<select name="status" id="status" placeholder="Статус" class="form-control" >--}}
                            {{--<option value=""></option>--}}
                            {{--@foreach($statuses as $status)--}}
                                {{--<option value="{{$status->id}}"--}}
                                        {{--@if(Request::input('status') == $status->id) selected @endif--}}
                                {{-->{{ $status->name }}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}

                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-xs-4">--}}
                    {{--<div class="row">--}}
                        {{--<div class="form-group col-xs-12">--}}
                            {{--<label for="date_time_start" class="control-label">Дата добавления</label>--}}
                            {{--<div class="input-group date">--}}
                                {{--<div class="input-group-addon">--}}
                                    {{--<i class="fa fa-calendar"></i>--}}
                                {{--</div>--}}
                                {{--<input type="text" value="{{ Request::input('date_time_start') }}" class="form-control pull-right" id="date_time_start" name="date_time_start" >--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<!----}}
                            {{--<div class="form-group col-xs-6">--}}
                                {{--<label for="date_time_end" class="control-label">Конец</label>--}}
                                {{--<div class="input-group date">--}}
                                    {{--<div class="input-group-addon">--}}
                                        {{--<i class="fa fa-calendar"></i>--}}
                                    {{--</div>--}}
                                    {{--<input type="text" class="form-control pull-right" id="date_time_end" name="date_time_end" >--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{---->--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-xs-4">--}}
                    {{--<div class="form-group">--}}
{{--                        <a href="{{ Route('admin.orders') }}" class="btn btn-default">Сбросить</a>--}}
                        {{--<input type="submit" value="Фильтр" class="btn btn-primary">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</form>--}}
        </div>
    </div>




    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-list" style="margin-right: 5px;"></i>Список заказов</h3>

        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th>№ Заказа</th>
                    <th>Ф.И.О</th>
                    <th>Телефон</th>
                    <th>Кол-во товаров</th>
                    <th>Сумма</th>
                    <th>Статус</th>
                    <th>Дата/Время</th>
                    <th></th>
                </tr>
                @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->lastname }} {{$order->firstname}} {{$order->middlename}}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->total_qty }} шт</td>
                        <td>{{ $order->total_cost }} р.</td>
                        <td>{{ $order->status->name }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <a href="{{ route('order.show',$order->id) }}" class="btn btn-primary glyphicon glyphicon-eye-open"></a>
                            {{--<a href="{{ route('admin.order.edit',$order->id) }}" class="btn btn-success glyphicon glyphicon glyphicon-edit"></a>--}}
                            {{--<a href="{{ route('admin.order.delete',$order->id) }}" class="btn btn-danger glyphicon glyphicon-trash"></a>--}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">Нечего не найдено</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>

    <script>

        $(function(){

            $.fn.datepicker.dates['ru'] = {
                days: ["Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота"],
                daysShort: ["Вск", "Пнд", "Втр", "Срд", "Чтв", "Птн", "Суб"],
                daysMin: ["Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб"],
                months: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"],
                monthsShort: ["Янв", "Фев", "Мар", "Апр", "Май", "Июн", "Июл", "Авг", "Сен", "Окт", "Ноя", "Дек"],
                today: "Сегодня",
                clear: "Очистить",
                format: "dd.mm.yyyy",
                weekStart: 1,
                monthsTitle: 'Месяцы'
            };

            $('#date_time_start,#date_time_end').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd',

            });

        });



    </script>

    <link rel="stylesheet" href="{{asset('admin_assets/plugins/datepicker/datepicker3.css')}}">
    <script src="{{asset('admin_assets/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
    <script>

    </script>
@endsection