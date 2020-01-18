@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('registStep', $editFlg))

@section('title', 'STEP登録')

@section('content')

    {{-- <!-- モーダル -->
    <div class="c-overview"></div>
    <div class="l-row l-row--middle l-row--center c-modal">
        <div class="c-modal__container">
            <div class="c-modal__group">
                <p class="u-text--center">エラーメッセージ</p>
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
    <regist-step
        :categories="{{ $categories }}"
        :edit-flg="{{ $editFlg }}"
        @if ($editFlg)
            :parent-step-data="{{ $parentStep }}"
            :child-steps-data="{{ $childSteps }}"
        @else
            :parent-step-data="null"
            :child-steps-data="null"
        @endif
    ></regist-step>
 @endsection
