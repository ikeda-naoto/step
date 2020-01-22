<template>

<div>
    <modal
        v-show="errMsgs.length" 
        :errMsgs="errMsgs"
    ></modal>
    <!-- メインコンテンツ -->
    <div class="l-container u-bg--light">
        <div class="l-row l-row--center l-site-width">
            <!-- メインカラム -->
            <div class="l-row l-row--center l-row__col12--sm l-row__col12--tab l-row__col10--pc">
                <div class="p-regist-step">
                    <!-- 親STEP登録フォーム -->
                    <registParentStep
                        :categories="categories"
                        v-model="parentStep"
                        :editFlg="editFlg"
                    ></registParentStep>                    
                    <!-- 子STEP登録フォーム -->
                    <registChildStep
                        v-for="(childStep, index) in childSteps"
                        :key="uuid[index]"
                        :index="index"
                        v-model="childSteps[index]"
                    ></registChildStep>

                    <div class="u-mt--xxl"> 
                        <button class="c-btn c-btn--success c-btn--small" @click="addChildStep">
                            <i class="fas fa-plus u-mr--s"></i>
                            STEPを追加
                        </button>
                    </div>
                    <div class="u-mt--5l">
                        <button class="c-btn c-btn--center c-btn--warning c-btn--medium" @click="onSubmit" :disabled="isPush">
                            {{ !editFlg ? '登録する' : '編集する' }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import inputFile from '../inputFile';
    import modal from '../modal';
    import registChildStep from './registChildStep';
    import Mixin from '../mixins/mixin';
    import registParentStep from './registParentStep';
    import { uuid } from 'vue-uuid';
    export default {
        components: {
            inputFile,
            modal,
            registParentStep,
            registChildStep,
        },
        props: ['parentStepData', 'childStepsData', 'categories', 'editFlg'],
        mixins: [Mixin],
        data: function() {
            return {
                // 親STEPの情婦を格納する連想配列
                parentStep: {
                    parent_title: '',
                    category_id: '',
                    parent_content: '',
                    pic: '',
                },
                // リストレンダリング時のキーを保存しておく配列（こうしないとフォーム入力バインディング時に、フォーカスが外れてしまうため）
                uuid: [],
                // 子STEPの情報を保存しておく配列
                childSteps: [],
                errMsgs: [],
                isPush: false,
            }
        },
        created: function() {
            // データの初期化
            if(this.editFlg) { // STEP編集の場合
                for (let key in this.parentStep) { // 親STEPの各データについてループ
                    if(key === 'pic') { // keyがpicのとき
                        // propsデータに画像のパスがあればオブジェクトへ代入
                        this.parentStep[key] = this.parentStepData[key] !== null ? this.parentStepData[key] : '';
                    }else { // それ以外
                        // 親ステップの各プロパティをオブジェクトへ代入
                        this.parentStep[key] = this.parentStepData[key];
                    }
                }
                // 各子STEPのオブジェクトをそれぞれ配列へ代入
                this.childStepsData.forEach(element => {
                    this.childSteps.push(element);
                    this.uuid.push(uuid.v1());
                });
            }else { // STEP登録の場合
                // 配列へ子STEP1のオブジェクトを代入
                this.childSteps.push(
                    {
                        child_title: '',
                        time: 0,
                        child_content: '',
                    },
                );
                // オブジェクトに対応する一意のキーを配列へ代入
                this.uuid.push(uuid.v1());
            }
        },
        methods : {
            // axios通信用メソッド
            onSubmit : function() {
                this.isPush = !this.isPush;
                // 各データを格納
                let data = new FormData();
                // csrfトークンを保存
                data.append('_token', $('meta[name="csrf-token"]').attr('content'));
                for (let key in this.parentStep) { // 親STEPの情報をDBのカラム名に紐付けてそれぞれ保存
                    if(key === 'pic') { // keyがpicのとき
                        !(typeof this.parentStep[key] === 'string' || this.parentStep[key] instanceof String) ? data.append(key, this.parentStep[key]) : false; // 型が文字列でないとき（ファイルの時）はdataに格納して送信。画像の登録をしない時にバリデーションに引っかかるのを防ぐため。
                    }else { // それ以外の時
                        data.append(key, this.parentStep[key]);
                    }
                }
                // 子STEPの情報をDBのカラム名に紐付けて配列にして保存
                for(let key1 in this.childSteps) {
                    for (let key2 in this.childSteps[key1]) {
                        //console.log(this.childSteps[key1]);
                        data.append(key2 + '[]', this.childSteps[key1][key2]);
                    }
                }
                let config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                    },
                };
                let url = '';
                if(this.editFlg) {
                    url = '/steps/' + this.parentStepData.id;
                    config.headers['X-HTTP-Method-Override'] = 'PATCH';
                }else {
                    url = '/steps'
                }

                // axios通信
                axios.post(url, data, config)
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
            // 子STEP追加用メソッド
            addChildStep: function() {
                this.childSteps.push(
                    {
                        child_title: '',
                        time: 0,
                        child_content: '',
                    }
                )
                this.uuid.push(uuid.v1());
            },
        }
    }
</script>