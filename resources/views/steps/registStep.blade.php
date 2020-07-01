@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('registStep', $editFlg))

@section('title', 'STEP登録')

@section('main')
    <regist-step-component
        :categories="{{ $categories }}"
        :edit-flg="{{ $editFlg }}"
        @if ($editFlg)
            :parent-step-data="{{ $parentStep }}"
            :child-steps-data="{{ $childSteps }}"
        @else
            :parent-step-data="null"
            :child-steps-data="null"
        @endif
    ></regist-step-component>
 @endsection
