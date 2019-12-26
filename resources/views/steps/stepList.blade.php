@extends('layouts.app')

@section('content')
    <!-- パンくずリスト -->
    <div class="l-bread-crumbs">
        <div class="p-bread-crumbs l-row  l-row--center">
            <ul class="l-site-width l-row p-bread-crumbs__list">
                <li>ホーム<i class="fas fa-angle-right p-bread-crumbs__icn"></i></li>
                <li>STEP一覧</li>
            </ul>
        </div>
    </div>
    {{-- {{ var_dump($steps) }} --}}
    {{-- {{ var_dump($categories) }} --}}
    @foreach ($categories as $category)
        {{ $category->name }}
    @endforeach
        
    <!-- メインコンテンツ -->
    <div class="l-container u-bg-light">
        <div class="l-row l-site-width">
            <!-- メインカラム -->
            <div class="l-row__col12 l-row__col08-pc">
                    <h1 class="c-title--normal u-mb-5l">STEP一覧</h1>
                    <div class="l-row  p-step-list">
                        <div class="l-row__col12 l-row__col06-pc p-step-list__panel-container">
                            <a class="c-panel p-step-list__panel">
                                <div class="c-panel__category p-step-list__category">カテゴリー</div>
                                <div class="c-panel__img p-step-list__img">
                                    <img src="img/trouble_person.jpg" alt="">
                                </div>
                                <div class="l-row l-row--between p-step-list__head">
                                    <h3 class="c-panel__title p-step-list__title">親STEPタイトル</h3>
                                </div>
                                <div class="l-row l-row--between l-row--center p-step-list__body">
                                    <p class="p-step-list__time">終了目安：1時間</p>
                                    <p class="p-step-list__sum">全10STEP</p>
                                </div>
                            </a>
                        </div>
                        <div class="l-row__col12 l-row__col06-pc p-step-list__panel-container">
                            <a class="c-panel p-step-list__panel">
                                <div class="c-panel__category p-step-list__category">カテゴリー</div>
                                <div class="c-panel__img p-step-list__img">
                                    <img src="img/trouble_person.jpg" alt="">
                                </div>
                                <div class="l-row l-row--between p-step-list__head">
                                    <h3 class="c-panel__title p-step-list__title">親STEPタイトル</h3>
                                </div>
                                <div class="l-row l-row--between l-row--center p-step-list__body">
                                    <p class="p-step-list__time">終了目安：1時間</p>
                                    <p class="p-step-list__sum">全10STEP</p>
                                </div>
                            </a>
                        </div>
                        <div class="l-row__col12 l-row__col06-pc p-step-list__panel-container">
                            <a class="c-panel p-step-list__panel">
                                <div class="c-panel__category p-step-list__category">カテゴリー</div>
                                <div class="c-panel__img p-step-list__img">
                                    <img src="img/trouble_person.jpg" alt="">
                                </div>
                                <div class="l-row l-row--between p-step-list__head">
                                    <h3 class="c-panel__title p-step-list__title">親STEPタイトル</h3>
                                </div>
                                <div class="l-row l-row--between l-row--center p-step-list__body">
                                    <p class="p-step-list__time">終了目安：1時間</p>
                                    <p class="p-step-list__sum">全10STEP</p>
                                </div>
                            </a>
                        </div>
                        <div class="l-row__col12 l-row__col06-pc p-step-list__panel-container">
                            <a class="c-panel p-step-list__panel">
                                <div class="c-panel__category p-step-list__category">カテゴリー</div>
                                <div class="c-panel__img p-step-list__img">
                                    <img src="img/trouble_person.jpg" alt="">
                                </div>
                                <div class="l-row l-row--between p-step-list__head">
                                    <h3 class="c-panel__title p-step-list__title">親STEPタイトル</h3>
                                </div>
                                <div class="l-row l-row--between l-row--center p-step-list__body">
                                    <p class="p-step-list__time">終了目安：1時間</p>
                                    <p class="p-step-list__sum">全10STEP</p>
                                </div>
                            </a>
                        </div>
                        <div class="l-row__col12 l-row__col06-pc p-step-list__panel-container">
                            <a class="c-panel p-step-list__panel">
                                <div class="c-panel__category p-step-list__category">カテゴリー</div>
                                <div class="c-panel__img p-step-list__img">
                                    <img src="img/trouble_person.jpg" alt="">
                                </div>
                                <div class="l-row l-row--between p-step-list__head">
                                    <h3 class="c-panel__title p-step-list__title">親STEPタイトル</h3>
                                </div>
                                <div class="l-row l-row--between l-row--center p-step-list__body">
                                    <p class="p-step-list__time">終了目安：1時間</p>
                                    <p class="p-step-list__sum">全10STEP</p>
                                </div>
                            </a>
                        </div>
                        <div class="l-row__col12 l-row__col06-pc p-step-list__panel-container">
                            <a class="c-panel p-step-list__panel">
                                <div class="c-panel__category p-step-list__category">カテゴリー</div>
                                <div class="c-panel__img p-step-list__img">
                                    <img src="img/trouble_person.jpg" alt="">
                                </div>
                                <div class="l-row l-row--between p-step-list__head">
                                    <h3 class="c-panel__title p-step-list__title">親STEPタイトル</h3>
                                </div>
                                <div class="l-row l-row--between l-row--center p-step-list__body">
                                    <p class="p-step-list__time">終了目安：1時間</p>
                                    <p class="p-step-list__sum">全10STEP</p>
                                </div>
                            </a>
                        </div>
                        <div class="l-row__col12 l-row__col06-pc p-step-list__panel-container">
                            <div class="c-panel p-step-list__panel">
                                <div class="c-panel__category p-step-list__category">カテゴリー</div>
                                <div class="c-panel__img p-step-list__img">
                                    <img src="img/trouble_person.jpg" alt="">
                                </div>
                                <div class="l-row l-row--between p-step-list__head">
                                    <h3 class="c-panel__title p-step-list__title">親STEPタイトル</h3>
                                </div>
                                <div class="l-row l-row--between l-row--center p-step-list__body">
                                    <p class="p-step-list__time">終了目安：1時間</p>
                                    <p class="p-step-list__sum">全10STEP</p>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
            <!-- サブカラム（サイドバー） -->
            <div class="l-row__col12 l-row__col04-pc">
                <div class="c-sidebar">
                        <div class="c-sidebar__group">
                            <a href="{{ route('steps.create') }}" class="c-btn c-btn--warning c-sidebar__btn--full">STEPを作る</a>
                        </div>
                        <div class="c-sidebar__group">
                            <h2 class="c-sidebar__head"><span class="c-sidebar__title"><i class="fas fa-search c-sidebar__icn"></i>探す</span></h2>
                            <div class="c-sidebar__body">
                                    <div class="c-sidebar__search">

                                    </div>
                                    <input type="text" class="c-input-full">
                                    <button class="">検索</button>
                            </div>
                        </div>
    
                        <div class="c-sidebar__group"> 
                            <h2 class="c-sidebar__head"><span class="c-sidebar__title"><i class="fas fa-list c-sidebar__icn"></i>カテゴリー</span></h2>
                            <div class="c-sidebar__body">
                                <ul class="c-sidebar__list">
                                    <li class="c-sidebar__list-item c-sidebar__list-item--active">
                                        すべて
                                    </li>
                                    @foreach ($categories as $category)
                                        <li class="c-sidebar__list-item">
                                            {{ $category->name }}
                                        </li>
                                    @endforeach
                                    {{-- <li class="c-sidebar__list-item">
                                        ゆかちんこ
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        {{-- <div class="c-sidebar__group"> 
                            <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-lang="ja" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div> --}}
                

                </div>
            </div>
        </div>
    </div>
    <!-- フッター -->
@endsection
