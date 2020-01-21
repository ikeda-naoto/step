<template>
    <div class="l-row__col12 l-row__col08-pc u-pr--l u-pl--l">
        <section class="p-step-detail">
            <div class="p-step-detail__inner">
                <div class="p-step-detail__head">
                    <!-- 子STEPタイトル -->
                    <h1 class="c-title--normal p-step-detail__title">
                        STEP{{ childStep.num }}<br>
                        「{{ childStep.child_title }}」
                    </h1>
                </div>
                <!-- 子STEP内容 -->
                <div class="p-step-detail__body">
                    <div class="p-step-detail__textarea" v-html="$sanitize(nl2br(autoLink(childStep.child_content)))">
                    </div>
                </div>
                <!-- ツイッターシェアボタン -->
                <twitterShare
                    @onClickTwitterShare="onClickTwitterShare"
                ></twitterShare>
                <div class="l-row p-step-detail__foot">
                    <!-- クリアボタン -->
                    <clearButton
                        :parentStepId="parentStep.id"
                        :childStep="childStep"
                        :clearNum="clearNum"
                        :user="user"
                        :challengeFlg="challengeFlg"
                    ></clearButton>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    import clearButton from './clearButton';
    import twitterShare from '../twitterShare';
    import Mixin from '../mixins/mixin';
    export default {
        components: {
            clearButton,
            twitterShare
        },
        props: ['parentStep', 'childStep', 'clearNum', 'user', 'challengeFlg'],
        mixins: [Mixin],
        methods: {
            // ツイッターにSTEP情報をシェアする
            onClickTwitterShare: function() {
                // ツイッターシェアするときのタイトル
                let shareTitle = '- ' + this.parentStep.parent_title + ' STEP' + this.childStep.num + ' ' + this.childStep.child_title + ' -';
                this.twitterShare(shareTitle);
            }
        }
    }
</script>

<style>

</style>