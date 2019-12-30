@extends('layouts.app')
{{-- パンくずリスト --}}
@section('breadcrumbs', Breadcrumbs::render('mypage'))

@section('content')
    <!-- メインコンテンツ -->
    <mypage-component
    :regist-steps="{{ $registSteps }}"
    :challenge-steps="{{ $challengeSteps }}"
    :user="{{ $user }}"></mypage-component>
@endsection
