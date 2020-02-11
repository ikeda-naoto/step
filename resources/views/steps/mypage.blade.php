@extends('layouts.app')
{{-- パンくずリスト --}}
@section('breadcrumbs', Breadcrumbs::render('mypage'))

@section('title', 'マイページ')

@section('content')
{{ gettype($a) }}
{{ gettype($registSteps->user_id) }}
    <!-- メインコンテンツ -->
    <my-page
        :regist-steps="{{ $registSteps }}"
        :challenge-steps="{{ $challengeSteps }}"
        :user="{{ $user }}"
    ></my-page>
@endsection
