<template>
<div>
    <div class="c-panel__category p-parent__category">{{ parentStep.categoryName }}</div>
                    <div class="p-parent__outer">
                        <div class="p-parent__inner">
                            <div class="p-parent__head">    
                                <h1 class="p-parent__title">「{{ parentStep.parent_title }}」</h1>
                            </div>
                            
                            <figure class="p-parent__img">
                                <img src="img/promon_img.png" alt="">
                            </figure>
                            <!-- <div class="p-parent__sharebtn">
                                <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-show-count="false" data-lang="ja">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div> -->
                            <div class="p-parent__body">
                                <div class="p-parent__textarea">
                                    {{ parentStep.parent_content }}
                                </div>
                            </div>
                            
                            <div class="p-parent__foot">
                                <p class="p-parent__time">終了目安：{{ parentStep.time / 60 }}時間</p>
                            </div>
                            <challengeBtnComponent></challengeBtnComponent>
                        </div>
                    </div>
</div>
</template>

<script>
import challengeBtnComponent from '../parentStepDetail/challengeBtnComponent';
    export default {
        props: ['parentStep'],
        components: {
            challengeBtnComponent
        }
    }
</script>