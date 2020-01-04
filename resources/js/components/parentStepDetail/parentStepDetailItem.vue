<template>
<div>
    <div class="c-panel__category p-parent__category">{{ parentStep.category.name }}</div>
                    <div class="p-parent__outer">
                        <div class="p-parent__inner">
                            <div class="p-parent__head">    
                                <h1 class="p-parent__title">「{{ parentStep.parent_title }}」</h1>
                            </div>
                            
                            <figure class="p-parent__img">
                                <img :src="showStepImg(parentStep.pic)" alt="">
                            </figure>
                            <!-- <div class="p-parent__sharebtn">
                                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-show-count="false" data-lang="ja">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div> -->
                            <div class="p-share">
                                <button class="c-btn c-btn--twitter p-share__btn" @click="onClickTwitterShare"><i class="fab fa-twitter p-share__icn"></i>ツイート</button>
                            </div>
                            <div class="p-parent__body">
                                <div class="p-parent__textarea" v-html="$sanitize(nl2br(parentStep.parent_content))">
                                </div>
                            </div>
                            
                            <div class="p-parent__foot">
                                <p class="p-parent__time">終了目安：{{ showTotalTime(parentStep.child_steps) }}時間</p>
                            </div>
                        </div>
                    </div>
</div>
</template>

<script>
    import Mixin from '../mixins/mixin';
    export default {
        props: ['user', 'parentStep', 'challengeFlg'],
        mixins: [Mixin],
        methods: {
            onClickTwitterShare: function() {
                // ツイッターシェアするときのタイトル
                let shareTitle = this.parentStep.parent_title;
                this.twitterShare(shareTitle);
            }
        },
    }
</script>