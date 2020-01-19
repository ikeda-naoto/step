<template>
    <section class="p-step-detail">
        <div class="c-panel__category p-step-detail__category">{{ parentStep.category.name }}</div>
        <div class="p-step-detail__inner">
            <div class="p-step-detail__head">    
                <h1 class="c-title--normal p-step-detail__title">「{{ parentStep.parent_title }}」</h1>
            </div>    
            <div class="p-step-detail__img">
                <img :src="showStepImg(parentStep.pic)" alt="">
            </div>
            <twitterShare
                @onClickTwitterShare="onClickTwitterShare"
            ></twitterShare>
            <div class="p-step-detail__body">
                <div class="p-step-detail__textarea" v-html="$sanitize(nl2br(parentStep.parent_content))">
                </div>
            </div>       
            <div class="p-step-detail__foot">
                <p class="u-text--right">終了目安時間：{{ showTotalTime(parentStep.child_steps) }}時間</p>
            </div>
        </div>
    </section>
</template>

<script>
    import Mixin from '../mixins/mixin';
    import twitterShare from '../twitterShare';
    export default {
        props: ['user', 'parentStep', 'challengeFlg'],
        mixins: [Mixin],
        components: {
            twitterShare
        },
        methods: {
            // ツイッターシェア処理
            onClickTwitterShare: function() {
                // ツイッターシェアするときのタイトル
                let shareTitle = this.parentStep.parent_title;
                this.twitterShare(shareTitle);
            }
        },
    }
</script>