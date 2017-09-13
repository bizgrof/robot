@extends('admin.layouts.master')

@section('page_header')
    Заказ {{ $order->id }}
@endsection

@section('content')
    @include('admin.parts.message')

    <div class="col-xs-12">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-list" style="margin-right: 5px;"></i>Данные заказчика</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table1 table-hover" style="width: inherit">
                    <tbody>
                    <tr>
                        <th>№ Заказа</th>
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr>
                        <th>Имя</th>
                        <td>{{$order->firstname}}</td>
                    </tr>
                    <tr>
                        <th>Фамилия</th>
                        <td>{{ $order->lastname }}</td>
                    </tr>
                    <tr>
                        <th>Отчество</th>
                        <td> {{$order->middlename}}</td>
                    </tr>
                    <tr>
                        <th>Телефон</th>
                        <td>{{ $order->phone }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $order->email }}</td>
                    </tr>
                    <tr>
                        <th>Адрес</th>
                        <td>{{ $order->address }}</td>
                    </tr>
                    <tr>
                        <th>Кол-во товаров</th>
                        <td>{{ $order->total_qty }} шт</td>
                    </tr>
                    <tr>
                        <th>Подарочная упаковка</th>
                        <td>{{ $order->gift_wrap }}</td>
                    </tr>
                    <tr>
                        <th>Комментарий</th>
                        <td>{{ $order->comment }}</td>
                    </tr>
                    <tr>
                        <th>Сумма</th>
                        <td>{{ $order->total_cost }} р.</td>
                    </tr>
                    <tr>
                        <th>Дата/Время</th>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Статус</th>
                        <td>{{ $order->status->name }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-list" style="margin-right: 5px;"></i>Товары</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover" >
                    <tbody>
                    <tr>
                        <th>Название товара</th>
                        <th>Цена</th>
                        <th>Кол-во (шт)</th>
                        <th>Сумма</th>
                    </tr>
                    @foreach($order->products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->qty }}</td>
                            <td>{{ $product->sum }} р.</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2"></td>
                        <th>Общее кол-во</th>
                        <th>Итого</th>
                    </tr>
                    <tr >
                        <td colspan="2"></td>
                        <td>{{ $order->total_qty }} шт.</td>
                        <td>{{ $order->total_cost }} р.</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <style>
        .table1 th{
            min-width: 250px;
        }
    </style>
@endsection