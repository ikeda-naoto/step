@extends('layouts.app')

@section('title', 'パスワードリセット')

@section('content')
<!-- メインコンテンツ -->
<div class="l-container u-bg--light">
    <div class="l-row l-row--center l-site-width">
        <!-- メインカラム -->
        <div class="l-row l-row--center l-row__col12 l-row__col08-pc">
            <form method="POST" action="{{ route('password.email') }}" class="c-form p-auth">
                @csrf
                @if (session('success'))
                    <div class="c-form__group">
                        <div class="l-row l-row--center">
                            <i class="fas fa-paper-plane fa-7x c-form__icn--send"></i>
                        </div>
                        <h1 class="c-title--small u-mt--3l">パスワードリセット用メールを<br>送信しました。</h1>
                        <p class="c-form__explain u-mt--xxl">
                            ご入力頂いたメールアドレス宛にメールを送信しました。メールの指示に従ってパスワードを変更してください。
                        </p>
                </div>
                @else
                    <h1 class="c-title--normal u-mb--5l">パスワードをお忘れですか？</h1>
                    <div class="c-form__group">
                        <p class="u-text--center u-mb--m">
                            STEPに登録しているメールアドレスを入力してください。
                        </p>
                        <p class="u-text--center">
                            入力されたメールアドレス宛にパスワードリセット用のリンクをお送りします。
                        </p>
                    </div>
                    <div class="c-form__group">
                        <input type="email" class="c-input c-input--full @error('email') c-input--err @enderror" placeholder="メールアドレス" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="u-fontcolor--err">{{ $message }}</span>
                        @enderror
                        
                    </div>
                    <div class="c-form__group">
                        <input type="submit" value="送信" class="c-btn c-btn--medium c-btn--primary c-btn--center" required autocomplete="email" autofocus onclick="disabledButton(this);">
                    </div>
                    <!-- <div class="c-form__group">
                        <div class="l-row l-row--center">
                            <i class="fas fa-paper-plane fa-7x c-form__icn--send"></i>
                        </div>
                        <h1 class="c-title--small u-mt--3l">パスワードリセット用メールを送信しました。</h1>
                        <p class="c-form__explain u-mt--xxl">
                        ご入力頂いたメールアドレス宛にメールを送信しました。メールの指示に従ってパスワードを変更してください。
                        </p>
                    </div> -->
                @endif
                
            </form>
        </div>
    </div>
</div>
@endsection
