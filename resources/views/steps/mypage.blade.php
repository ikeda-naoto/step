@extends('layouts.app')
{{-- パンくずリスト --}}
@section('breadcrumbs', Breadcrumbs::render('mypage'))

@section('title', 'マイページ')

@section('content')
    <!-- メインコンテンツ -->
    <my-page
        :regist-steps="{{ $registSteps }}"
        :challenge-steps="{{ $challengeSteps }}"
        :user="{{ $user }}"
    ></my-page>
@endsection
