@extends('layouts.app')

@section('content')
    <!-- メインコンテンツ -->
    <div class="l-container u-bg-light">
        <div class="l-row l-row--center l-site-width">
            <!-- メインカラム -->
            <div class="l-row l-row--center l-row__col12 l-row__col08-pc">
                <form action="" class="c-form p-auth">
                    <h1 class="c-title--normal u-mb-5l">パスワードリセット</h1>
                    <div class="c-form__group">
                        <p>新しいパスワードを設定してください。</p>
                    </div>
                    <div class="c-form__group">
                        <input type="password" class="c-input c-input--full c-input--err" placeholder="古いパスワード">
                        <span class="u-fontcolor--err">エラーメッセージ</span>
                    </div>
                    <div class="c-form__group">
                        <input type="password" class="c-input c-input--full c-input--err" placeholder="新しいパスワード">
                        <span class="u-fontcolor--err">エラーメッセージ</span>
                    </div>
                    <div class="c-form__group">
                        <input type="password" class="c-input c-input--full" placeholder="新しいパスワード（再入力）">
                        <span class="u-fontcolor--err">エラーメッセージ</span>
                    </div>
                    <div class="c-form__group">
                        <input type="submit" value="更新する" class="c-btn c-btn--primary p-auth__btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
