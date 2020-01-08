$(function() {

    

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
    //スクロールしてトップ
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

    $('.js-toggle-sp-menu').on('click', function () {
        $(this).toggleClass('c-btn--trigger--active');
        $('.js-toggle-sp-menu-target').toggleClass('p-header__nav--active');
        $('html').toggleClass('u-position--fixed');
    });
    
});