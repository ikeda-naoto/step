@extends('layouts.app')

@if($parentStep->deleted_at===null)
    @section('breadcrumbs', Breadcrumbs::render('showChildStep', $parentStep, $showChildStep))
@endif
@section('title', $showChildStep->title)

@section('content')
    <child-step-detail
        :parent-step="{{ $parentStep }}"
        :child-steps="{{ $parentStep->childSteps }}"
        :show-child-step="{{ $showChildStep }}"
        :clear-num="{{ $clear_num }}"
        :challenge-flg="{{ $challengeFlg }}"
        @if (isset($user)) 
            :user="{{ $user }}"
        @else
            :user=null
        @endif
    ></child-step-detail>
@endsection
