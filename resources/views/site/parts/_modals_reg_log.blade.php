<div id="modal-login" class="modal__content mfp-hide">
    <div class="modal__title">Вход</div>
    <div class="modal__text">
        <form class="modal__form">
            <input name="email" placeholder="E-mail" class="modal__input">
            <div class="modal__forgot">
                <input name="password" placeholder="Пароль" class="modal__input"><a href="#" class="modal__forgot_link">Напомнить пароль?</a>
            </div>
            <button class="btn btn__modal">Войти</button>
        </form><a data-mfp-src="#modal-register" href="#" class="modal__register_button js-modal">Регистрация нового пользователя</a>
    </div>
</div>

<div id="modal-register" class="modal__content mfp-hide">
    <div class="modal__title">Регистрация</div>
    <div class="modal__text">
        <form class="modal__form">
            <input name="email" placeholder="E-mail" class="modal__input">
            <label class="modal__label">
                <input type="checkbox" class="modal__checkbox">Подписаться на новости
            </label>
            <input name="password" placeholder="Придумайте пароль" class="modal__input">
            <input name="password" placeholder="Подтвердите пароль" class="modal__input">
            <input name="name" placeholder="Ваше имя" class="modal__input">
            <button class="btn btn__modal">Зарегистрироваться</button>
        </form><a href="#" class="modal__register_button">Регистрация нового пользователя</a>
    </div>
</div>