@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('profEdit'))

@section('content')
    <prof-edit
        :user="{{ $user }}"
    ></prof-edit>
@endsection
