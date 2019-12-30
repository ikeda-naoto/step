<template>
    <!-- メインカラム -->
    <div class="l-row__col12 l-row__col08-pc p-mypage">
        <challengeStepsComponent
        :challengeSteps="challengeSteps"></challengeStepsComponent>
        <registStepsComponent
        :registSteps="registSteps"
        :challengeSteps="challengeSteps"></registStepsComponent>

    </div>
</template>

<script>
    import registStepsComponent from './registStepsComponent';
    import challengeStepsComponent from './challengeStepsComponent'
    export default {
        components: {
            registStepsComponent,
            challengeStepsComponent
        },
        props: ['registSteps', 'challengeSteps']
    }
</script>