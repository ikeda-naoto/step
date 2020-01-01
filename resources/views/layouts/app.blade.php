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
    <div id="app" v-cloak>
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
                            <img src="{{ asset('images/logo.png') }}" alt="">
                        </div>
                        <nav class="p-header__nav">
                            <ul class="p-nav l-row">
                                <li class="p-nav__item"><a href="{{ route('steps.index') }}" class="p-nav__link">
                                    <div class="p-nav__text">STEP一覧</div></a></li>
                                @guest
                                    <li class="p-nav__item"><a href="{{ route('login') }}" class="p-nav__link"><p class="p-nav__text">ログイン</p></a></li>
                                    @if (Route::has('register'))
                                        <li class="p-nav__item"><a href="{{ route('register') }}" class="p-nav__link"><div class="p-nav__text">新規会員登録</div></a></li>
                                    @endif
                                @else
                                    {{-- <li class="p-nav__item">
                                        <a class="p-nav__link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                         ログアウト
                                        </a>
                                    </li> --}}
                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <li class="p-nav__item p-dropdown">
                                        <div class="p-nav__link">
                                            <div class="p-nav__text">
                                                <div class="p-nav__img">
                                                    <img src="{{ $user->pic ? asset('storage/img/'.$user->pic) : asset('images/unknown.png')}}" alt="">
                                                </div>
                                                <p class="p-nav__name">なおちん</p>
                                            </div>
                                        </div>
                                        <div class="p-dropdown__menu">
                                            <ul class="p-dropdown__list">
                                                <li class="p-dropdown__item">
                                                    <a href="{{ route('mypage') }}" class="l-row l-row--between l-row--middle p-dropdown__link">
                                                        <span>マイページ</span><i class="fas fa-angle-right fa-lg"></i>
                                                    </a>
                                                </li>
                                                <li class="p-dropdown__item">
                                                    <a href="{{ route('users.edit', $user->id) }}" class="l-row l-row--between l-row--middle p-dropdown__link">
                                                        <span>プロフィール変更</span><i class="fas fa-angle-right fa-lg"></i>
                                                    </a>
                                                </li>
                                                <li class="p-dropdown__item">
                                                    <a class="l-row l-row--between l-row--middle p-dropdown__link">
                                                        <span>パスワード変更</span><i class="fas fa-angle-right fa-lg"></i>
                                                    </a>
                                                </li>
                                                <li class="p-dropdown__item">
                                                    <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="l-row l-row--between l-row--middle p-dropdown__link">
                                                        <span>ログアウト</span><i class="fas fa-angle-right fa-lg"></i>
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
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
