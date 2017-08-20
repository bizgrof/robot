@extends('site.layouts.app')

@section('content')

    <div class="container cart">
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
            <tr class="table__cart_row">
                <td><img src="./images/product/1.jpg" alt="" class="table__cart_image"/>
                    <div class="table__cart_title">ENGINO INVENTOR <span class="table__cart_subtitle">(120 моделей с мотором)</span></div>
                    <div class="table__cart_text">
                        <p>Конструктор ENGINO «120 моделей с мотором», из серии INVENTOR.</p>
                    </div>
                </td>
                <td data-head="Кол-во" class="table__cart_count">
                    <button class="arrow arrow__left"></button>
                    <input name="cart-1" value="1" class="table__cart_input"/>
                    <button class="arrow arrow__right"></button>
                </td>
                <td data-head="Цена за шт." class="table__cart_price">5 569</td>
                <td data-head="Итого" class="table__cart_total">5 569</td>
                <td><a href="#" class="table__cart_remove">X</a></td>
            </tr>
            <tr class="table__cart_row">
                <td><img src="./images/product/2.jpg" alt="" class="table__cart_image"/>
                    <div class="table__cart_title">ENGINO INVENTOR <span class="table__cart_subtitle">(120 моделей с мотором)</span></div>
                    <div class="table__cart_text">
                        <p>Конструктор ENGINO «120 моделей с мотором», из серии INVENTOR.</p>
                    </div>
                </td>
                <td data-head="Кол-во" class="table__cart_count">
                    <button class="arrow arrow__left"></button>
                    <input name="cart-2" value="1" class="table__cart_input"/>
                    <button class="arrow arrow__right"></button>
                </td>
                <td data-head="Цена за шт." class="table__cart_price">5 569</td>
                <td data-head="Итого" class="table__cart_total">5 569</td>
                <td><a href="#" class="table__cart_remove">X</a></td>
            </tr>
            </tbody>
        </table>
        <div class="cart__total">
            <label class="cart_label">
                <input type="checkbox" class="cart_radio">Подарочная упаковка
            </label>
            <div class="cart__sum">
                <div class="cart__sum_left">Сумма заказа: </div>
                <div class="cart__sum_black">8698 руб.</div>
            </div>
        </div>
        <h2 class="cart__title">Оформление заказа
            <div class="borderline"></div>
        </h2>
        <div class="order">
            <div class="order__type">
                <label class="order__label">
                    <input type="radio" name="order_type" class="order__type_radio">Самовывоз
                </label>
                <div class="order__contacts">
                    <p>Духовской пер. 17 с 1</p>
                    <p>+7 4953-91-37</p>
                    <p>пн-пт: 10:30-18</p>
                    <label class="order__label">
                        <div class="order__title">Телефон или электронная почта</div>
                        <input type="text" class="order__input">
                    </label>
                    <div class="order__map">
                    </div>
                </div>
            </div>
            <div class="order__type">
                <label class="order__label">
                    <input type="radio" name="order_type" class="order__type_radio">Доставка курьером
                </label>
                <input type="tel" placeholder="Телефон" class="order__input">
                <input type="text" placeholder="Адрес" class="order__input">
                <input type="text" placeholder="Имя" class="order__input">
                <input type="email" placeholder="E-mail" class="order__input">
                <textarea placeholder="Комментарий" class="order__textarea"></textarea>
            </div>
            <div class="order__type">
                <div class="order__title">Уже покупали?</div>
                <div class="order__text">Если вы уже оформляли заказ на нашем сайте, пожалуйста, введите имя пользователя и пароль в полях ниже.</div>
                <label class="order__label">
                    <div class="order__title">Логин</div>
                    <input type="text" class="order__input">
                </label>
                <label class="order__label">
                    <div class="order__title">Пароль</div>
                    <input type="password" class="order__input">
                </label>
                <button class="btn btn__order_login">Войти</button>
                <label class="order__label_remember">
                    <input type="checkbox" class="order__checkbox">Запомнить меня?
                </label><a href="#" class="btn__forgot">Забыли свой пароль ?</a>
            </div>
            <div class="order__total">Итого: <span class="order__total_black">3 </span>товара на сумму <span class="order__total_black">17 097 руб.</span></div>
            <label class="order__label">
                <input type="radio" name="pay" class="order__radio order__radio_small">Оплатить при получении
            </label>
            <label class="order__label">
                <input type="radio" name="pay" class="order__radio order__radio_small">Оплатить картой
            </label>
            <button class="btn btn__order">Отправить заказ</button>
        </div>
    </div>


@endsection