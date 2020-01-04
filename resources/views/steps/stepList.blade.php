@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('steps'))

@section('content')
    {{-- {{ $parentSteps }} --}}
    <step-list
        :parent-steps="{{ $parentSteps }}"
        :categories="{{ $categories }}"
    ></step-list>
@endsection
