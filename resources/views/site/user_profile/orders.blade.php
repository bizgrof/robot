@extends('site.layouts.account')

@section('mete_title','Мои заказы')

@section('account_content')
    <div class="account__title">Мои заказы</div>
    <table class="table__account">
        <thead>
        <th>Номер заказа</th>
        <th>Атрибуты заказа</th>
        <th>Дата заказа</th>
        <th>Сумма заказа</th>
        </thead>
        <tbody>

        @forelse($orders as $order)
        <tr class="table__account_row">
            <td data-head="Номер заказа:" class="table__account_cell table__account_bottom">{{ $order->id }}</td>
            <td class="table__account_cell table__account_top">
                <div class="table__account_order">
                    <img src="./images/product/1_smaller.jpg" alt="undefined" class="table__account_image"/>
                    <div class="table__account_title">ENGINO INVENTOR</div>
                </div>
                <div class="table__account_order"><img src="./images/product/2_smaller.jpg" alt="undefined" class="table__account_image"/>
                    <div class="table__account_title">ENGINO INVENTOR</div>
                </div>
            </td>
            <td data-head="Дата заказа:" class="table__account_cell">27.07.2017</td>
            <td data-head="Сумма заказа:" class="table__account_cell table__account_price">21939.00 руб</td>
        </tr>
        @empty
            <p>Нет заказов</p>
        @endforelse
        </tbody>
    </table><a class="btn btn__cart">Перейти к покупкам</a>
@endsection