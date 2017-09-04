@extends('site.layouts.app')

@section('content')


    <div class="container product">
        <div class="product__thumbmail">
            <div class="product__thumbmail_common">
                @isset( $product->video )<!--<iframe width="490" height="540" src="https://www.youtube.com/embed/il2rDA7Nw4U" frameborder="0" allowfullscreen></iframe>-->@endisset
                @foreach( $product->images as $image)
                <div><img src="{{ asset('p_thumbs/extra_large/'.$image->name) }}" alt="{{ $product->name }}" class="product__thumbmail_large"></div>
                @endforeach
            </div>
            <div class="product__thumbmail_pager">
                @isset( $product->video )<!--<div><iframe width="160" height="105" src="{{ $product->video }}" frameborder="0" allowfullscreen> </iframe></div>-->@endisset
                @foreach( $product->images as $image)
                    <div><img src="{{ asset('p_thumbs/medium/'.$image->name) }}" ></div>
                @endforeach
            </div>
        </div>
        <div class="product__info">
            <h1 class="product__title">{{ $product->name }}</h1>
            <div class="product__buy">
                <div class="product__price">{{ $product->getPrice() }} руб</div>
                <input type="number" value="1" class="product__count" min="1">
                <div class="product__button">
                    <button class="arrow__up arrow__product"></button>
                    <button class="arrow__down arrow__product"></button>
                </div><button class="btn" onclick="addToCart({{ $product->id }})">В корзину</button>
                <div id="product__tabs">
                    <ul class="product__tab_control">
                        <li class="product__tab_item"><a href="#product__tabs-2" class="product__tab_link">Характеристики</a></li>
                        <li class="product__tab_item"><a href="#product__tabs-1" class="product__tab_link">Описание</a></li>
                    </ul>
                    <div id="product__tabs-1" class="product__tab_text">
                        {{ $product->description }}
                    </div>
                    <div id="product__tabs-2" class="product__tab_text">
                        <table class="product__table">
                            <tbody>
                            @isset( $product->weight )<tr><td>Вес:</td><td>{{ $product->weight }}g</td></tr>@endisset
                            @isset( $product->size )<tr><td>Габариты:</td><td>{{ $product->size }}cm</td></tr>@endisset
                            @isset( $product->material )<tr><td>Материал:</td><td>{{ $product->material->name }}</td></tr>@endisset
                            @isset( $product->age )<tr><td>Возраст от:</td><td>{{ $product->age }} лет</td></tr>@endisset
                            @isset( $product->manufacturer )<tr><td>Производитель:</td><td>{{ $product->manufacturer->name }}</td></tr>@endisset
                            @isset( $product->country )<tr><td>Страна:</td><td>{{ $product->country->name }}</td></tr>@endisset
                            @isset( $product->control )<tr><td>Управление:</td><td>{{ $product->control }}</td></tr>@endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>




        {{--<div class="features">--}}
            {{--<div class="feature"><img src="./images/features/feature__cart.svg" alt="cart" class="feature__image"/>--}}
                {{--<div class="feature__title">Есть в наличии!</div>--}}
                {{--<div class="feature__content">Все товары, перечисленные  на сайте, есть в наличии.</div>--}}
            {{--</div>--}}
            {{--<div class="feature"><img src="./images/features/feature__battery.svg" alt="battery" class="feature__image"/>--}}
                {{--<div class="feature__title">Батарейки в наличии!</div>--}}
                {{--<div class="feature__content">Также в комплект любого  нашего продукта входят батарейки</div>--}}
            {{--</div>--}}
            {{--<div class="feature"><img src="./images/features/feature__gift.svg" alt="gift" class="feature__image"/>--}}
                {{--<div class="feature__title">Подарочная упаковка!</div>--}}
                {{--<div class="feature__content"> Мы продумаем и обеспечим подарочную упаковку.</div>--}}
            {{--</div>--}}
            {{--<div class="feature"><img src="./images/features/feature__watch.svg" alt="Watch" class="feature__image"/>--}}
                {{--<div class="feature__title">Работаем быстро!</div>--}}
                {{--<div class="feature__content">Наши менеджеры ценят время наших клиентов и прилагают все усилия.</div>--}}
            {{--</div>--}}
        {{--</div>--}}





        {{--<div class="section__title">Похожие товары</div>--}}
        {{--<div class="product__related_items">--}}
            {{--<div class="product__related_toolbar"></div>--}}
            {{--<div class="product__related_slick">--}}
                {{--<div class="product__item product__related"><a href="/product.html"><img src="./images/product/2.jpg" alt="undefined" class="product__item_image">--}}
                        {{--<h2 class="product__item_title">Зарядное устройство LEGO</h2></a>--}}
                    {{--<div class="product__item_count">(162 моделей с мотором)</div>--}}
                    {{--<div class="product__item_price">20031 руб.</div><a href="/product.html" class="btn btn__cart">В корзину</a></div>--}}
                {{--<div class="product__item product__related"><a href="/product.html"><img src="./images/product/1.jpg" alt="undefined" class="product__item_image">--}}
                        {{--<h2 class="product__item_title">Arduino Матрешка</h2></a>--}}
                    {{--<div class="product__item_count">(116 моделей с мотором)</div>--}}
                    {{--<div class="product__item_price">21849 руб.</div><a href="/product.html" class="btn btn__cart">В корзину</a></div>--}}
                {{--<div class="product__item product__related"><a href="/product.html"><img src="./images/product/1.jpg" alt="undefined" class="product__item_image">--}}
                        {{--<h2 class="product__item_title">Inventor Engine</h2></a>--}}
                    {{--<div class="product__item_count">(81 моделей с мотором)</div>--}}
                    {{--<div class="product__item_price">1380 руб.</div><a href="/product.html" class="btn btn__cart">В корзину</a></div>--}}
                {{--<div class="product__item product__related"><a href="/product.html"><img src="./images/product/2.jpg" alt="undefined" class="product__item_image">--}}
                        {{--<h2 class="product__item_title">Робот-собакен</h2></a>--}}
                    {{--<div class="product__item_count">(30 моделей с мотором)</div>--}}
                    {{--<div class="product__item_price">21784 руб.</div><a href="/product.html" class="btn btn__cart">В корзину</a></div>--}}
                {{--<div class="product__item product__related"><a href="/product.html"><img src="./images/product/1.jpg" alt="undefined" class="product__item_image">--}}
                        {{--<h2 class="product__item_title">Утилизатор людей</h2></a>--}}
                    {{--<div class="product__item_count">(115 моделей с мотором)</div>--}}
                    {{--<div class="product__item_price">3432 руб.</div><a href="/product.html" class="btn btn__cart">В корзину</a></div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{----}}


    </div>

@endsection