@extends('layouts.app')

<!-- パンくずリスト -->
@section('breadcrumbs', Breadcrumbs::render('login'))

@section('title', 'ログイン')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<!-- パンくずリスト -->

<!-- メインコンテンツ -->
<div class="l-container u-bg--light">
    <div class="l-row l-row--center l-site-width">
        <!-- メインカラム -->
        <div class="l-row l-row--center l-row__col12 l-row__col08-pc">
            <form method="POST" action="{{ route('login') }}" class="c-form p-auth">
                @csrf
                <h1 class="c-title--normal u-mb--5l">ログイン</h1>
                <div class="c-form__group">
                    @error('common')
                        <span class="u-fontcolor--err">{{ $message }}</span>
                    @enderror
                </div>
                <div class="c-form__group">
                    <input type="email" name="email" class="c-input c-input--full @error('email') c-input--err @enderror" placeholder="メールアドレス" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="u-fontcolor--err">{{ $message }}</span>
                    @enderror
                </div>
                <div class="c-form__group">
                    <input type="password" name="password" class="c-input c-input--full @error('password') c-input--err @enderror" placeholder="パスワード" required autocomplete="current-password">
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
