<template>
    <!-- メインカラム -->
    <div class="l-row__col12 l-row__col08-pc p-mypage">
        <challengeSteps
            :challengeSteps="challengeSteps"
        ></challengeSteps>
        <registedSteps
            :registSteps="registSteps"
            :challengeSteps="challengeSteps"
        ></registedSteps>

    </div>
</template>

<script>
    import registedSteps from './registedSteps';
    import challengeSteps from './challengeSteps'
    export default {
        components: {
            registedSteps,
            challengeSteps
        },
        props: ['registSteps', 'challengeSteps']
    }
</script>