<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">МЕНЮ</li>
            <li class="{{-- Route::currentRouteName() == 'orders' ? "active" : '' --}}">
                <a href="{{-- route('dashboard')--}}"><i class="fa fa-fw fa-dashboard"></i>
                    <span>Панель управления</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-link"></i>
                    <span>Каталог</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ Route::currentRouteName() == 'products.index' ? "active" : '' }}">
                        <a href="{{ route('products.index') }}"><span>Товары</span></a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'categories.index' ? "active" : '' }}">
                        <a href="{{ route('categories.index')}}"><span>Категории</span></a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'attribute_types.index' ? "active" : '' }}">
                        <a href="{{ route('attribute_types.index')}}"><span>Атрибуты</span></a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'manufacturers.index' ? "active" : '' }}">
                        <a href="{{ route('manufacturers.index') }}"><span>Производители</span></a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'countries.index' ? "active" : '' }}">
                        <a href="{{ route('countries.index') }}"><span>Страны</span></a>
                    </li>
                    <li class="{{ Route::currentRouteName() == 'materials.index' ? "active" : '' }}">
                        <a href="{{ route('materials.index') }}"><span>Материал</span></a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-link"></i>
                    <span>Склад</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{-- Route::currentRouteName() == 'stock' ? "active" : '' --}}">
                        <a href="{{-- route('stock')--}}"><span>Позиции</span></a>
                    </li>
                </ul>
            </li>

        </ul>
    </section>
</aside>
<script>
    $(function(){
        $('.treeview li').each(function(i){
            if($(this).hasClass('active')){
                $(this).closest('.treeview').addClass('active');
            }
        });
    });
</script>