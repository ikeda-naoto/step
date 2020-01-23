@extends('layouts.app')

@section('title', 'ホーム')

@section('content')
    {{-- トップへのスクロールボタン --}}
    <a href="" class="c-btn--pageTop js-scroll-top"><i class="fas fa-angle-double-up"></i></a>
    <div class="l-container p-lp u-p--0">
        <section class="p-baner">
            <h1 class="p-baner__phrase">
                あなたの人生のSTEPを共有しよう
            </h1>
        </section>
        <div class="l-container u-bg--light">
            <div class="l-site-width">
                <section class="p-about js-animate-fadeIn">
                    <div class="p-lp__head">
                        <h3 class="p-lp__title--en">ABOUT</h3>
                        <h2 class="p-lp__title">STEPとは</h2>
                    </div>

                        <div class="p-lp__inner u-position--relative">
                            <h3 class="p-about__title">
                                「STEP」は学びたい人たちが集まり、<br>
                                お互いの「良い学習順序」を共有する学習支援サービスです。
                            </h3>
                            <p class="p-about__text">
                                <span class="u-marker--warning">学びたい人が、 良い順序で効率よく学べる。</span><br>
                                そんな空間を提供いたします。
                            </p>
                            <p class="p-about__text">
                                学習するとき、多くの人が非効率な学習をしてしまう。<br>
                                なぜなら、<span class="u-marker--warning">学習には「順序」が大切だから。</span>
                            </p>
                            <p class="p-about__text">
                                <span class="u-marker--warning">効率的な学習には必ず「良い順序」があります。</span><br>
                                ただがむしゃらに学習しても、時間ばかりが過ぎるだけです。
                            </p>
                            <p class="p-about__text">
                                「STEP」では、あらゆるジャンルにおいて「良い」と思った学習順序を共有し、それを元に「効率的」に学習を進めることができます。
                            </p>
                            <div class="l-row u-mt--5l">
                                <a href="{{ route('register') }}" class="c-btn c-btn--success c-btn--big p-lp__btn">今すぐ無料会員登録</a>
                            </div>  
                            <div class="p-about__img">
                                <img src="{{ asset('images/study.png') }}" alt="">
                            </div> 
                        </div>
                </section>
            </div>
        </div>
        <div class="l-container">
            <div class="l-site-width">
                <section class="p-wall js-animate-fadeIn">
                    <div class="p-lp__head">
                        <h3 class="p-lp__title--en">CHALLENGE</h3>
                        <h2 class="p-lp__title">
                            大きな壁を乗り越えて、<br>
                            知識の幅を広げる
                        </h2>
                    </div>
                    <div class="p-lp__inner">
                        <p class="p-lp__text">
                            変化の激しい今、その変化に取り残されないためにも、個の力をつけることが必要不可欠となりました。<br>
                            しかし、学問は多種多様で学び方が異なるなど<span class="u-marker--warning">必ず乗り越えなければならない壁にぶつかります。</span><br>
                            「STEP」で学習をすることで、<span class="u-marker--warning">挫折せずに最短で効率よく学ぶことができます。</span>
                        </p> 
                        <div class="l-row l-row--center">
                            <h3 class="c-title--small">学習においてぶつかる壁</h3>
                        </div>
                        
                        <ul class="p-wall__list">
                            <li class="l-row p-wall__list-item js-animate-fadeIn-top">
                                <div class="p-wall__list-num">
                                    1
                                </div>
                                <div class="l-row__col10--pc l-row__col10--tab p-wall__textarea">
                                    <div class="p-wall__title">
                                        なにを学べばよいかわからない
                                    </div>
                                    <div class="p-wall__descript">
                                        学習して自分を変えなければと思うものの、新しく学習を始める際、初学者は「なにを学べばよいかわからない」という問題に陥ります。その結果、学びたい意欲はあるものの、調べることにばかり時間を使ってしまい、なかなか行動を起さない、学習時間が確保できない、などの理由で成長することができなくなってしまいます。
                                    </div>
                                </div>
                            </li> 
                            <li class="l-row p-wall__list-item js-animate-fadeIn-top">
                                <div class="p-wall__list-num">
                                    2
                                </div>
                                <div class="l-row__col10--pc l-row__col10--tab p-wall__textarea">
                                    <div class="p-wall__title">
                                        どうやって学習すれば良いかわからない
                                    </div>
                                    <div class="p-wall__descript">
                                        なにを勉強するべきかが明確になったとしても、次にこのような問題に直面します。原因は「情報量」の多さ。情報化社会における現代ではその情報量の多さによって判断が混乱し、正しい選択ができなくなってしまいます。すると、誤った方法・方向で努力をしてしまい有意義な学習を行うことができなくなってしまいます。
                                    </div>
                                </div>
                            </li> 
                            <li class="l-row p-wall__list-item js-animate-fadeIn-top">
                                <div class="p-wall__list-num">
                                    3
                                </div>
                                <div class="l-row__col10--pc l-row__col10--tab p-wall__textarea">
                                    <div class="p-wall__title">
                                        モチベーションが続かない
                                    </div>
                                    <div class="p-wall__descript">
                                        目標達成のためにはモチベーションの維持は重要です。しかし、モチベーションは時間の経過とともに低下していくものです。また、一度低下したモチベーションを学習開始当初まで向上させるということは簡単ではありません。学習において挫折してしまう原因の多くは、この「モチベーション」の管理不足によるものです。
                                    </div>
                                </div>
                            </li> 
                        </ul>
                    </div>
                </section>
            </div>
        </div>
        <div class="l-container u-p--0">
            <section class="p-feature js-animate-fadeIn">
                <h2 class="p-feature__title">STEPの特徴</h2>
                <div class="l-site-width">
                    <ul class="l-row p-feature__list">
                        <li class="l-row__col12--sm l-row__col04--tab l-row__col04--pc p-feature__list-item js-animate-fadeIn-top">
                            <div class="p-feature__inner">
                                <h3 class="p-feature__content">STEPを作っているのは同じ学習者</h3>
                            </div>
                            <p class="p-feature__text">
                                学習には人それぞれ「これが良かった」という順番と内容があります。また、一度学んだからこそわかる学習のポイントや挫折しやすいポイントなどもあるでしょう。弊社サービスではそのような経験をもとに、同じ学習者が「STEP」を作成、投稿し、学習者はその「STEP」をもとに学習を進めていくことができます。
                            </p>
                        </li>  
                        <li class="l-row__col12--sm l-row__col04--tab l-row__col04--pc p-feature__list-item js-animate-fadeIn-top">
                            <div class="p-feature__inner">
                                <h3 class="p-feature__content">学習方法に悩まず、正しい手順で学習ができる</h3>
                            </div>
                            <p class="p-feature__text">
                                「STEP」にはそれぞれ学習の手順と内容が記載されています。その手順と内容に従って学習をすることで、初学者が陥りやすい誤った方法・方向での学習を防止できます。結果として、あなたが求めるスキルを最短で効率よく学ぶことができるでしょう。
                            </p>
                        </li>  
                        <li class="l-row__col12--sm l-row__col04--tab l-row__col04--pc p-feature__list-item js-animate-fadeIn-top">
                            <div class="p-feature__inner">
                                <h3 class="p-feature__content">ゲーム感覚で楽しみながら学べる</h3>
                            </div>
                            <p class="p-feature__text">
                                「STEP」は学習を始める際に「チャレンジ」をし、学習が終了するたびに「クリア」をすることで学習の進捗をゲーム感覚で管理することができます。<br>また、進捗度が目に見えてわかるため、モチベーションの維持にも繋がり、楽しみながら学習を進めることができます。
                            </p>
                        </li>      
                    </ul>
                </div>
            </section>
        </div>
        <div class="l-container u-bg--light">
            <section class="p-browse js-animate-fadeIn">
                <div class="l-site-width">
                    <div class="p-lp__head">
                        <h3 class="p-lp__title--en">VIEW</h3>
                        <h2 class="p-lp__title u-mb--0">STEPを見る</h2>
                    </div>

                    <div class="p-lp__inner">
                        <p class="p-lp__text">
                            会員登録不要でSTEPを見ることができます。<br>
                            STEPの登録・チャレンジには会員登録（無料）が必要です。
                        </p>
                    </div>
                    <h3 class="p-browse__title"><span>実際に登録されているSTEP一覧</span></h3>
                    <div class="l-row p-step-list">
                        @foreach ($parentSteps as $parentStep)
                            <a href="{{ route('steps.showParent', $parentStep->id) }}" class="l-row__col12--sm  l-row__col06--tab l-row__col04--pc p-step-list__panel-container js-animate-fadeIn-top">
                                <div class="c-panel p-step-list__panel">
                                    <div class="c-panel__category p-step-list__category">{{ $parentStep->category->name }}</div>
                                    <div class="c-img p-step-list__img">
                                        <img class="c-img__item--center" src="{{ !empty($parentStep->pic) ? asset('/storage/img/'.$parentStep->pic) : asset('/images/no-img.png') }}" alt="">
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
                </section>
            </div>
        </div>
    </div>
@endsection