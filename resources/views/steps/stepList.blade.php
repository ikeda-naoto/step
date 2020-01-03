@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('steps'))

@section('content')
    <step-list
        :parent-steps="{{ $parentSteps }}"
        :categories="{{ $categories }}"
    ></step-list>
@endsection
