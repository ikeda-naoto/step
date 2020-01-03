@extends('layouts.app')

@section('content')
    {{-- トップへのスクロールボタン --}}
    <a href="" class="c-btn--pageTop js-scroll-top"><i class="fas fa-angle-double-up"></i></a>
    <div class="l-container p-lp u-p-0">
        <section class="p-baner l-row l-row--middle l-row--center">
            <h1 class="p-baner__phrase ">
                あなたの人生のSTEPを共有しよう
            </h1>
        </section>
        <section class="l-container p-trouble u-bg-light">
            <div class="l-site-width">
                <h2 class="p-lp__title">学習するとき<br>こんなことで悩んでいませんか？</h2>
                <div class="l-row l-row--between p-trouble__head">
                    <div class="l-row__col12 l-row__col06-pc p-trouble__img">
                        <img src="{{ asset('images/trouble_person.jpg') }}" alt="">
                    </div>
                    <ul class="l-row__col12 l-row__col06-pc">
                        <li class="p-trouble__list">「なにを勉強すればいいかわからない...」</li>
                        <li class="p-trouble__list">「なにから始めればいいかわからない...」</li>
                        <li class="p-trouble__list">「もっといい方法があるのでは...?」</li>
                        <li class="p-trouble__list">「みんなはどうしているんだろう...?」</li>
                        <li class="p-trouble__list">「効率よく学習したいのに...」</li>
                        <li class="p-trouble__list">「自分の学習法をみんなに教えてあげたい...」</li>
                    </ul>
                </div>
                <h3 class="p-trouble__body">
                    大丈夫。<br>
                    「STEP」なら、そのお悩み解決できます。<br>
                    しかも、無料で。
                </h3>
                <a href="{{ route('register') }}" class="c-btn c-btn--center c-btn--success p-lp__btn">今すぐ無料会員登録</a>
            </div>
        </section>
        <section class="l-container p-intro u-bg-dark">
            <div class="l-site-width">
                <h2 class="p-lp__title">STEPとは？</h2>
                <div class="p-intro__body">
                    <p class="p-intro__text">
                        「STEP」は学びたい人たちが集まり、お互いの「良い勉強順序」を共有する学習支援サービスです。
                    </p>
                    <p class="p-intro__text">
                        プログラミングや英語などを学習するとき、多くの人が非効率な学習をしてしまう。<br>
                        なぜなら、学習には「順序」が大切だから。
                    </p>
                    <p class="p-intro__text">
                        効率的な学習には必ず「良い順序」があります。<br>
                        ただがむしゃらに学習しても、時間ばかりが過ぎるだけです。
                    </p>
                    <p class="p-intro__text">
                        「STEP」では、あらゆるジャンルにおいて「良い」と思った学習順序を共有し、それを元に「効率的」に学習を進めることができます。
                    </p>
                </div>
            </div>
        </section>
        <section class="l-container p-merit u-bg-light">
            <div class="l-site-width">
                <h2 class="p-lp__title">STEPで学習すると...</h2>
                <div class="l-row l-row--between p-merit__body">
                    <ul class="l-row__col12 l-row__col04-pc">
                        <li class="p-merit__list"><i class="fas fa-check-square p-merit__icn fa-2x"></i>学習方法になやまない</li>
                        <li class="p-merit__list"><i class="fas fa-check-square p-merit__icn fa-2x"></i>学習方法になやまない</li>
                        <li class="p-merit__list"><i class="fas fa-check-square p-merit__icn fa-2x"></i>学習方法になやまない</li>
                        <li class="p-merit__list"><i class="fas fa-check-square p-merit__icn fa-2x"></i>学習方法になやまない</li>
                        <li class="p-merit__list"><i class="fas fa-check-square p-merit__icn fa-2x"></i>学習方法になやまない</li>
                        <li class="p-merit__list"><i class="fas fa-check-square p-merit__icn fa-2x"></i>学習方法になやまない</li>
                    </ul>
                    <div class="l-row__col12 l-row__col06-pc p-merit__img">
                        <img src="{{ asset('images/step_block.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="l-container p-browse u-bg-dark">
            <div class="l-site-width">
                <h2 class="p-lp__title u-mb-0">STEPを見る</h2>
                <p class="p-browse__head">
                    会員登録不要でSTEPを見ることができます。<br>
                    STEPの登録・チャレンジには会員登録（無料）が必要です。
                </p>
                <div class="l-row p-step-list">
                    @foreach ($parentSteps as $parentStep)
                        <a href="{{ route('steps.showParent', $parentStep->id) }}" class="l-row__col12 l-row__col04-pc p-step-list__panel-container">
                            <div class="c-panel p-step-list__panel">
                                <div class="c-panel__category p-step-list__category">{{ $parentStep->category->name }}</div>
                                <div class="c-panel__img p-step-list__img">
                                    <img src="img/trouble_person.jpg" alt="">
                                </div>
                                <div class="l-row l-row--between p-step-list__head">
                                    <h3 class="c-panel__title p-step-list__title">{{ $parentStep->parent_title }}</h3>
                                </div>
                                <div class="l-row l-row--between l-row--center p-step-list__body">
                                    <p class="p-step-list__time">終了目安：{{ $parentStep->time / 60}}
                                        時間</p>
                                    <p class="p-step-list__sum">全{{ $parentStep->sumChildNum }}STEP</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    {{-- <div class="l-row__col12 l-row__col04-pc p-step-list__panel-container">
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
                    <div class="l-row__col12 l-row__col04-pc p-step-list__panel-container">
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
                    <div class="l-row__col12 l-row__col04-pc p-step-list__panel-container">
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
                    <div class="l-row__col12 l-row__col04-pc p-step-list__panel-container">
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
                    <div class="l-row__col12 l-row__col04-pc p-step-list__panel-container">
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
                    <div class="l-row__col12 l-row__col04-pc p-step-list__panel-container">
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
                    </div> --}}
                </div>
                    <a href="{{ route('steps.create') }}" class="c-btn c-btn--warning p-browse__btn">他のSTEPを見る</a>
                    <a href="{{ route('register') }}" class="c-btn c-btn--success p-lp__btn">今すぐ無料会員登録</a>
            </div>
        </section>
    </div>
@endsection