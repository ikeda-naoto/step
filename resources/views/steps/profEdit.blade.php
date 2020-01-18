@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('profEdit'))

@section('title', 'プロフィール編集')

@section('content')
    <prof-edit
        :user="{{ $user }}"
    ></prof-edit>
@endsection
