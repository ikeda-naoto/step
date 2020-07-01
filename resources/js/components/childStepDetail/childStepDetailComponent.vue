<template>
    <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc">
        <section class="p-step-detail">
            <div class="p-step-detail__inner">
                <div class="p-step-detail__head">
                    <!-- 子STEPタイトル -->
                    <h1 class="c-title--normal p-step-detail__title">
                        STEP{{ showChildStep.num }}<br>
                        「{{ showChildStep.title }}」
                    </h1>
                </div>
                <!-- 子STEP内容 -->
                <div class="p-step-detail__body">
                    <div class="u-text--right">目安達成時間：{{ showChildStep.time / 60 }}時間</div>
                    <div class="p-step-detail__textarea" v-text="showChildStep.content">
                    </div>
                </div>
                <!-- ツイッターシェアボタン -->
                <twitterShareComponent
                    @onClickTwitterShare="onClickTwitterShare"
                ></twitterShareComponent>
                <div class="l-row p-step-detail__foot">
                    <!-- クリアボタン等 -->
                    <btnsComponent
                        :parentStepId="parentStep.id"
                        :firstChildStepId="firstChildStepId"
                        :showChildStep="showChildStep"
                        :clearNum="clearNum"
                        :user="user"
                        :challengeFlg="challengeFlg"
                    ></btnsComponent>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import btnsComponent from './btnsComponent';
    import twitterShareComponent from '../twitterShareComponent';
    import Mixin from '../mixins/mixin';
    export default {
        components: {
            btnsComponent,
            twitterShareComponent
        },
        props: ['parentStep', 'firstChildStepId', 'showChildStep', 'clearNum', 'user', 'challengeFlg'],
        mixins: [Mixin],
        methods: {
            // ツイッターにSTEP情報をシェアする
            onClickTwitterShare: function() {
                // ツイッターシェアするときのタイトル
                let shareTitle = '- ' + this.parentStep.title + ' STEP' + this.showChildStep.num + ' ' + this.showChildStep.title + ' -';
                this.twitterShare(shareTitle);
            }
        }
    }
</script>

<style>

</style>