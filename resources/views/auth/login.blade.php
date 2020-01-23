@extends('layouts.app')

<!-- パンくずリスト -->
@section('breadcrumbs', Breadcrumbs::render('login'))

@section('title', 'ログイン')

@section('content')
<!-- メインコンテンツ -->
<div class="l-container u-bg--light">
    <div class="l-row l-row--center l-site-width">
        <!-- メインカラム -->
        <div class="l-row l-row--center l-row__col12--sm l-row__col10--tab l-row__col08--pc">
            <form method="POST" action="{{ route('login') }}" class="c-form p-auth">
                @csrf
                <h1 class="c-title--normal u-mb--5l">ログイン</h1>
                <div class="c-form__group">
                    @error('common')
                        <span class="u-fontcolor--err">{{ $message }}</span>
                    @enderror
                </div>
                <div class="c-form__group">
                    <input type="email" name="email" class="c-input c-input--full @error('email') c-input--err @enderror" placeholder="メールアドレス" value="{{ old('email') }}" autocomplete="email" autofocus>
                    @error('email')
                        <span class="u-fontcolor--err">{{ $message }}</span>
                    @enderror
                </div>
                <div class="c-form__group">
                    <input type="password" name="password" class="c-input c-input--full @error('password') c-input--err @enderror" placeholder="パスワード" autocomplete="current-password">
                    @error('password')
                        <span class="u-fontcolor--err">{{ $message }}</span>
                    @enderror
                </div>
                <div class="c-form__group">
                    <input type="checkbox" name="remember" id="remember" class="c-checkbox" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">
                        次回ログインを省略する
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <div class="c-form__group">
                        <input type="submit" value="ログイン" class="c-btn c-btn--medium c-btn--primary c-btn--center" onclick="disabledButton(this);">
                        <div class="p-auth__help">
                            <a href="{{ route('password.request') }}" >パスワードを忘れた方はコチラ</a>
                        </div>
                    </div>
                @endif
                <div class="c-form__group">
                    <p class="l-row l-row--middle p-auth__lead">初めての方はコチラ</p>
                    <div class="l-row">
                        <a href="{{ route('register') }}" class="c-btn c-btn--medium c-btn--success c-btn--center">新規会員登録</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
