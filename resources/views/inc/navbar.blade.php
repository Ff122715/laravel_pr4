<nav>
    <ul>
        {{--        <li><a href="{{ route('about') }}">О нас</a></li>--}}
        {{--        <li><a href="/contacts">Контакты</a></li>--}}
        <li><a href="/">Главная</a></li>
        {{--        <li><a href="{{ route('users') }}">users</a></li>--}}
        {{--        <li><a href="{{ route('products') }}">Каталог</a></li>--}}


            @guest
                <li><a href="{{ route('login') }}">Вход</a></li>
                <li><a href="{{ route('users.reg') }}">Регистрация</a></li>
            @endguest

            @auth
                <li><a href="{{ route('users.profile') }}">Профиль</a></li>

                <li>
                    <a href="{{ route('basket') }}" class="position-relative">
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                <span id="totalCount">{{ \App\Models\Basket::totalCount()}}</span>
                    <span class="visually-hidden">unread messages</span></span>
                        Корзина
                    </a>
                </li>

                <li><a href="{{ route('users.logout') }}">Выйти</a></li>
            @endauth

    </ul>
</nav>
