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

    // フラッシュメッセージ表示
    $jsFlashMessage = $('.js-flash-message');
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