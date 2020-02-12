export default {
    methods: {
        // ツイッターシェア処理
        twitterShare: function(title) {
            let userAgent = window.navigator.userAgent.toLowerCase();
            // 現在のURLを取得
            let url = encodeURIComponent(location.href),
            // シェアするときのURLを保存する変数を定義
                shareUrl = '';
            if(userAgent.indexOf('msie') != -1 ||userAgent.indexOf('trident') != -1) { // IEの場合
                shareUrl = 'https://twitter.com/intent/tweet?url=' + url;
            }
            else {
                // ツイッターに投稿する内容を変数に代入
                let text = encodeURIComponent(title + ' | あなたの人生の「STEP」を共有しよう');
                shareUrl = 'https://twitter.com/intent/tweet?text=' + text + '%0a' + '&url=' + url + '&hashtags=' + 'STEP,学習手順,共有';
            }
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
        // 文字列の中からURLを探し、リンクへと置換する
        autoLink: function(str) {
            let regexp_url = /((h?)(ttps?:\/\/[a-zA-Z0-9.\-_@:/~?%&;=+#',()*!]+))/g; // ']))/;
            let regexp_makeLink = function(all, url, h, href) {
                return '<a href="h' + href + '">' + url + '</a>';
            }
             
            return str.replace(regexp_url, regexp_makeLink);
        },
        // STEP登録とプロフィール登録のエラー処理
        errorHandling: function(error) {
            // 不明なエラーが起こった時
            if(!this.isset(error.response)) {
                alert('不正な操作が行われました。');
                location.href = '/mypage';
            }
            // バリデーション引っかかった場合
            else if(error.response.status === 422 || this.isset(error.response.data.errors)) { 
                // エラーメッセージを変数に格納し、モーダルで表示する
                for (let key in error.response.data.errors) {
                    this.errMsgs.push(error.response.data.errors[key][0]);
                }
            }
            // それ以外のエラーの場合
            else {
                alert('しばらく時間をおいてから再度試してください');
            }
            this.isPush = !this.isPush;
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
                    totalTime += parseInt(child.time,10);
                });
                return totalTime / 60.0;
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