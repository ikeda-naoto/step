@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('showParentStep', $parentStep))

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
