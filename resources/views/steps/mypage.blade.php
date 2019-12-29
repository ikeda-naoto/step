@extends('layouts.app')
{{-- パンくずリスト --}}
@section('breadcrumbs', Breadcrumbs::render('mypage'))

@section('content')
    <!-- メインコンテンツ -->
    <div class="l-container u-bg-light">
        <div class="l-row l-site-width">
            <!-- メインカラム -->
            <div class="l-row__col12 l-row__col08-pc p-mypage">
                    <section class="p-registed-step u-mb-l">
                        <h2 class="c-title--type01">登録したSTEP</h2>
                        @foreach ($registSteps as $registStep)
                        <div class="c-panel p-registed-step__panel">
                            <h3 class="c-panel__title p-registed-step__title">{{ $registStep->parent_title }}</h3>
                            <p class="p-registed-step__sum">全{{ $registStep->sumChildNum }}STEP</p>
                            <div class="l-row">
                                <div class="l-row__col12 l-row__col04-pc c-panel__img p-registed-step__img">
                                    <img src="" alt="">
                                </div>
                                <div class="l-row__col12 l-row__col08-pc">
                                    <p class="p-registed-step__content">
                                        {{ $registStep->parent_content }}
                                    </p>
                                </div>
                            </div>
                            <a href="" class="c-btn c-btn--primary p-registed-step__btn">編集する</a>
                        </div>
                        @endforeach
                        
                            <!--  -->
                    </section>
                <section class="p-challenge-step">
                    <h2 class="c-title--type01">チャレンジ中のSTEP</h2>
                    <div class="l-row">
                        <div class="l-row__col12 l-row__col06-pc p-challenge-step__panel-container">
                            <a class="c-panel p-challenge-step__panel">
                                <div class="c-panel__img p-challenge-step__img">
                                    <img src="img/promon_img.png" alt="">
                                </div>
                                <div class="p-challenge-step__head">
                                    <h3 class="c-panel__title p-challenge-step__title">「入門」</h3>
                                </div>
                                <div class="l-row l-row--between p-challenge-step__body">
                                    <p class="p-challenge-step__finish-num">進捗状況<span class="u-fontsize-l u-ml-s u-mr-s">10/20</span>STEP</p>
                                    <p class="c-panel__time">終了目安：10時間</p>
                                    <div class="p-challenge-step__progress">
                                        <div class="p-challenge-step__progress--bar">
                                            <span class="p-challenge-step__progress--percentage">50%</span>
                                        </div> 
                                    </div>
                                </div>
                            </a>    
                        </div>
                        <div class="l-row__col12 l-row__col06-pc p-challenge-step__panel-container">
                            <a class="c-panel p-challenge-step__panel">
                                <div class="c-panel__img p-challenge-step__img">
                                    <img src="img/promon_img.png" alt="">
                                </div>
                                <div class="p-challenge-step__head">
                                    <h3 class="c-panel__title p-challenge-step__title">「入門」</h3>
                                </div>
                                <div class="l-row l-row--between p-challenge-step__body">
                                    <p class="p-challenge-step__finish-num">進捗状況<span class="u-fontsize-l u-ml-s u-mr-s">10/20</span>STEP</p>
                                    <p class="c-panel__time">終了目安：10時間</p>
                                    <div class="p-challenge-step__progress">
                                        <div class="p-challenge-step__progress--bar">
                                            <span class="p-challenge-step__progress--percentage">50%</span>
                                        </div> 
                                    </div>
                                </div>
                            </a>    
                        </div>                
                    </div>
                </section>
                
            </div>
            <!-- サブカラム（サイドバー） -->
            <div class="l-row__col12 l-row__col04-pc">
                <div class=" c-sidebar">
                    <div class="c-sidebar__group">
                        <a href="{{ route('steps.create') }}" class="c-btn c-btn--warning c-sidebar__btn--full">STEPを作る</a>
                    </div>
                    <div class="c-sidebar__group">
                        <h2 class="c-sidebar__head"><span class="c-sidebar__title"><i class="fas fa-user-alt c-sidebar__icn"></i>マイページ</span></h2>
                        <div class="c-sidebar__body">
                            <div class="c-sidebar__prof-img">
                                <img class="" src="{{ asset('storage/img/'.$user->pic) }}" alt="">
                            </div>
                            <h3 class="c-sidebar__prof-name">{{ $user->name }}</h3>
                            <div class="c-sidebar__prof-intro">
                                {{ $user->introduction }}
                            </div>
                            <ul class="c-sidebar__list">
                                <li class="c-sidebar__list-item c-sidebar__list-item--active">
                                    <a href="{{ route('users.edit', $user->id) }}">プロフィール</a>
                                </li>
                                <li class="c-sidebar__list-item">
                                    ログアウト
                                </li>
                                <li class="c-sidebar__list-item">
                                    パスワード変更
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
