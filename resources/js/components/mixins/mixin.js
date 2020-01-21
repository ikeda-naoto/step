export default {
    methods: {
        // ツイッターシェア処理
        twitterShare: function(shareTitle) {
            // 現在のURLを取得
            let url = encodeURIComponent(location.href);
            // ツイッターに投稿する内容を変数に代入
            let text = encodeURIComponent(shareTitle + ' | あなたの人生の「STEP」を共有しよう')
            //シェアする画面を設定
            let shareUrl = 'https://twitter.com/intent/tweet?text=' + text + '%0a' + '&url=' + url + '&hashtags=' + 'STEP,学習手順,共有';
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
        autoLink: function(str) {
            let regexp_url = /((h?)(ttps?:\/\/[a-zA-Z0-9.\-_@:/~?%&;=+#',()*!]+))/g; // ']))/;
            let regexp_makeLink = function(all, url, h, href) {
                return '<a href="h' + href + '">' + url + '</a>';
            }
             
            return str.replace(regexp_url, regexp_makeLink);
        }
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
        // ¥nを改行コード<br>へ変換
        nl2br: function() {
            return function(text) {
                if(!this.isset(text)) {
                    return '';
                }
                return text.replace(/\n/g, '<br/>');
            }
        },

    },
}