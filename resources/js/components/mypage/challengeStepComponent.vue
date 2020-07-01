<template>
    <div class="l-row__col12--sm l-row__col06--tab l-row__col06--pc p-challenge-step__panel-container">
        <a :href="'/steps/' + parentStep.id" class="c-panel p-challenge-step__panel">
            <div class="c-img p-challenge-step__img">
                <img class="c-img__item--center" :src="showStepImg(parentStep.pic)" alt="">
            </div>
            <div class="p-challenge-step__head">
                <h3 class="c-panel__title p-challenge-step__title">
                    {{ parentStep.title }}
                </h3>
            </div>
            <div class="p-challenge-step__body">
                <p class="p-challenge-step__finish-num">
                    進捗状況
                    <span class="u-fontsize--l u-ml--s u-mr--s">
                        {{ clears.length }}/{{ childSteps.length }}
                    </span>
                    STEP
                </p>
                <div class="p-challenge-step__progress">
                    <div class="p-challenge-step__progress--bar" :style="{width: calcClearPercentage + '%'}">
                        <span class="p-challenge-step__progress--percentage" v-if="calcClearPercentage">
                            {{ calcClearPercentage }}%
                        </span>
                    </div> 
                </div>
                <p class="c-panel__time u-text--right">
                    目安達成時間：{{ showTotalTime(childSteps)}}時間
                </p>
            </div>
        </a>    
    </div>
</template>

<script>
import Mixin from '../mixins/mixin';
export default {
    props: ['challenge', 'parentStep', 'childSteps', 'clears'],
    mixins: [Mixin],
    computed: {
        // STEPの進捗度を計算する
        calcClearPercentage: function(){
            return Math.round((this.clears.length / this.childSteps.length) * 100);
        }
    }
}
</script>

<style>

</style>