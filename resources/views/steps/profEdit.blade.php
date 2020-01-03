@extends('layouts.app')

@section('content')
    <prof-edit
        :user="{{ $user }}"
    ></prof-edit>
@endsection
