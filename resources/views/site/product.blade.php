@extends('site.layouts.app')

@section('content')

    <div class="container product">
        <div class="product__thumbmail">
            <div class="product__thumbmail_common">
                <div><img src="./images/product/1_larger.jpg" alt="Engino Inventor" class="product__thumbmail_large"></div>
                <div><img src="./images/product/2_larger.jpg" alt="Engino Inventor" class="product__thumbmail_large"></div>
                <div><img src="./images/product/3_larger.jpg" alt="Engino Inventor" class="product__thumbmail_large"></div>
                <div><img src="./images/product/4_larger.jpg" alt="Engino Inventor" class="product__thumbmail_large"></div>
            </div>
            <div class="product__thumbmail_pager">
                <div><img src="./images/product/carousel/1.jpg" alt="1"></div>
                <div><img src="./images/product/carousel/2.jpg" alt="2"></div>
                <div><img src="./images/product/carousel/3.jpg" alt="3"></div>
                <div><img src="./images/product/carousel/4.jpg" alt="3"></div>
            </div>
        </div>
        <div class="product__info">
            <h1 class="product__title">ENGINO INVENTOR</h1>
            <div class="product__buy">
                <div class="product__price">5 699 руб</div>
                <input type="number" value="1" class="product__count">
                <div class="product__button">
                    <button class="arrow__up arrow__product"></button>
                    <button class="arrow__down arrow__product"></button>
                </div><a class="btn">В корзину</a>
                <div id="product__tabs">
                    <ul class="product__tab_control">
                        <li class="product__tab_item"><a href="#product__tabs-2" class="product__tab_link">Характеристики</a></li>
                        <li class="product__tab_item"><a href="#product__tabs-1" class="product__tab_link">Описание</a></li>
                    </ul>
                    <div id="product__tabs-1" class="product__tab_text">
                        <p>Конструктор ENGINO «120 моделей с мотором», из серии INVENTOR, предназначен для юных изобретателей от 6 лет и старше. Из деталей набора, с помощью пошаговой инструкции, можно собрать по очереди 120 различных моделей, которые можно будет привести в движение с помощью входящего в состав набора электромотора.</p>
                        <p>В инструкции даны схемы-картинки для сборки 4 моделей, а схемы остальных 116 моделей есть на официальном сайте производителя.</p>
                        <p>Основные детали конструктора – длинные стержни с разъемами для крепления, многогранники, которые соединяют стержни в любом из шести направлений и крепежные элементы для поворотных или фиксирующих соединений. Ни в одном другом конструкторе вы не найдете такого огромного количества способов крепления деталей. Стержни могут выдвигаться, соединяться Т-образно, выстраиваться в прямую линию, поворачиваться в любом направлении и крепиться под любым углом.</p>
                        <p>Легко освоив инновационные способы крепления деталей, юный техник получит возможность выйти за рамки инструкций и собрать своими руками уникальные 3D-модели. Детали всех конструкторов Engino совместимы между собой, что позволяет ребенку дать волю своей фантазии и творческим способностям, создавая интересные масштабные конструкции! Игра и конструирование с Engino способствует развитию логического и пространственного мышления, творческих способностей, сенсорного восприятия, фантазии, воображения и наблюдательности.</p>
                    </div>
                    <div id="product__tabs-2" class="product__tab_text">
                        <table class="product__table">
                            <tbody>
                            <tr>
                                <td>Вес:</td>
                                <td>1 320g</td>
                            </tr>
                            <tr>
                                <td>Габариты:</td>
                                <td>37 х 48 х 7cm</td>
                            </tr>
                            <tr>
                                <td>Материал:</td>
                                <td>Пластик</td>
                            </tr>
                            <tr>
                                <td>Тип:</td>
                                <td>Игровые</td>
                            </tr>
                            <tr>
                                <td>Возраст от:</td>
                                <td>6 лет</td>
                            </tr>
                            <tr>
                                <td>Производитель:</td>
                                <td>ENGINO</td>
                            </tr>
                            <tr>
                                <td>Страна:</td>
                                <td>Кипр</td>
                            </tr>
                            <tr>
                                <td>Управление:</td>
                                <td>Неуправляемые</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="features">
            <div class="feature"><img src="./images/features/feature__cart.svg" alt="cart" class="feature__image"/>
                <div class="feature__title">Есть в наличии!</div>
                <div class="feature__content">Все товары, перечисленные  на сайте, есть в наличии.</div>
            </div>
            <div class="feature"><img src="./images/features/feature__battery.svg" alt="battery" class="feature__image"/>
                <div class="feature__title">Батарейки в наличии!</div>
                <div class="feature__content">Также в комплект любого  нашего продукта входят батарейки</div>
            </div>
            <div class="feature"><img src="./images/features/feature__gift.svg" alt="gift" class="feature__image"/>
                <div class="feature__title">Подарочная упаковка!</div>
                <div class="feature__content"> Мы продумаем и обеспечим подарочную упаковку.</div>
            </div>
            <div class="feature"><img src="./images/features/feature__watch.svg" alt="Watch" class="feature__image"/>
                <div class="feature__title">Работаем быстро!</div>
                <div class="feature__content">Наши менеджеры ценят время наших клиентов и прилагают все усилия.</div>
            </div>
        </div>
        <div class="section__title">Похожие товары</div>
        <div class="product__related_items">
            <div class="product__related_toolbar"></div>
            <div class="product__related_slick">
                <div class="product__item product__related"><a href="/product.html"><img src="./images/product/2.jpg" alt="undefined" class="product__item_image">
                        <h2 class="product__item_title">Зарядное устройство LEGO</h2></a>
                    <div class="product__item_count">(162 моделей с мотором)</div>
                    <div class="product__item_price">20031 руб.</div><a href="/product.html" class="btn btn__cart">В корзину</a></div>
                <div class="product__item product__related"><a href="/product.html"><img src="./images/product/1.jpg" alt="undefined" class="product__item_image">
                        <h2 class="product__item_title">Arduino Матрешка</h2></a>
                    <div class="product__item_count">(116 моделей с мотором)</div>
                    <div class="product__item_price">21849 руб.</div><a href="/product.html" class="btn btn__cart">В корзину</a></div>
                <div class="product__item product__related"><a href="/product.html"><img src="./images/product/1.jpg" alt="undefined" class="product__item_image">
                        <h2 class="product__item_title">Inventor Engine</h2></a>
                    <div class="product__item_count">(81 моделей с мотором)</div>
                    <div class="product__item_price">1380 руб.</div><a href="/product.html" class="btn btn__cart">В корзину</a></div>
                <div class="product__item product__related"><a href="/product.html"><img src="./images/product/2.jpg" alt="undefined" class="product__item_image">
                        <h2 class="product__item_title">Робот-собакен</h2></a>
                    <div class="product__item_count">(30 моделей с мотором)</div>
                    <div class="product__item_price">21784 руб.</div><a href="/product.html" class="btn btn__cart">В корзину</a></div>
                <div class="product__item product__related"><a href="/product.html"><img src="./images/product/1.jpg" alt="undefined" class="product__item_image">
                        <h2 class="product__item_title">Утилизатор людей</h2></a>
                    <div class="product__item_count">(115 моделей с мотором)</div>
                    <div class="product__item_price">3432 руб.</div><a href="/product.html" class="btn btn__cart">В корзину</a></div>
            </div>
        </div>
    </div>

@endsection