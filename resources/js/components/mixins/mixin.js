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
            if(this.parentStep.pic === null) {
                return '/images/no-img.png'
            }
            return '/storage/img/' + this.parentStep.pic;
        },
        showTotalTime: function() {
            let totalTime = 0;
            this.parentStep.child_steps.forEach(child => {
                totalTime += child.time;
            });
            return totalTime / 60;
        }
    }
}