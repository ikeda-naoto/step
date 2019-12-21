@extends('layouts.app')

@section('content')
    <prof-edit-component
        :user="{{ $user }}"
    ></prof-edit-component>
@endsection
