@extends('site.layouts.app')

@section('content')

    <div class="container cart">

        @if(isset($cart))
        <h2 class="cart__title">Мои покупки
            <div class="borderline"></div>
        </h2>
        <table class="table__cart">
            <thead>
            <th>Продукт</th>
            <th>Кол-во</th>
            <th class="table__text_center">Цена</th>
            <th class="table__text_center">Сумма</th>
            <th></th>
            </thead>
            <tbody>

            @foreach($products as $product)
            <tr class="table__cart_row" id="cart_product_{{ $product->id }}">
                <td><img src="{{ 'p_thumbs/medium/'.$product->images->first()->name }}" alt="" class="table__cart_image"/>
                    <div class="table__cart_title">{{ $product->name }} <!--<span class="table__cart_subtitle">(120 моделей с мотором)</span>--></div>
                    <div class="table__cart_text">
                        <p>Конструктор ENGINO «120 моделей с мотором», из серии INVENTOR.</p>
                    </div>
                </td>
                <td data-head="Кол-во" class="table__cart_count">
                    <button class="arrow arrow__left" onclick="decCart({{$product->id}})"></button>
                    <input name="cart-1" value="{{ $cart['products'][$product->id]['qty'] }}" onchange="updateCount({{$product->id}},this)" class="table__cart_input"/>
                    <button class="arrow arrow__right" onclick="incCart({{$product->id}})"></button>
                </td>
                <td data-head="Цена за шт." class="table__cart_price">{{ $product->getPrice() }}</td>
                <td data-head="Итого" class="table__cart_total">{{ $cart['products'][$product->id]['cost'] }}</td>
                <td><a class="table__cart_remove" onclick="Cart.remove({{$product->id}})">X</a></td>
            </tr>
            @endforeach


            </tbody>
        </table>
        <div class="cart__total">
            <label class="cart_label">
                <input type="checkbox" class="cart_radio" name="gift_wrap">Подарочная упаковка
            </label>
            <div class="cart__sum">
                <div class="cart__sum_left">Сумма заказа: </div>
                <div class="cart__sum_black"><span class="cart_total_sum">{{ $cart['total_cost'] }}</span> руб.</div>
            </div>
        </div>
        <h2 class="cart__title">Оформление заказа
            <div class="borderline"></div>
        </h2>
        <div class="order">
            <!--=================== pickup =======================-->
            <div class="order__type">
                <form id="pickup">
                    <label class="order__label">
                        <input type="radio" name="order_type" class="order__type_radio" value="pickup">Самовывоз
                    </label>
                    <div class="order__contacts">
                        <p>Духовской пер. 17 с 1</p>
                        <p>+7 4953-91-37</p>
                        <p>пн-пт: 10:30-18</p>
                        <label class="order__label">
                            <div class="order__title">Телефон</div>
                            <input type="text" class="order__input" name="phone" @if($user)value="{{ $user->phone }}"@endif>
                        </label>
                        <label class="order__label">
                            <div class="order__title">E-mail</div>
                            <input type="email" class="order__input" name="email" @if($user)value="{{ $user->email }}"@endif>
                        </label>
                        <div class="order__map">
                        </div>
                    </div>
                </form>
            </div>
            <!--=================== END pickup =======================-->

            <!--=================== courier =======================-->
            <div class="order__type" >
                <form id="courier">
                    <label class="order__label">
                        <input type="radio" name="order_type" class="order__type_radio" value="courier">Доставка курьером
                    </label>
                    @if(!isset($user->phone))
                        <input type="tel" placeholder="Телефон" class="order__input" name="phone">
                    @else
                        <input type="hidden" name="phone" value="{{ $user->phone }}">
                    @endif

                    <input type="text" placeholder="Адрес" class="order__input" value="@if($user){{$user->address }}@endif" name="address">

                    @if(!isset($user->name))
                        <input type="text" placeholder="Имя" class="order__input" name="name">
                    @else
                        <input type="hidden" name="name" value="{{ $user->name }}">
                    @endif

                    @if(!isset($user->email))
                        <input type="email" placeholder="E-mail" class="order__input" name="email">
                    @else
                        <input type="hidden" name="email" value="{{ $user->email }}">
                    @endif
                    <textarea placeholder="Комментарий" class="order__textarea" name="comment"></textarea>
                </form>
            </div>
            <!--=================== END courier =======================-->

            @if (!Auth::check())
            <div class="order__type">
                <form class="modal__form" method="POST" action="{{ route('login') }}" id="form_login">
                    {{ csrf_field() }}
                    <div class="order__title">Уже покупали?</div>
                    <div class="order__text">Если вы уже оформляли заказ на нашем сайте, пожалуйста, введите имя пользователя и пароль в полях ниже.</div>
                    <label class="order__label">
                        <div class="order__title">Логин</div>
                        <input type="text" class="order__input" value="{{ old('email') }}" name="email" required>
                    </label>
                    <label class="order__label">
                        <div class="order__title">Пароль</div>
                        <input name="password" type="password" class="order__input">
                    </label>
                    <button class="btn btn__order_login">Войти</button>
                    <label class="order__label_remember">
                        <input type="checkbox" class="order__checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Запомнить меня?
                    </label><a href="#" class="btn__forgot">Забыли свой пароль ?</a>
                </form>
            </div>
            @endif

            <div class="order__total">Итого: <span class="order__total_black"><span class="cart_total_qty">{{ $cart['total_qty'] }}</span> </span>товара на сумму <span class="order__total_black"><span class="cart_total_sum">{{ $cart['total_cost'] }}</span> руб.</span></div>
            <label class="order__label">
                <input type="radio" name="pay_type" value="receipt_pay" class="order__radio order__radio_small">Оплатить при получении
            </label>
            <label class="order__label">
                <input type="radio" name="pay_type" value="card_pay" class="order__radio order__radio_small">Оплатить картой
            </label>
            <button class="btn btn__order" onclick="checkout()">Отправить заказ</button>
        </div>
        @else
            <h2 class="cart__title">Корзина пуста
                <div class="borderline"></div>
            </h2>
        @endif
    </div>


@endsection