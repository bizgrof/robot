<div id="modal-login" class="modal__content mfp-hide">
    <div class="modal__title">Вход</div>
    <div class="modal__text">
        <form class="modal__form" method="POST" action="{{ route('login') }}" id="form_login">
            {{ csrf_field() }}
            <input name="email" placeholder="E-mail" class="modal__input" value="{{ old('email') }}" required>
            <div class="modal__forgot">
                <input name="password" placeholder="Пароль" class="modal__input"  type="password">
                <a href="#" class="modal__forgot_link">Напомнить пароль?</a>
            </div>
            <button class="btn btn__modal">Войти</button>
        </form>
        <a data-mfp-src="#modal-register" href="#" class="modal__register_button js-modal">Регистрация нового пользователя</a>
    </div>
</div>

<div id="modal-register" class="modal__content mfp-hide">
    <div class="modal__title">Регистрация</div>
    <div class="modal__text">
        <form class="modal__form" method="POST" action="{{ route('register') }}" id="regForm">
            {{ csrf_field() }}
            <input name="email" placeholder="E-mail" class="modal__input" value="{{ old('email') }}">
            <div id ="email_error"></div>
            <label class="modal__label">
                <input type="checkbox" class="modal__checkbox" >Подписаться на новости
            </label>
            <input name="name" placeholder="Ваше имя" class="modal__input" value="{{ old('name') }}">
            <input placeholder="Придумайте пароль" type="password" name="password" class="modal__input" required>

            <input type="password" class="modal__input" name="password_confirmation" placeholder="Введите пароль повторно" required>
            <button class="btn btn__modal">Зарегистрироваться</button>
        </form><a href="#" class="modal__register_button">Регистрация нового пользователя</a>
    </div>
</div>

<script>
//    $("#form_login").submit(function(e) {
//        e.preventDefault();
//
//        $.ajax({
//            method: "POST",
//            data: $("#form_login").serialize(),
//            url: "/login"
//        })
//        .done(function(data) {
//            $('.nav__auth_link').text(data.name);
//            console.log(data);
//        });
//    });
</script>