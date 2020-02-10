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
                    <transition-group name="fade">
                        <registChildStep
                            v-for="(childStep, index) in childSteps"
                            :key="uuid[index]"
                            :index="index"
                            :showIcnFlg="childSteps.length!==1 ? true : false"
                            v-model="childSteps[index]"
                            @onClickDeleteIcn="onClickDeleteIcn"
                        ></registChildStep>
                    </transition-group>

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
                    title: '',
                    category_id: '',
                    content: '',
                    pic: '',
                },
                // リストレンダリング時のキーを保存しておく配列（こうしないとフォーム入力バインディング時に、フォーカスが外れてしまうため）
                uuid: [],
                // 子STEPの情報を保存しておく配列
                childSteps: [],
                errMsgs: [],
                isPush: false,
                deleteChildStepId: []
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
                        id: '',
                        title: '',
                        time: '',
                        content: '',
                    },
                );
                // オブジェクトに対応する一意のキーを配列へ代入
                this.uuid.push(uuid.v1());
            }
        },
        methods : {
            onClickDeleteIcn: function(index, id) {
                // 警告表示のテキスト
                let alertMsg = 'STEP' + (index + 1) + 'を削除してよろしいですか？';
                if(this.editFlg) { // 編集画面の時
                    // テキストを追加
                    alertMsg = alertMsg + '\n\n※画面下部の「編集する」をクリックするまで変更は反映されません';
                }
                if(!confirm(alertMsg)) { // キャンセルがクリックされたら
                    return;
                }
                // 削除する子STEPに紐づくキーを配列から削除
                this.uuid.splice(index, 1);
                // 削除する子STEPを配列から削除
                this.childSteps.splice(index, 1);
                // DBに登録済みの子STEPが削除された場合、その子STEPのIDを配列に格納
                this.isset(id) ? this.deleteChildStepId.push(id) : false;
            },
            // STEP登録処理
            onSubmit : function() {
                this.isPush = !this.isPush;
                // 各データを格納
                let data = new FormData();
                // csrfトークンを保存
                data.append('_token', $('meta[name="csrf-token"]').attr('content'));
                // 親STEPの情報を配列に格納
                for (let key in this.parentStep) { 
                    if(key === 'pic') { // keyがpicのとき
                        !(typeof this.parentStep[key] === 'string' || this.parentStep[key] instanceof String) ? data.append('parent_' + key, this.parentStep[key]) : false; // 型が文字列でないとき（ファイルの時）はdataに格納して送信。画像の登録をしない時にバリデーションに引っかかるのを防ぐため。
                    }else { // それ以外の時
                        data.append('parent_' + key, this.parentStep[key]);
                    }
                }
                // 子STEPの情報を配列に格納
                for(let key1 in this.childSteps) {
                    for (let key2 in this.childSteps[key1]) {
                        if(key2 !== 'id') {
                            data.append('child_' + key2 + '[]', this.childSteps[key1][key2]);
                        }
                    }
                }
                // 削除する子STEPのidを配列に格納（削除する子STEPがない時は処理が行われない）
                for(let i in this.deleteChildStepId) {
                    data.append('deleteChildStepId[]', this.deleteChildStepId[i]);
                }

                let config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                    },
                };
                let url = '';
                // 登録か編集でURLを分ける
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
                    // マイページへ遷移
                    location.href = '/users/mypage';
                 })
                .catch(error => {
                    // 通信失敗の場合
                    // エラー処理
                    this.errorHandling(error); 
                });
            },
            // 子STEP追加処理
            addChildStep: function() {
                this.childSteps.push(
                    {
                        id: '',
                        title: '',
                        time: '',
                        content: '',
                    }
                )
                this.uuid.push(uuid.v1());
            },
        }
    }
</script>

<style>
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
</style>