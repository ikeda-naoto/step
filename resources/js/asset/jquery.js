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
});