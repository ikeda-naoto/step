@extends('layouts.app')

@section('title', 'パスワードリセット')

@section('main')
<!-- メインコンテンツ -->
    <div class="p-auth l-row l-row--center">
        <!-- メインカラム -->
        <div class="l-row l-row--center l-row__col12--sm l-row__col10--tab l-row__col08--pc">
            <form method="POST" action="{{ route('password.update') }}" class="c-form">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <h1 class="c-title--normal u-mb--5l">パスワードリセット</h1>
                <div class="c-form__group">
                    <p>新しいパスワードを設定してください。</p>
                </div>
                @error('common')
                    <span class="u-fontcolor--err">{{ $message }}</span>
                @enderror
                <div class="c-form__group">
                    <input type="text" class="c-input c-input--full @error('email') c-input--err @enderror" placeholder="メールアドレス" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>
                    @error('email')
                        <span class="u-fontcolor--err">{{ $message }}</span>
                    @enderror
                    
                </div>
                <div class="c-form__group">
                    <input type="password" class="c-input c-input--full @error('password') c-input--err @enderror" placeholder="パスワード" name="password" autocomplete="new-password">
                    @error('password')
                        <span class="u-fontcolor--err">{{ $message }}</span>
                    @enderror
                </div>
                <div class="c-form__group">
                    <input type="password" class="c-input c-input--full @error('password_confirmation') c-input--err @enderror" placeholder="パスワード（再入力）" name="password_confirmation" autocomplete="new-password">
                    @error('password_confirmation')
                        <span class="u-fontcolor--err">{{ $message }}</span>
                    @enderror
                </div>
                <div class="c-form__group">
                    <input type="submit" value="更新する" class="c-btn c-btn--medium c-btn--primary c-btn--center" onclick="disabledButton(this);">
                </div>
            </form>
        </div>
    </div>
{{-- </div> --}}
@endsection
