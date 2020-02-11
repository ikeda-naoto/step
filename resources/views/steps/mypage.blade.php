@extends('layouts.app')
{{-- パンくずリスト --}}
@section('breadcrumbs', Breadcrumbs::render('mypage'))

@section('title', 'マイページ')

@section('content')
{{ gettype($a) }}
<br>
@foreach ($registSteps as $registStep) 
    {{gettype($registStep->user_id)}}
@endforeach


    <!-- メインコンテンツ -->
    <my-page
        :regist-steps="{{ $registSteps }}"
        :challenge-steps="{{ $challengeSteps }}"
        :user="{{ $user }}"
    ></my-page>
@endsection
