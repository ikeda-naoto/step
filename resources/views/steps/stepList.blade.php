@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('steps'))

@section('content')
    <step-list-component
    :parent-steps="{{ $parentSteps }}"
    :categories="{{ $categories }}"></step-list-component>
@endsection
