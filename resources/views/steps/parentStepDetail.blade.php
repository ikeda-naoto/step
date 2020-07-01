@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('showParentStep', $parentStep))

@section('title', $parentStep->title)

{{-- 該当するSTEPが存在する場合 --}}
@if($parentStep->deleted_at === null)
    @section('main')
        <parent-step-detail-component
            :parent-step="{{ $parentStep }}"
            :user="{{ isset($user) ? $user : 'null' }}"
            :challenge-flg="{{ $challengeFlg }}"
        ></parent-step-detail-component>
    @endsection

    @section('sidebar')
        <div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
            <div class=" c-sidebar">
                <!-- STEP登路登録ボタン -->
                @component('components.registStepBtn')
                @endcomponent
                <!-- プロフィール -->
                @component('components.profile',['user' => $createUser])
                    @slot('title')
                        このステップを作った人
                    @endslot
                @endcomponent
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



