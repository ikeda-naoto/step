@extends('layouts.app')

@section('content')
    <child-step-detail
        :parent-step="{{ $parentStep }}"
        :child-steps="{{ $parentStep->childSteps }}"
        :child-id="{{ $child_id }}"
        :clear-num="{{ $clear_num }}"
        :challenge-flg="{{ $challengeFlg }}"
        @if (isset($user)) 
            :user="{{ $user }}"
        @else
            :user=null
        @endif
    ></child-step-detail>
@endsection
