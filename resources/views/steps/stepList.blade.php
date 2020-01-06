@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('steps'))

@section('content')
    {{-- {{ $parentSteps }} --}}
    <step-list></step-list>
@endsection
