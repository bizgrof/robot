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
                @foreach($order->products as $product)
                <div class="table__account_order">
                    <img src="{{ asset('p_thumbs/medium/'. $product->product->images->first()->name) }}" alt="undefined" class="table__account_image"/>
                    <div class="table__account_title">{{ $product->name }}</div>
                </div>
                @endforeach
            </td>
            <td data-head="Дата заказа:" class="table__account_cell">{{ $order->created_at }}</td>
            <td data-head="Сумма заказа:" class="table__account_cell table__account_price">{{ $order->total_cost }} руб</td>
        </tr>
        @empty
            <p>Нет заказов</p>
        @endforelse
        </tbody>
    </table><a class="btn btn__cart">Перейти к покупкам</a>
@endsection