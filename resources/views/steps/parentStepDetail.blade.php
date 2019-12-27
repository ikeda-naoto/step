@extends('layouts.app')

@section('content')
    <parent-step-detail-component
    :parent-step="{{ $parentStep }}"
    :child-steps="{{ $childSteps }}"></parent-step-detail-component>
@endsection
