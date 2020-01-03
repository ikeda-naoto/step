export default {
    methods: {
        twitterShare: function(shareTitle) {
            let url = encodeURIComponent(location.href);
            let text = encodeURIComponent(shareTitle + ' | あなたの人生の「STEP」を共有しよう')
            //シェアする画面を設定
            let shareUrl = 'https://twitter.com/intent/tweet?text=' + text + '%0a' + '&url=' + url + '&hashtags=' + 'STEP,共有,学習,手順';
            //シェア用の画面へ移行
            location.href = shareUrl;
        },
        // 引数が存在するかを判定する
        isset: function(data) {
            if(data === "" || data === null || data === undefined){
                return false;
            } else{
                return true;
            }
        },
    },
    computed: {
        // STEPのアイキャッチ画像を返す
        showStepImg: function() {
            return function(path) {
                if(path === null) {
                    return '/images/no-img.png'
                }
                return '/storage/img/' + path;
            }
        },
        // STEPの終了目安時間を計算して返す
        showTotalTime: function() {
            return function(childStep) {
                let totalTime = 0;
                childStep.forEach(child => {
                    totalTime += child.time;
                });
                return totalTime / 60;
            }
        },
    },
}