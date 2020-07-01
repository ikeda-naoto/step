@extends('layouts.app')
{{-- パンくずリスト --}}
@section('breadcrumbs', Breadcrumbs::render('mypage'))

@section('title', 'マイページ')

@section('main')
    <!-- メインカラム -->
    <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc p-mypage">
        <!-- チャレンジ中のSTEP -->
        <section class="p-challenge-step">
            <h2 class="c-title--type01 u-mb--3l">チャレンジ中のSTEP</h2>
            <div class="l-row @if(count($challenges) === 0) l-row--center @endif">
                @if(count($challenges) === 0)
                    <p class="u-fontsize--l">チャレンジ中のSTEPがありません</p>
                @else
                <!-- チャレンジ中のSTEP一覧 -->
                    @foreach ($challenges as $challenge)
                        <challenge-step-component
                            :challenge="{{ $challenge }}"
                            :parent-step="{{ $challenge->parentStep }}"
                            :child-steps="{{ $challenge->parentStep->childSteps }}"
                            :clears="{{ $challenge->clears }}"
                        ></challenge-step-component>
                    @endforeach
                @endif
                
            </div>
        </section>
        <!-- 登録したSTEP -->
        <section class="p-registed-step u-mb--l">
            <h2 class="c-title--type01 u-mb--3l">登録したSTEP</h2>
            <div class="p-registed-step__list">
                @if(count($registedSteps) === 0)
                    <p class="u-text--center u-fontsize--l">登録したSTEPがありません</p>
                @else
                    <!-- 登録したSTEP一覧 -->
                    @foreach ($registedSteps as $registedStep)
                        <registed-step-component
                            :registed-step="{{ $registedStep }}"
                        ></registed-step-component>
                    @endforeach
                @endif
            </div>
        </section>
    </div>
@endsection

@section('sidebar')
    <!-- サイドバー -->
    <div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
        <div class=" c-sidebar">
            <!-- STEP登録ボタン -->
            @component('components.registStepBtn')
            @endcomponent
            <!-- プロフィール -->
            @component('components.profile',['user' => $user])
                @slot('title')
                    マイページ
                @endslot
            @endcomponent
        </div>
    </div>
@endsection
