<template>

<div>
    <modalComponent
        v-show="errMsgs.length" 
        :errMsgs="errMsgs"></modalComponent>
    <!-- パンくずリスト -->
    <div class="l-bread-crumbs">
        <div class="p-bread-crumbs l-row  l-row--middle">
            <ul class="l-site-width l-row p-bread-crumbs__list">
                <li><a href="" class="p-bread-crumbs__link">ホーム</a><i class="fas fa-angle-right p-bread-crumbs__icn"></i></li>
                <li>STEP登録</li>
            </ul>
        </div>
    </div>
    <!-- メインコンテンツ -->
    <div class="l-container u-bg-light">
        <div class="l-row l-row--center l-site-width">
            <!-- メインカラム -->
            <div class="l-row l-row--center l-row__col10-pc">
                <div class="c-form p-regist-step u-bg-light">
                    <h1 class="c-title--normal u-mb-5l">STEP登録</h1>
                    <!-- 親STEP登録フォーム -->
                    <div class="p-regist-step__parent">
                        <div class="p-regist-step__group">
                            <!-- 親STEPタイトル -->
                            <div class="l-row c-form__group">
                                <div class="l-row__col04-pc">
                                    <label for="name" class="p-prof-edit__label">タイトル</label>
                                </div>
                                <div class="l-row__col08-pc">
                                    <input id="name" type="text" class="c-input c-input--full" v-model="parentStep.parent_title">
                                </div>
                            </div>
                            <!-- 親STEPカテゴリー -->
                            <div class="l-row c-form__group">
                                <div class="l-row__col04-pc">
                                    <label for="intro" class="p-prof-edit__label">カテゴリー</label>
                                </div>
                                <div class="l-row__col08-pc">
                                    <select name="" id="" class="c-select c-select--half" v-model="parentStep.category_id">
                                        <option value="">選択してください</option>
                                        <option v-for="category in categories" :key="category.id" :value="category.id">
                                            {{ category.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <!-- 親STEP内容 -->
                            <div class="l-row c-form__group">
                                <div class="l-row__col04-pc">
                                    <label for="email" class="p-prof-edit__label">STEPの内容</label>
                                </div>
                                <div class="l-row__col08-pc">
                                    <textarea class="c-textarea c-textarea--high c-textarea--full" name="" id="intro" v-model="parentStep.parent_content"></textarea>
                                </div>
                            </div>
                            <!-- 親STEP画像 -->
                            <inputFileComponent></inputFileComponent>
                        </div>
                    </div>
                    <!-- 子STEP登録フォーム -->
                    <template v-for="(childStep, index) in childSteps">
                        <registChildStepComponent
                        :key="uuid[index]"
                        :index="index"
                        v-model="childSteps[index]"></registChildStepComponent>
                    </template>

                    <div class="l-row l-row--between c-form__group">
                        <button class="c-btn c-btn--success p-regist-step__btn" @click="addChildStep"><i class="fas fa-plus u-mr-s"></i>STEPを追加</button>
                        <button class="c-btn c-btn--warning p-regist-step__btn" @click="onSubmit" :disabled="isPush">登録する</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import inputFileComponent from './inputFileComponent';
    import modalComponent from './modalComponent';
    import registChildStepComponent from './registChildStepComponent';
    import Mixin from './mixins/mixin';
    //import registParentStepComponent from './registParentStep';
    import { uuid } from 'vue-uuid';
    export default {
        components: {
            inputFileComponent,
            modalComponent,
            //registParentStepComponent,
            registChildStepComponent,
        },
        props: ['categories', 'times'],
        data: function() {
            return {
                // 親STEPの情婦を格納する連想配列
                parentStep: {
                    parent_title: '',
                    category_id: '',
                    parent_content: '',
                },
                file: '',
                // リストレンダリング時のキーを保存しておく配列（こうしないとフォーム入力バインディング時に、フォーカスが外れてしまうため）
                uuid: [
                    uuid.v1(),
                ],
                // 子STEPの情報を保存しておく配列
                childSteps: [
                    {
                        child_title: '',
                        time: 0,
                        child_content: '',
                    },
                ],
                errMsgs: [],
                isPush: false,
            }
        },
        mixins: [Mixin],
        methods : {
            // axios通信用メソッド
            onSubmit : function() {
                this.isPush = !this.isPush;
                console.log(this.parentStep)
                let data = new FormData();
                // 各データを格納
                for (let key in this.parentStep) { // 親STEPの情報をDBのカラム名に紐付けてそれぞれ保存
                    data.append(key, this.parentStep[key]);
                }
                // ファイル情報
                this.isset(this.file) ? data.append('file', this.file) : false; // nullなどで送るとバリデーションにひっかかってしまうため
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

                // axios通信
                axios.post('/steps', data, config)
                .then(res => {
                    // 通信成功の場合
                    console.log(res.data);
                    // マイページへ遷移
                    location.href = '/users/mypage';
                 })
                .catch(error => {
                    // 通信失敗の場合
                    // エラーメッセージを変数に格納し、モーダルで表示する
                    for (let key in error.response.data.errors) {
                        this.errMsgs.push(error.response.data.errors[key][0]);
                    }
                    this.isPush = !this.isPush;
                });
            },
            // 子STEP追加用メソッド
            addChildStep: function() {
                this.uuid.push(uuid.v1());
                this.childSteps.push(
                    {
                        child_title: '',
                        time: 0,
                        child_content: '',
                    }
                )
            },
            changeFile: function(file) {
                this.parentStep.file = file;
            }
        }
    }
</script>