@extends('layouts.app')

@section('title', 'パスワード変更')

@section('content')
    <!-- メインコンテンツ -->
    <div class="l-container u-bg--light">
        <div class="l-row l-row--center l-site-width">
            <!-- メインカラム -->
            <div class="l-row l-row--center l-row__col12--sm l-row__col10--tab l-row__col08--pc">
                <form method="POST" action="/password" class="c-form p-auth">
                    @csrf
                    @method('PATCH')
                    <h1 class="c-title--normal u-mb--5l">パスワード変更</h1>
                    <div class="c-form__group">
                        <p>新しいパスワードを設定してください。</p>
                    </div>
                    <div class="c-form__group">
                        <input type="password" name="password_old" class="c-input c-input--full @error('password_old')c-input--err @enderror" placeholder="古いパスワード" required autocomplete="new-password">
                        @error('password_old')
                            <span class="u-fontcolor--err">{{ $message }}</span>
                        @enderror
                        
                    </div>
                    <div class="c-form__group">
                        <input type="password" name="password_new" class="c-input c-input--full @error('password_new')c-input--err @enderror" placeholder="新しいパスワード" required autocomplete="new-password">
                        @error('password_new')
                            <span class="u-fontcolor--err">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="c-form__group">
                        <input type="password" name="password_new_confirmation" class="c-input c-input--full @error('password_new_confirmation')c-input--err @enderror" placeholder="新しいパスワード（再入力）" required autocomplete="new-password">
                        @error('password_new_confirmation')
                            <span class="u-fontcolor--err">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="c-form__group">
                        <input type="submit" value="更新する" class="c-btn c-btn--primary c-btn--center c-btn--medium" onclick="disabledButton(this);">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
