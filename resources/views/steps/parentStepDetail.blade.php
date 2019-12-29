@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('showParentStep', $parentStep))

@section('content')
    <parent-step-detail-component
    :parent-step="{{ $parentStep }}"
    @if ($user) 
        :user="{{ $user }}"
    @else
        :user=null
    @endif
    :create-User="{{ $createUser }}"
    :challenge-flg="{{ $challengeFlg }}"></parent-step-detail-component>
@endsection
