<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('fontawesome-free-5.11.2-web/js/all.min.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP|Sawarabi+Gothic&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        [v-cloak] {opacity: 0;}
    </style>
</head>
<body>
    <div id="app" class="js-toggle-sp-menu-target l-app" v-cloak>
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}}

        <!-- ヘッダー -->
        <header class="l-header">
            <div class="p-header">
                <div class="l-site-width">
                    <div class="l-row l-row--between l-row--middle">
                        <div class="p-header__logo">
                            <a href="/"><img src="{{ asset('images/logo.png') }}" alt=""></a>
                        </div>
                        <div class="c-btn--trigger js-toggle-sp-menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <nav class="p-header__nav">
                            <ul class="p-nav l-row">
                                <li class="p-nav__item">
                                    <a href="{{ route('steps.index') }}" class="p-nav__link">
                                        <div class="p-nav__text">STEP一覧</div>
                                    </a>
                                </li>
                                @guest
                                    <li class="p-nav__item">
                                        <a href="{{ route('login') }}" class="p-nav__link">
                                            <p class="p-nav__text">ログイン</p>
                                        </a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="p-nav__item">
                                            <a href="{{ route('register') }}" class="p-nav__link">
                                                <div class="p-nav__text">新規会員登録</div>
                                            </a>
                                        </li>
                                    @endif
                                @else
                                    {{-- <li class="p-nav__item">
                                        <a class="p-nav__link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                         ログアウト
                                        </a>
                                    </li> --}}
                                    {{-- <li class="p-nav__item">
                                        <a href="{{ route('mypage') }}" class="p-nav__link">
                                            <div class="p-nav__text">マイページ</div>
                                        </a>
                                    </li> --}}
                                    {{-- <li class="p-nav__item">
                                        <a href="{{ route('logout') }}"　onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="p-nav__link">
                                            <div class="p-nav__text">パスワード変更</div>
                                        </a>
                                    </li> --}}
                                    {{-- <li class="p-nav__item">
                                        <a href="{{ route('users.edit') }}" class="p-nav__link">
                                            <div class="p-nav__text">プロフィール変更</div>
                                        </a>
                                    </li> --}}
                                    {{-- <li class="p-nav__item">
                                        <a href="{{ route('logout') }}"　onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="p-nav__link">
                                            <div class="p-nav__text">ログアウト</div>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li> --}}
                                    <li class="p-nav__item p-dropdown">
                                        <div class="p-nav__link">
                                            <div class="l-row l-row--middle p-nav__text">
                                                <div class="c-img c-img--circle p-nav__img">
                                                    <img class="c-img__item--center" src="{{ isset($user->pic) ? asset('storage/img/'.$user->pic) : asset('images/unknown.png')}}" alt="">
                                                </div>
                                                <p class="p-nav__name">
                                                    {{ isset($user->name) ? $user->name : '名無しさん'}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="p-dropdown__menu">
                                            <ul class="p-dropdown__list">
                                                <li class="p-dropdown__item">
                                                    <a href="{{ route('mypage') }}" class="l-row l-row--between l-row--middle p-dropdown__link">
                                                        <span>マイページ</span><i class="fas fa-angle-right fa-lg p-dropdown__icn"></i>
                                                    </a>
                                                </li>
                                                <li class="p-dropdown__item">
                                                    <a href="{{ route('users.edit') }}" class="l-row l-row--between l-row--middle p-dropdown__link">
                                                        <span>プロフィール変更</span><i class="fas fa-angle-right fa-lg p-dropdown__icn"></i>
                                                    </a>
                                                </li>
                                                <li class="p-dropdown__item">
                                                    <a href="{{ route('logout') }}"　onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="l-row l-row--between l-row--middle p-dropdown__link">
                                                        <span>ログアウト</span><i class="fas fa-angle-right fa-lg p-dropdown__icn"></i>
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                                {{-- <li class="p-dropdown__item">
                                                    <a href="{{ route('password.edit', $user->id) }}" class="l-row l-row--between p-dropdown__link">
                                                        <span>パスワード変更<span><i class="fas fa-angle-right fa-lg p-dropdown__icn"></i>
                                                    </a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                            <ul class="p-global-sidebar">
                                @auth
                                <li class="p-global-sidebar__userinfo">
                                        <div class="l-row l-row--middle">
                                            <div class="c-img c-img--circle p-global-sidebar__img">
                                                <img class="c-img__item--center" src="{{ isset($user->pic) ? asset('storage/img/'.$user->pic) : asset('images/unknown.png')}}" alt="">
                                            </div>
                                            <p class="p-global-sidebar__name">
                                                {{ isset($user->name) ? $user->name : '名無しさん'}}
                                                
                                            </p>
                                        </div>
                                </li>
                                @endauth
                                <li class="p-global-sidebar__item">
                                    <a href="{{ route('steps.index') }}" class="p-global-sidebar__link">
                                        <p class="p-global-sidebar__text">STEP一覧</p>
                                    </a>
                                </li>
                                @guest
                                    <li class="p-global-sidebar__item">
                                        <a href="{{ route('login') }}" class="p-global-sidebar__link">
                                            <p class="p-global-sidebar__text">ログイン</p>
                                        </a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="p-global-sidebar__item">
                                            <a href="{{ route('register') }}" class="p-global-sidebar__link">
                                                <p class="p-global-sidebar__text">新規会員登録</p>
                                            </a>
                                        </li>
                                    @endif
                                @else
                                <li class="p-global-sidebar__item">
                                    <a href="{{ route('steps.create') }}" class="p-global-sidebar__link">
                                        <p class="p-global-sidebar__text">STEPを作る</p>
                                    </a>
                                </li>
                                <li class="p-global-sidebar__item">
                                    <a href="{{ route('mypage') }}" class="p-global-sidebar__link">
                                        <p class="p-global-sidebar__text">マイページ</p>
                                    </a>
                                </li>
                                <li class="p-global-sidebar__item">
                                    <a href="{{ route('users.edit') }}" class="p-global-sidebar__link">
                                        <p class="p-global-sidebar__text">プロフィール変更</p>
                                    </a>
                                </li>
                                <li class="p-global-sidebar__item">
                                    <a href="{{ route('logout') }}"　onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="p-global-sidebar__link">
                                        <p class="p-global-sidebar__text">ログアウト</p>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                @endguest
                            </ul>
                            {{-- <div class="p-nav__item p-dropdown">
                                <div class="p-nav__link">
                                    <div class="p-nav__text">
                                        <div class="p-nav__img">
                                            <img src="{{ isset($user->pic) ? asset('storage/img/'.$user->pic) : asset('images/unknown.png')}}" alt="">
                                        </div>
                                        <p class="p-nav__name">
                                            {{ isset($user->name) ? $user->name : '名無しさん'}}
                                        </p>
                                    </div>
                                </div>
                                <div class="p-dropdown__menu">
                                    <ul class="p-dropdown__list">
                                        <li class="p-dropdown__item">
                                            <a href="{{ route('users.edit') }}" class="p-dropdown__link">
                                                <span>プロフィール変更<span><i class="fas fa-angle-right fa-lg p-dropdown__icn"></i>
                                            </a>
                                        </li>
                                        <li class="p-dropdown__item">
                                            <a href="{{ route('password.edit', $user->id) }}" class="l-row l-row--between p-dropdown__link">
                                                <span>パスワード変更<span><i class="fas fa-angle-right fa-lg p-dropdown__icn"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        
        <div class="c-flash-message js-flash-message">
            <p class="c-flash-message__text">{{ session('status') }}</p>
        </div>

        @yield('breadcrumbs')
        
        <main class="py-4">
            @yield('content')
        </main>
        <footer class="l-footer">
            <div class="p-footer">
                <div class="p-footer__logo">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                </div>
                <small class="p-footer__copyright">Copyright ©︎ STEP All Rights Reserved.</small>
            </div>
        </footer>
    </div>

<script>
    function disabledButton(obj) {
        obj.disabled = true;
        // obj.value = ‘処理中’;
        obj.form.submit();
    }
</script>
</body>
</html>
