<template>
    <!-- メインカラム -->
    <div class="l-row__col12 l-row__col08-pc p-mypage">
        <!-- チャレンジ中のSTEP -->
        <challengeSteps
            :challengeSteps="challengeSteps"
        ></challengeSteps>
        <!-- 登録したSTEP -->
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