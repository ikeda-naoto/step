<template>
    <section class="p-registed-step u-mb-l">
        <h2 class="c-title--type01 u-mb-3l">登録したSTEP</h2>
        <template v-for="registStep in registSteps">
            <registStepPanelComponent
            :key="registStep.id"
            :registStep="registStep"></registStepPanelComponent>
        </template>
    </section>
</template>

<script>
    import registStepPanelComponent from "./registStepPanelComponent";
    export default {
        components: {
            registStepPanelComponent
        },
        props: ['registSteps', 'challengeSteps']
    }
</script>