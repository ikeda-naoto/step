<template>
    <section class="p-registed-step u-mb-l">
        <h2 class="c-title--type01 u-mb-3l">登録したSTEP</h2>
        <div class="p-registed-step__list">
            <registedStepPanel
                v-for="registStep in registSteps"
                :key="registStep.id"
                :registStep="registStep"
            ></registedStepPanel>
            <div v-if="registSteps.length === 0" class="l-row l-row--center">
                 <p class="u-fontsize--l">
                    登録したSTEPがありません
                 </p>
            </div>
        </div>
    </section>
</template>

<script>
    import registedStepPanel from "./registedStepPanel";
    export default {
        components: {
            registedStepPanel
        },
        props: ['registSteps', 'challengeSteps']
    }
</script>