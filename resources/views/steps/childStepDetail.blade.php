@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('showChildStep', $parentStep, $showChildStep))

@section('title', $showChildStep->title)

{{-- 該当するSTEPが存在する場合 --}}
@if($parentStep->deleted_at === null)
    @section('main')
        <child-step-detail-component
            :parent-step="{{ $parentStep }}"
            :first-child-step-id="{{ $parentStep->childSteps[0]['id'] }}"
            :show-child-step="{{ $showChildStep }}"
            :clear-num="{{ $clear_num }}"
            :user="{{ isset($user) ? $user : 'null' }}"
            :challenge-flg="{{ $challengeFlg }}"
        ></child-step-detail-component>
    @endsection

    @section('sidebar')
        <div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
            <div class=" c-sidebar">
                <!-- STEP登路登録ボタン -->
                @component('components.registStepBtn')
                @endcomponent
                <!-- 子STEPの目次 -->
                <child-step-index-component
                    :child-steps="{{ $parentStep->childSteps }}"
                ></child-step-index-component>
            </div>
        </div>
    @endsection

{{-- 該当するSTEPが削除された場合 --}}
@else
    @section('main')
        @component('components.deleteStep')
        @endcomponent
    @endsection
@endif