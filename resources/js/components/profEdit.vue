<template>
    <div>
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
                <div class="l-row l-row--center l-row__col12--sm l-row__col12--tab l-row__col10--pc">
                    <div class="c-form p-prof-edit">
                        <h1 class="c-title--normal u-mb--5l">プロフィール編集</h1>
                        <!-- ニックネーム入力欄 -->
                        <div class="l-row c-form__group">
                            <div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
                                <label for="name" class="c-form__label">ニックネーム</label>
                                <span class="c-form__option">任意</span>
                            </div>
                            <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc">
                                <input v-model="name" id="name" name="name" type="text" class="c-input c-input--full" :class="name.length > 20 ? 'c-input--err' : ''">
                                <span class="u-fontcolor--err" v-if="name.length > 20">ニックネームは20文字以下にしてください。</span>
                            </div>
                        </div>
                        <!-- 自己紹介入力欄 -->
                        <div class="l-row c-form__group">
                            <div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
                                <label for="intro" class="c-form__label">自己紹介</label>
                                <span class="c-form__option">任意</span>
                            </div>
                            <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc">
                                <textarea v-model="introduction" name="introduction" class="c-textarea c-textarea--low c-textarea--full" id="intro"></textarea>
                                <div class="u-text--right"><span :class="introduction.length > 400 ? 'u-fontcolor--err' : false">{{ introduction.length }}</span>/400</div>
                            </div>
                        </div>
                        <!-- プロフィール画像 -->
                        <inputFile
                            text="プロフィール画像"
                            :pic="user.pic"
                            @updatePic="updatePic"
                        ></inputFile>
                        <!-- メールアドレス入力欄 -->
                        <div class="l-row c-form__group">
                            <div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
                                <label for="email" class="c-form__label">メールアドレス</label>
                                <span class="c-form__require">必須</span>
                            </div>
                            <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc">
                                <input v-model="email" name="email" id="email" type="email" class="c-input c-input--full" value="email" required autocomplete="email">
                            </div>
                        </div>
                        <!-- 送信ボタン -->
                        <div class="l-row c-form__group">
                            <button type="button" class="c-btn c-btn--success c-btn--right c-btn--small u-mt--l" @click="onSubmit" :disabled="isPush">編集する</button>
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
        computed: {
        },
        methods : {
            // プロフィール編集処理
            onSubmit : function() {
                this.isPush = !this.isPush;
                let data = new FormData();
                // 各データを格納
                data.append('_token', $('meta[name="csrf-token"]').attr('content')) // csrfトークンを保存
                data.append('name', this.name);
                data.append('introduction', this.introduction);
                !(typeof this.pic === 'string' || this.pic instanceof String) ? data.append('pic', this.pic) : false; // 型が文字列でないとき（ファイルの時）はdataに格納して送信。画像の登録をしない時にバリデーションに引っかかるのを防ぐため。
                data.append('email', this.email)
                let config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-HTTP-Method-Override': 'PATCH'
                    },
                };
                // axios通信
                axios.post('/users', data, config,)
                .then(res => {
                    // 通信成功の場合
                    // マイページへ遷移
                    location.href = '/users/mypage';
                 })
                .catch(error => {
                    // 通信失敗の場合
                    // エラー処理
                    this.errorHandling(error); 
                });
            },
            updatePic: function(val) {
                this.pic = val;
            }
        }
    }
</script>