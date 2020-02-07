<template>
    <div class="l-row">
        <challengeBtn
            v-if="user && !challengeFlg"
            :parentStepId="parentStepId"
            :firstChildStepId="firstChildStepId"
        ></challengeBtn>
        <registAndChallengeBtn
            v-else-if="!isset(user)"
        ></registAndChallengeBtn>
        <div v-else class="c-btn c-btn--small c-btn--secondary c-btn--right u-pt--l u-pb--l">チャレンジ中</div>
    </div>

</template>

<script>
    import Mixin from '../mixins/mixin';
    import challengeBtn from '../challengeBtn';
    import registAndChallengeBtn from '../registAndChallengeBtn';
    export default {
        props: ['parentStepId', 'firstChildStepId', 'user', 'challengeFlg'],
        components: {
            challengeBtn,
            registAndChallengeBtn
        },
        mixins: [Mixin],
    }
</script>