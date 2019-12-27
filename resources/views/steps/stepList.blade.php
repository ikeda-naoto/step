@extends('layouts.app')

@section('content')
    <step-list-component
    :steps="{{ $steps }}"
    :categories="{{ $categories }}"></step-list-component>
@endsection
