<template>
    <section class="p-challenge-step">
        <h2 class="c-title--type01 u-mb--3l">チャレンジ中のSTEP</h2>
        <div class="l-row" :class="[challengeSteps.length === 0 ? 'l-row--center' : '' ]">
            <!-- チャレンジ中のSTEP一覧 -->
            <challengeStepPanel
                v-for="challengeStep in challengeSteps"
                :key="challengeStep.id"
                :challengeStep="challengeStep"
            ></challengeStepPanel>
            <!-- チャレンジ中のSTEPがない場合 -->
            <div v-if="challengeSteps.length === 0" class="l-row">
                <p class="u-fontsize--l">
                    チャレンジ中のSTEPがありません
                </p>
            </div>
        </div>
    </section>
</template>
<script>
    import challengeStepPanel from './challengeStepPanel';
    export default {
        components: {
            challengeStepPanel
        },
        props: ['challengeSteps']
    }
</script>