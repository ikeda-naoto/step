@extends('layouts.app')

@if($parentStep->deleted_at===null)
    @section('breadcrumbs', Breadcrumbs::render('showParentStep', $parentStep))
@endif

@section('title', $parentStep->title)

@section('content')
    <parent-step-detail
        :parent-step="{{ $parentStep }}"
        @if (isset($user)) 
            :user="{{ $user }}"
        @else
            :user=null
        @endif
        :create-User="{{ $createUser }}"
        :challenge-flg="{{ $challengeFlg }}"
    ></parent-step-detail>
@endsection
