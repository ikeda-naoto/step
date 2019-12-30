export default {
    methods: {
        twitterShare: function(shareTitle) {
            let url = encodeURIComponent(location.href);
            let text = encodeURIComponent(shareTitle + ' | あなたの人生の「STEP」を共有しよう')
            //シェアする画面を設定
            let shareUrl = 'https://twitter.com/intent/tweet?text=' + text + '%0a' + '&url=' + url + '&hashtags=' + 'STEP,共有,学習,手順';
            //シェア用の画面へ移行
            location.href = shareUrl
        }
    },
    computed: {
        showStepImg: function() {
            return function(path) {
                if(path === null) {
                    return '/images/no-img.png'
                }
                return '/storage/img/' + path;
            }
        },
        showTotalTime: function() {
            return function(childStep) {
                let totalTime = 0;
                childStep.forEach(child => {
                    totalTime += child.time;
                });
                return totalTime / 60;
            }
        }
    }
}