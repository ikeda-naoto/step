@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('steps'))

@section('title', 'STEP一覧')

@section('content')
    {{-- {{ $parentSteps }} --}}
    <step-list></step-list>
@endsection
