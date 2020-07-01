<template>
    <section class="p-step-detail">
        <div class="c-panel__category p-step-detail__category">{{ parentStep.category.name }}</div>
        <div class="p-step-detail__inner">
            <div class="p-step-detail__head">    
                <h1 class="c-title--normal p-step-detail__title">「{{ parentStep.title }}」</h1>
            </div>    
            <div class="p-step-detail__img">
                <img :src="showStepImg(parentStep.pic)" alt="">
            </div>
            <twitterShareComponent
               @onClickTwitterShare="onClickTwitterShare"
            ></twitterShareComponent>
            <div class="p-step-detail__body">
                <div class="p-step-detail__textarea" v-text="parentStep.content">
                </div>
            </div>       
            <div class="p-step-detail__foot">
                <p class="u-text--right">目安達成時間：{{ showTotalTime(parentStep.child_steps) }}時間</p>
            </div>
        </div>
    </section>
</template>

<script>
    import Mixin from '../mixins/mixin';
    import twitterShareComponent from '../twitterShareComponent';
    import sanitizeHTML from 'sanitize-html';
    export default {
        props: ['user', 'parentStep', 'challengeFlg'],
        data: function() {
            return {
                a: "<div>あいうえお</div>"
            }
        },
        mixins: [Mixin],
        components: {
            twitterShareComponent
        },
        methods: {
            // ツイッターシェア処理
            onClickTwitterShare: function() {
                // ツイッターシェアするときのタイトル
                let shareTitle = this.parentStep.title;
                this.twitterShare(shareTitle);
            }
        },
    }
</script>