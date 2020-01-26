@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('showChildStep', $parentStep, $showChildStep))

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
