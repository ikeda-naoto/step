@extends('layouts.app')

@section('content')

    {{-- <!-- モーダル -->
    <div class="c-overview"></div>
    <div class="l-row l-row--middle l-row--center c-modal">
        <div class="c-modal__container">
            <div class="c-modal__group">
                <p class="u-text-center">エラーメッセージ</p>
            </div>
            <div class="c-modal__group">
                <button class="c-btn c-btn--primary c-modal__btn">OK</button>
            </div>
        </div>
    </div> --}}
    {{-- <form method="post" action="{{ route('steps.store') }}">
        @csrf
        <input type="text" name="a[]">
        <input type="text" name="a[]">
        <input type="text" name="a[]">
        <input type="text" name="a[]">
        <input type="text" name="a[]">
        <input type="text" name="a[]">
        <input type="submit" value="aaa">
    </form> --}}
    <regist-step-component
    :categories="{{ $categories }}"></regist-step-component>
 @endsection
