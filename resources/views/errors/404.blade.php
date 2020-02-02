@extends('layouts.app')

@section('title', '404 Page Not Found')

@section('content')
<div class="l-container u-bg--light">
    <div class="l-site-width">
        <div class="p-error404">
            <h1 class="c-title--normal">404 Page Not Found</h1>
            <p class="p-error404__text">
                STEPをご利用いただきありがとうございます。<br>
                申し訳ございませんが、お探しのページは存在しないか、削除された可能性があります。
            </p>
            <div class="p-error404__img">
                <img src="{{ asset('images/logo_icn.png') }}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection