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
                    <li class="{{-- Route::currentRouteName() == 'stock' ? "active" : '' --}}">
                        <a href="{{-- route('stock')--}}"><span>Товары</span></a>
                    </li>
                    <li class="{{-- Route::currentRouteName() == 'stock' ? "active" : '' --}}">
                        <a href="{{-- route('stock')--}}"><span>Категории</span></a>
                    </li>
                    <li class="{{-- Route::currentRouteName() == 'stock' ? "active" : '' --}}">
                        <a href="{{-- route('stock')--}}"><span>Атрибуты</span></a>
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