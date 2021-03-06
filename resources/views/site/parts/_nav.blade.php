<div class="nav__mobile"><a href="/" class="nav__mobile_title">Robo-sapiens</a><img src="{{ asset('images/nav__mobile.svg') }}" alt="Menu" class="nav__mobile_button">
    <ul class="nav__mobile_list">
        <li class="nav__mobile_item"><a href="/" class="nav__mobile_link">Конструкторы</a></li>
        <li class="nav__mobile_item"><a href="/" class="nav__mobile_link">Игрушки</a></li>
        <li class="nav__mobile_item"><a href="/" class="nav__mobile_link">Коптеры</a></li>
        <li class="nav__mobile_item"><a href="/" class="nav__mobile_link">О нас</a></li>
        <li class="nav__mobile_item"><a href="/" class="nav__mobile_link">Обзоры</a></li>
        <li class="nav__mobile_item"><a href="/" class="nav__mobile_link">Контакты</a></li>
    </ul>
</div>
<div class="nav">
    <div class="nav__info">
        <div class="nav__contain">
            <div class="nav__left">
                <div class="nav__item">с 10-30 до 18-00</div>
                <div class="nav__item">т. +7(495) 003-91-37</div>
            </div>
            <div class="nav__right">
                <div class="social social__left"><img src="{{ asset('images/social-vkontakte.svg') }}" alt="vkontakte" class="social__image"><img src="../images/social-instagram.svg" alt="instagram" class="social__image"><img src="../images/social-facebook.svg" alt="facebook" class="social__image"></div>
                <div class="nav__auth">
                    @if (Auth::guest())
                        <a data-mfp-src="#modal-login" href="#" class="nav__auth_link js-modal">Вход</a>
                    @else
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Выйти
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <a href="{{ route('user.orders') }}" class="nav__auth_link">{{ Auth::user()->name }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="nav__contain">
        <div class="nav__content"><a href="/"><img src="{{ asset('images/logo.png') }}" alt="Логотип магазина" class="nav__logo"></a>
            <div class="nav__search">
                <input type="text" class="nav__left nav__search_input">
                <button class="nav__left btn__search"></button>
            </div>
            <div class="nav__cart">
                <a href="{{ route('cart.index') }}" class="nav__cart_link">Моя корзина</a>
                <div class="nav__cart_info">
                    <span id="cart_qty">{{ $cart['total_qty'] or 0 }}</span> позиции -
                    <span id="cart_sum">{{ isset($cart['total_cost']) ? $cart['total_cost'] : 0 }}</span> руб.</div>
            </div>
        </div>
        <ul class="nav__list">
            <li class="nav__item"><a href="{{ route('catalog.category','konstruktory') }}" class="nav__item_link">Конструкторы</a></li>
            <li class="nav__item"><a href="/" class="nav__item_link">Игрушки</a></li>
            <li class="nav__item"><a href="/" class="nav__item_link">Коптеры</a></li>
            <li class="nav__item"><a href="/" class="nav__item_link">О нас</a></li>
            <li class="nav__item"><a href="/" class="nav__item_link">Обзоры</a></li>
            <li class="nav__item"><a href="/" class="nav__item_link">Контакты</a></li>
        </ul>
    </div>
</div>
