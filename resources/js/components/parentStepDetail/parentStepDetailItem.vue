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
            <div class="p-share">
                <button class="c-btn p-share__btn p-share__btn--twitter" @click="onClickTwitterShare">
                    <i class="fab fa-twitter p-share__icn"></i>ツイート
                </button>
            </div>
            <div class="p-step-detail__body">
                <div class="p-step-detail__textarea" v-html="$sanitize(nl2br(parentStep.parent_content))">
                </div>
            </div>       
            <div class="p-step-detail__foot">
                <p class="u-text--right">終了目安：{{ showTotalTime(parentStep.child_steps) }}時間</p>
            </div>
        </div>
    </section>
</template>

<script>
    import Mixin from '../mixins/mixin';
    export default {
        props: ['user', 'parentStep', 'challengeFlg'],
        mixins: [Mixin],
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