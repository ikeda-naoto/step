<template>
    <div>
        <!-- パンくずリスト -->
        <div class="l-bread-crumbs">
            <div class="p-bread-crumbs l-row  l-row--middle">
                <ul class="l-site-width l-row p-bread-crumbs__list">
                    <li><a href="" class="p-bread-crumbs__link">ホーム</a><i class="fas fa-angle-right p-bread-crumbs__icn"></i></li>
                    <li>マイページ</li>
                </ul>
            </div>
        </div>
        <!-- モーダル -->
        <!-- エラーメッセージがある時に表示 -->
        <modal
            v-show="errMsgs.length" 
            :errMsgs="errMsgs"
        ></modal>
        <!-- メインコンテンツ -->
        <div class="l-container u-bg--light">
            <div class="l-row l-row--center l-site-width">
                <!-- メインカラム -->
                <div class="l-row l-row--center l-row__col12 l-row__col10-pc">
                    <div class="c-form p-prof-edit">
                        <h1 class="c-title--normal u-mb--5l">プロフィール編集</h1>
                        <!-- ニックネーム入力欄 -->
                        <div class="l-row c-form__group">
                            <div class="l-row__col12 l-row__col04-pc">
                                <label for="name" class="p-prof-edit__label">ニックネーム</label>
                            </div>
                            <div class="l-row__col12 l-row__col08-pc">
                                <input v-model="name" id="name" name="name" type="text" class="c-input c-input--full">
                            </div>
                        </div>
                        <!-- 自己紹介入力欄 -->
                        <div class="l-row c-form__group">
                            <div class="l-row__col12 l-row__col04-pc">
                                <label for="intro" class="p-prof-edit__label">自己紹介</label>
                            </div>
                            <div class="l-row__col12 l-row__col08-pc">
                                <textarea v-model="introduction" name="introduction" class="c-textarea c-textarea--high c-textarea--full" id="intro"></textarea>
                            </div>
                        </div>
                        <!-- プロフィール画像 -->
                        <inputFile
                            :pic="user.pic"
                            @updatePic="updatePic"
                        ></inputFile>
                        <!-- メールアドレス入力欄 -->
                        <div class="l-row c-form__group">
                            <div class="l-row__col12 l-row__col04-pc">
                                <label for="email" class="p-prof-edit__label">メールアドレス</label>
                            </div>
                            <div class="l-row__col12 l-row__col08-pc">
                                <input v-model="email" name="email" id="email" type="email" class="c-input c-input--full" value="email" required autocomplete="email" autofocus>
                            </div>
                        </div>
                        <!-- 送信ボタン -->
                        <div class="l-row c-form__group">
                            <button type="button" class="c-btn c-btn--success c-btn--right c-btn--small" @click="onSubmit" :disabled="isPush">編集する</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import inputFile from './inputFile';
    import modal from './modal';
    import Mixin from './mixins/mixin';
    export default {
        components: {
            inputFile,
            modal
        },
        props: ['user'],
        data: function() {
            return {
                id: this.user.id,
                name: this.isset(this.user.name) ? this.user.name : '',
                introduction: this.isset(this.user.introduction) ? this.user.introduction : '',
                pic: this.isset(this.user.pic) ? this.user.pic : '',
                email: this.user.email,
                errMsgs: [],
                isPush: false
            }
        },
        mixins: [Mixin],
        methods : {
            // axios通信用メソッド
            onSubmit : function() {
                this.isPush = !this.isPush;
                let data = new FormData();
                // 各データを格納
                // csrfトークンを保存
                data.append('_token', $('meta[name="csrf-token"]').attr('content'))
                data.append('name', this.name);
                data.append('introduction', this.introduction);
                !(typeof this.pic === 'string' || this.pic instanceof String) ? data.append('pic', this.pic) : false; // 型が文字列でないとき（ファイルの時）はdataに格納して送信。画像の登録をしない時にバリデーションに引っかかるのを防ぐため。
                data.append('email', this.email)
                let config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                };

                // PUT で上書く
                config.headers['X-HTTP-Method-Override'] = 'PATCH';
                // axios通信
                axios.post('/users', data, config,)
                .then(res => {
                    // 通信成功の場合
                    console.log(res.data);
                    // マイページへ遷移
                    location.href = '/users/mypage';
                 })
                .catch(error => {
                    // 通信失敗の場合
                    // バリデーション引っかかった場合
                    if(error.response.data.errors) { 
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
                });
            },
            updatePic: function(val) {
                this.pic = val;
            }
        }
    }
</script>