<template>
    <div class="l-row__col12 l-row__col06-pc p-challenge-step__panel-container">
        <a :href="'/steps/' + challengeStep.parent_step.id" class="c-panel p-challenge-step__panel">
            <div class="c-img p-challenge-step__img">
                <img class="c-img__item--center" :src="showStepImg(challengeStep.parent_step.pic)" alt="">
            </div>
            <div class="p-challenge-step__head">
                <h3 class="c-panel__title p-challenge-step__title">「{{ challengeStep.parent_step.parent_title }}」</h3>
            </div>
            <div class="l-row l-row--between p-challenge-step__body">
                <p class="p-challenge-step__finish-num">進捗状況<span class="u-fontsize-l u-ml--s u-mr--s">{{ challengeStep.clear_num }}/{{ challengeStep.parent_step.child_steps.length }}</span>STEP</p>
                <p class="c-panel__time">終了目安：{{ showTotalTime(challengeStep.parent_step.child_steps) }}時間</p>
                <div class="p-challenge-step__progress">
                    <div class="p-challenge-step__progress--bar" :style="{width: calcClearPercentage + '%'}">
                        
                        <span class="p-challenge-step__progress--percentage" v-show="calcClearPercentage">{{ calcClearPercentage }}%</span>
                    </div> 
                </div>
            </div>
        </a>    
    </div>
</template>

<script>
    import Mixin from '../mixins/mixin';
    export default {
        props: ['challengeStep'],
        mixins: [Mixin],
        computed: {
            calcClearPercentage: function(){
                return Math.round((this.challengeStep.clear_num / this.challengeStep.parent_step.child_steps.length) * 100);
            }
        }
    }
</script>
