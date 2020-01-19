$(function() {
    // TOPへ戻るボタン
    let jsScrollTop = $('.js-scroll-top');  
    // ボタンを隠す
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
        let fadeSpeed = 2500;
        $jsAnimateFadeIn.each(function(){
        let elemPos = $(this).offset().top,
            scroll = $(window).scrollTop(),
            windowHeight = $(window).height();
        if (scroll > elemPos - windowHeight + 100){
            $(this).animate({opacity:1}, fadeSpeed);
        }
        });
    });

    let $jsAnimateFadeInTop = $('.js-animate-fadeIn-top');
    $jsAnimateFadeInTop.css('opacity', 0)
    $(window).scroll(function(){
        let elemPos = $jsAnimateFadeInTop.eq(0).offset().top,
        scroll = $(window).scrollTop(),
        windowHeight = $(window).height();
        if(scroll > elemPos - windowHeight + 100) {
            let delaySpeed = 400,
                fadeSpeed = 2500;
            $jsAnimateFadeInTop.each(function(i){
                $(this).delay(i*(delaySpeed)).animate({opacity:1},fadeSpeed);
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
        $('html').toggleClass('u-position--fixed');
        // メニューバーをクリックした時に動かす要素のDOMを取得
        $jsToggleSpMenuTarget = $('.js-toggle-sp-menu-target');
        if($jsToggleSpMenuTarget.css('transform') === 'none') { // transformプロパティが設定されていなかったら
            // 250px分左へ移動する
            $jsToggleSpMenuTarget.css('transform', 'translateX(-250px)');
        }else { // transformプロパティが設定されていたら
            // 元に戻す
            $jsToggleSpMenuTarget.css('transform', '');
        }
    });
    
});