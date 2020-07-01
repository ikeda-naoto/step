@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('profEdit'))

@section('title', 'プロフィール編集')

@section('main')
    <prof-edit-component
        :user="{{ $user }}"
    ></prof-edit-component>
@endsection
