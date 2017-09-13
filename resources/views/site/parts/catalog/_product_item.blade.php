<div class="product__item product__layout_grid">
    <a href="{{ route('product.show',[$product->category->alias, $product->manufacturer->alias, $product->alias]) }}">
        <img src="@if($product->images->first()) {{ asset('p_thumbs/large/'.$product->images->first()->name) }} @endif" alt="undefined" class="product__item_image">
        <h2 class="product__item_title">{{ $product->name }}</h2></a>
    <div class="product__item_count"></div>
    <div class="product__item_price">{{ $product->getPrice() }} руб.</div>
    <div style="display: none" class="product__item_text">{{ str_limit($product->description, 500)}}</div>
    <ul style="display: none" class="product__item_spec">
        @isset( $product->weight )<li data-content="Вес:" class="product__item_specItem">{{ $product->weight }}g</li> @endisset
        @isset( $product->size )<li data-content="Габариты:" class="product__item_specItem">{{ $product->size }}cm</li> @endisset
        @isset( $product->material )<li data-content="Материал:" class="product__item_specItem">{{ $product->material->name }}</li> @endisset
    </ul>
    <button class="btn btn__cart" onclick="Cart.add({{ $product->id }},1)">В корзину</button>
    {{--<button onclick="Cart.clear()"></button>--}}
</div>