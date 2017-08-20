@extends('site.layouts.app')

@section('content')
    <div class="container">
        <div class="account__hello">Здравствуйте Сергей!
            <div class="borderline"></div>
        </div>
        <div class="sidebar sidebar__account">
            <ul class="sidebar__account_list">
                <li class="sidebar__account_item"><a href="/account__order.html" class="sidebar__link">Мои заказы</a></li>
                <li class="sidebar__account_item"><a href="/account__data.html" class="sidebar__link">Мои данные</a></li>
                <li class="sidebar__account_item"><a href="/account__video.html" class="sidebar__link">Обучающие видео</a></li>
            </ul>
        </div>
        <div class="account">
            @yield('account_content')
        </div>
    </div>
@endsection