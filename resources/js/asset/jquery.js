$(function() {
    // TOPへ戻る
    let jsScrollTop = $('.js-scroll-top');  
    jsScrollTop.hide()  
    //スクロールが100に達したらボタン表示
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            jsScrollTop.fadeIn();
        } else {
            jsScrollTop.fadeOut();
        }
    });
    //スクロールしてトップへ
    jsScrollTop.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });

    // LPページフェードイン
    let $jsAnimateFadeIn = $('.js-animate-fadeIn');
    $jsAnimateFadeIn.css('opacity', 0);
    $(window).scroll(function (){
        let fadeSpeed = 2000;
        $jsAnimateFadeIn.each(function(){
        let elemPos = $(this).offset().top,
            scroll = $(window).scrollTop(),
            windowHeight = $(window).height();
        if (scroll > elemPos - windowHeight + 100){
            $(this).animate({opacity:1}, fadeSpeed);
        }
        });
    });

    // LPのコンテンツ連続フェードイン
    let $jsAnimateFadeInTop = $('.js-animate-fadeIn-top');
    $jsAnimateFadeInTop.css('opacity', 0)
    $(window).scroll(function(){
        let delaySpeed = 300,
            fadeSpeed = 1000;
        if($jsAnimateFadeInTop.length !== 0) {
            $jsAnimateFadeInTop.each(function(i){
            let elemPos = $(this).offset().top,
                scroll = $(window).scrollTop(),
                windowHeight = $(window).height();
            if(scroll > elemPos - windowHeight) {
                $(this).delay(i*(delaySpeed)).animate({opacity:1},fadeSpeed);
            }
        });
        }
    });

    // フラッシュメッセージ表示
    let $jsFlashMessage = $('.js-flash-message');
    if ($jsFlashMessage.children().text().replace(/\s+/g, '').length > 0) {
        $jsFlashMessage.fadeIn(2000);
        setTimeout(function () {
            $jsFlashMessage.fadeOut(2000);
        }, 3000);
    }

    // レスポンシブデザインのハンバーガーメニュー
    $('.js-toggle-sp-menu').on('click', function () {
        // メニューバーをacriveに
        $(this).toggleClass('c-btn--trigger--active');
        // メニュー 表示時、背景がスクロールしないように固定
        $('html').css({
            'overflow': 'hidden',
            'height': '100%'
        });
        // メニューバーをクリックした時に動かす要素のDOMを取得
        $jsToggleSpMenuTarget = $('.js-toggle-sp-menu-target');
        if($jsToggleSpMenuTarget.css('transform') === 'none') { // transformプロパティが設定されていなかったら
            // 250px分左へ移動する
            $jsToggleSpMenuTarget.css('transform', 'translateX(-250px)');
        }else { // transformプロパティが設定されていたら
            // 元に戻す
            $jsToggleSpMenuTarget.css('transform', '');
            $('html').css({
                'overflow': '',
                'height': ''
            });
        }
    });
    
});