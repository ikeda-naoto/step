@extends('layouts.app')

@section('title', 'ホーム')

@section('content')
    {{-- トップへのスクロールボタン --}}
    <a href="" class="c-btn--pageTop js-scroll-top"><i class="fas fa-angle-double-up"></i></a>
    <div class="l-container p-lp u-p--0">
        <section class="p-baner">
            <h1 class="p-baner__phrase ">
                あなたの人生のSTEPを共有しよう
            </h1>
        </section>
        <div class="l-container">
            <div class="l-site-width">
                <section class="p-about">
                    <h2 class="p-lp__title">STEPとは</h2>
                        <div class="p-lp__inner u-position--relative">
                            <h3 class="p-about__title">
                                「STEP」は学びたい人たちが集まり、<br>
                                お互いの「良い勉強順序」を共有する学習支援サービスです。
                            </h3>
                            <p class="p-about__text">
                                学びたい人が、 良い順序で効率よく学べる。<br>
                                そんな空間を提供いたします。
                            </p>
                            <p class="p-about__text">
                                学習するとき、多くの人が非効率な学習をしてしまう。<br>
                                なぜなら、学習には「順序」が大切だから。
                            </p>
                            <p class="p-about__text">
                                効率的な学習には必ず「良い順序」があります。<br>
                                ただがむしゃらに学習しても、時間ばかりが過ぎるだけです。
                            </p>
                            <p class="p-about__text">
                                「STEP」では、あらゆるジャンルにおいて「良い」と思った学習順序を共有し、それを元に「効率的」に学習を進めることができます。
                            </p>
                            <div class="l-row u-mt--5l">
                                <a href="{{ route('register') }}" class="c-btn c-btn--success c-btn--big p-lp__btn">今すぐ無料会員登録</a>
                            </div>  
                            <div class="p-about__img">
                                <img src="{{ asset('images/study.jpg') }}" alt="">
                            </div> 
                        </div>

                </section>
            </div>
        </div>
        <div class="l-container u-bg--light">
            <section class="p-wall">
                <div class="l-site-width">
                    <h2 class="p-lp__title">
                        大きな壁を乗り越えて、<br>
                        個人の時代で価値ある人材へ
                    </h2>
                    <div class="p-lp__inner">
                        <p class="p-lp__text">
                            変化の激しい今、その変化に取り残されないためにも、個の力をつけることが必要不可欠となりました。<br>
                            しかし、学習をするうえでは必ず乗り越えなければならない壁にぶつかります。<br>
                            STEPで学習をすることで、挫折せずに最短で効率よく学ぶことができます。
                        </p> 
                        <h3 class="c-title--small">学習においてぶつかる壁</h3>
                        <ul class="p-wall__list">
                            <li class="l-row p-wall__list-item">
                                <div class="p-wall__list-num">
                                    1
                                </div>
                                <div class="l-row__col10-pc p-wall__textarea">
                                    <div class="p-wall__title">
                                        なにを学べばよいかわからない
                                    </div>
                                    <div class="p-wall__descript">
                                        テキストテキストテキストテキストテキストテキスト
                                        テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                        テキストテキストテキストテキストテキストテキストテキストテキスト
                                    </div>
                                </div>
                            </li> 
                            <li class="l-row p-wall__list-item">
                                <div class="p-wall__list-num">
                                    2
                                </div>
                                <div class="l-row__col10-pc p-wall__textarea">
                                    <div class="p-wall__title">
                                        どうやって学べば良いかわからない
                                    </div>
                                    <div class="p-wall__descript">
                                        テキストテキストテキストテキストテキストテキスト
                                        テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                        テキストテキストテキストテキストテキストテキストテキストテキスト
                                    </div>
                                </div>
                            </li> 
                            <li class="l-row p-wall__list-item">
                                <div class="p-wall__list-num">
                                    3
                                </div>
                                <div class="l-row__col10-pc p-wall__textarea">
                                    <div class="p-wall__title">
                                        モチベーションが続かない
                                    </div>
                                    <div class="p-wall__descript">
                                        テキストテキストテキストテキストテキストテキスト
                                        テキストテキストテキストテキストテキストテキストテキストテキストテキスト
                                        テキストテキストテキストテキストテキストテキストテキストテキスト
                                    </div>
                                </div>
                            </li> 
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <div class="l-container u-p--0">
            <section class="p-feature">
                <h2 class="p-feature__title">挫折しない<br>良い学習ができるSTEPの特徴</h2>
                <div class="l-site-width">
                    <ul class="l-row p-feature__list">
                        <li class="l-row__col12 l-row__col04-pc p-feature__list-item">
                            <div class="p-feature__inner">
                                <h3 class="p-feature__content">STEPを作っているのは同じ学習者</h3>
                            </div>
                            <p class="p-feature__text">
                                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                            </p>
                        </li>  
                        <li class="l-row__col12 l-row__col04-pc p-feature__list-item">
                            <div class="p-feature__inner">
                                <h3 class="p-feature__content">学習方法に悩まず、正しい手順で学習ができる</h3>
                            </div>
                            <p class="p-feature__text">
                                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                            </p>
                        </li>  
                        <li class="l-row__col12 l-row__col04-pc p-feature__list-item">
                            <div class="p-feature__inner">
                                <h3 class="p-feature__content">ゲーム感覚で楽しみながら学べる</h3>
                            </div>
                            <p class="p-feature__text">
                                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                            </p>
                        </li>      
                    </ul>
                </div>
            </section>
        </div>
        <div class="l-container u-bg--light">
            <section class="p-browse">
                <div class="l-site-width">
                    <h2 class="p-lp__title u-mb--0">STEPを見る</h2>
                    <div class="p-lp__inner">
                        <p class="p-lp__text">
                            会員登録不要でSTEPを見ることができます。<br>
                            STEPの登録・チャレンジには会員登録（無料）が必要です。
                        </p>
                    </div>
                    <h3 class="p-browse__title"><span>実際に登録されているSTEP一覧</span></h3>
                    <div class="l-row p-step-list">
                        @foreach ($parentSteps as $parentStep)
                            <a href="{{ route('steps.showParent', $parentStep->id) }}" class="l-row__col12 l-row__col04-pc p-step-list__panel-container js-animate-fadeIn-top">
                                <div class="c-panel p-step-list__panel">
                                    <div class="c-panel__category p-step-list__category">{{ $parentStep->category->name }}</div>
                                    <div class="c-img p-step-list__img">
                                        <img class="c-img__item--center" src="{{ !empty($parentStep->pic) ? asset('/storage/img/'.$parentStep->pic) : asset('/images/unknown.png') }}" alt="">
                                    </div>
                                    <div class="l-row l-row--between p-step-list__head">
                                        <h3 class="c-panel__title p-step-list__title">{{ $parentStep->parent_title }}</h3>
                                    </div>
                                    <div class="l-row l-row--between l-row--center p-step-list__body">
                                        <p class="p-step-list__time">目安達成時間：{{ $parentStep->time}}
                                            時間</p>
                                        <p class="p-step-list__sum">全{{ count($parentStep->childSteps)  }}STEP</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="l-row u-pl--l u-pr--l">
                        <a href="{{ route('steps.index') }}" class="c-btn c-btn--medium c-btn--right c-btn--warning">他のSTEPを見る</a>
                    </div>
                    <div class="l-row u-mt--5l">
                        <a href="{{ route('register') }}" class="c-btn c-btn--center c-btn--success c-btn--big p-lp__btn">今すぐ無料会員登録</a>
                    </div>    
                </div>
            </section>
        {{-- <div class="l-container u-bg--light">
            <section class="p-trouble js-animate-fadeIn">
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
                    <div class="l-row">
                        <a href="{{ route('register') }}" class="c-btn c-btn--center c-btn--success c-btn--big p-lp__btn">今すぐ無料会員登録</a>
                    </div>
                </div>
            </section>
        </div>
        <div class="l-container u-bg--dark">
            <section class="p-intro js-animate-fadeIn">
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
        </div>
        <div class="l-container u-bg--light">
            <section class="p-merit js-animate-fadeIn">
                <div class="l-site-width">
                    <h2 class="p-lp__title">STEPで学習すると...</h2>
                    <div class="l-row l-row--between p-merit__body">
                        <ul class="l-row__col12 l-row__col06-pc">
                            <li class="p-merit__list">
                                <p class="p-merit__text">
                                    <i class="fas fa-check-square p-merit__icn fa-2x"></i>
                                    学習方法になやまない
                                </p>
                            </li>
                            <li class="p-merit__list">
                                <p class="p-merit__text">
                                    <i class="fas fa-check-square p-merit__icn fa-2x"></i>
                                    新しいスキルを簡単に身に付けることができる
                                </p>
                            </li>
                            <li class="p-merit__list">
                                <p class="p-merit__text">
                                    <i class="fas fa-check-square p-merit__icn fa-2x"></i>
                                    他の人の学習方法を見ることができる
                                </p>
                            </li>
                            <li class="p-merit__list">
                                <p class="p-merit__text">
                                    <i class="fas fa-check-square p-merit__icn fa-2x"></i>
                                    新しい学習方法を発見できる
                                </p>
                            </li>
                            <li class="p-merit__list">
                                <p class="p-merit__text">
                                    <i class="fas fa-check-square p-merit__icn fa-2x"></i>
                                    良い方法と手順で最短ルートの学習ができる
                                </p>        
                            </li>
                            <li class="p-merit__list">
                                <p class="p-merit__text">
                                    <i class="fas fa-check-square p-merit__icn fa-2x"></i>
                                    進捗が見えるのでモチベーションが高くなる
                                </p>
                            </li>
                        </ul>
                        <div class="l-row__col12 l-row__col06-pc p-merit__img">
                            <img src="{{ asset('images/step_block.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </section>    
        </div>
        <div class="l-container u-bg--dark">
            <section class="p-browse js-animate-fadeIn">
                <div class="l-site-width">
                    <h2 class="p-lp__title u-mb--0">STEPを見る</h2>
                    <p class="p-browse__head">
                        会員登録不要でSTEPを見ることができます。<br>
                        STEPの登録・チャレンジには会員登録（無料）が必要です。
                    </p>
                    <div class="l-row p-step-list">
                        @foreach ($parentSteps as $parentStep)
                            <a href="{{ route('steps.showParent', $parentStep->id) }}" class="l-row__col12 l-row__col04-pc p-step-list__panel-container js-animate-fadeIn-top">
                                <div class="c-panel p-step-list__panel">
                                    <div class="c-panel__category p-step-list__category">{{ $parentStep->category->name }}</div>
                                    <div class="c-img p-step-list__img">
                                        <img class="c-img__item--center" src="{{ !empty($parentStep->pic) ? asset('/storage/img/'.$parentStep->pic) : asset('/images/unknown.png') }}" alt="">
                                    </div>
                                    <div class="l-row l-row--between p-step-list__head">
                                        <h3 class="c-panel__title p-step-list__title">{{ $parentStep->parent_title }}</h3>
                                    </div>
                                    <div class="l-row l-row--between l-row--center p-step-list__body">
                                        <p class="p-step-list__time">終了目安：{{ $parentStep->time}}
                                            時間</p>
                                        <p class="p-step-list__sum">全{{ count($parentStep->childSteps)  }}STEP</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="l-row u-pl--l u-pr--l">
                        <a href="{{ route('steps.index') }}" class="c-btn c-btn--medium c-btn--right c-btn--warning">他のSTEPを見る</a>
                    </div>
                    <div class="l-row u-mt--5l">
                        <a href="{{ route('register') }}" class="c-btn c-btn--center c-btn--success c-btn--big p-lp__btn">今すぐ無料会員登録</a>
                    </div>    
                </div>
            </section> --}}
        </div>
    </div>
@endsection