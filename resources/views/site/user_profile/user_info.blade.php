@extends('site.layouts.account')

@section('account_content')

    <div class="account__title">Мои данные</div>
    <form>
        <div class="account__common">
            <div class="account__name">
                <input type="text" placeholder="Фамилия" class="account__input">
                <input type="text" placeholder="Имя" class="account__input">
                <input type="text" placeholder="Отчество" class="account__input">
            </div>
            <div data-content="E-mail почта:" class="account__block">sabaka@yandex.ru</div>
            <div data-content="Пароль:" class="account__block">
                <button class="btn__gray">Изменить</button>
            </div>
        </div>
        <div class="account__other">
            <div data-content="Телефон:" class="account__block account__block_select">
                <input type="tel" placeholder="+7 (900) 800-8080" class="account__input">
            </div>
            <div data-content="Дата:" class="account__block account__block_select">
                <select placeholder="Дата" class="account__select">
                    <option class="account__option">01</option>
                    <option class="account__option">02</option>
                    <option class="account__option">03</option>
                    <option class="account__option">04</option>
                </select>
                <select class="account__select">
                    <option class="account__option">Январь</option>
                    <option class="account__option">Февраль</option>
                    <option class="account__option">Март</option>
                    <option class="account__option">Апрель</option>
                </select>
                <select class="account__select">
                    <option class="account__option">1992</option>
                    <option class="account__option">1993</option>
                    <option class="account__option">1994</option>
                    <option class="account__option">1995</option>
                </select>
            </div>
            <div data-content="Пол:" class="account__block">
                <input type="radio" name="sex" id="man" checked class="account__radio">
                <label for="man" class="btn__gray btn__account">Мужской</label>
                <input type="radio" name="sex" id="woman" class="account__radio">
                <label for="woman" class="btn__gray btn__account">Женский</label>
            </div>
        </div><a href="#" class="btn">Изменить</a>
    </form>
    </div>

@endsection