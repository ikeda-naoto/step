@extends('layouts.app')

<!-- パンくずリスト -->
@section('breadcrumbs', Breadcrumbs::render('register'))

@section('title', '新規会員登録')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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
            <form method="POST" action="{{ route('register') }}" class="c-form p-auth">
                @csrf
                <h1 class="c-title--normal u-mb--5l">新規会員登録</h1>
                <div class="c-form__group">

                    <input type="email" class="c-input c-input--full @error('email') c-input--err @enderror" placeholder="メールアドレス" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="u-fontcolor--err">{{ $message }}</span>
                    @enderror
                </div>
                <div class="c-form__group">
                    <input type="password" class="c-input c-input--full @error('password') c-input--err @enderror" placeholder="パスワード" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="u-fontcolor--err">{{ $message }}</span>
                    @enderror
                </div>
                <div class="c-form__group">
                    <input type="password" class="c-input c-input--full" placeholder="パスワード（再入力）" name="password_confirmation" required autocomplete="new-password">
                    {{-- @error('password_confirmation')
                        <span class="u-fontcolor--err">{{ $message }}</span>
                    @enderror --}}
                </div>
                <div class="c-form__group">
                    <input type="submit" value="新規会員登録" class="c-btn c-btn--medium c-btn--success c-btn--center" onclick="disabledButton(this);">
                </div>
                <div class="c-form__group">
                    <p class="l-row l-row--middle p-auth__lead">すでに登録している方はコチラ</p>
                    <div class="l-row u-position--relative">
                        <a href="{{ route('login') }}" class="c-btn c-btn--medium c-btn--goast c-btn--center">ログイン</a>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
