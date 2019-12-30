<template>
    <section class="p-challenge-step">
        <h2 class="c-title--type01 u-mb-3l">チャレンジ中のSTEP</h2>
        <div class="l-row">
            <template v-for="challengeStep in challengeSteps">
                <challengeStepPanelComponent
                :key="challengeStep.id"
                :challengeStep="challengeStep"></challengeStepPanelComponent>
            </template>
            
            <!-- <div class="l-row__col12 l-row__col06-pc p-challenge-step__panel-container">
                <a class="c-panel p-challenge-step__panel">
                    <div class="c-panel__img p-challenge-step__img">
                        <img src="img/promon_img.png" alt="">
                    </div>
                    <div class="p-challenge-step__head">
                        <h3 class="c-panel__title p-challenge-step__title">「入門」</h3>
                    </div>
                    <div class="l-row l-row--between p-challenge-step__body">
                        <p class="p-challenge-step__finish-num">進捗状況<span class="u-fontsize-l u-ml-s u-mr-s">10/20</span>STEP</p>
                        <p class="c-panel__time">終了目安：10時間</p>
                        <div class="p-challenge-step__progress">
                            <div class="p-challenge-step__progress--bar">
                                <span class="p-challenge-step__progress--percentage">50%</span>
                            </div> 
                        </div>
                    </div>
                </a>    
            </div>                 -->
        </div>
    </section>
</template>
<script>
    import challengeStepPanelComponent from './challengeStepPanelComponent';
    export default {
        components: {
            challengeStepPanelComponent
        },
        props: ['challengeSteps']
    }
</script>