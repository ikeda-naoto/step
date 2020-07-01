<template>
    <div class="l-row">
        <challengeBtnComponent
            v-if="user && !challengeFlg"
            :parentStepId="parentStepId"
            :firstChildStepId="firstChildStepId"
        ></challengeBtnComponent>
        <registAndChallengeBtnComponent
            v-else-if="!isset(user)"
        ></registAndChallengeBtnComponent>
        <div v-else class="c-btn c-btn--small c-btn--secondary c-btn--right u-pt--l u-pb--l">チャレンジ中</div>
    </div>

</template>

<script>
    import Mixin from '../mixins/mixin';
    import challengeBtnComponent from '../challengeBtnComponent';
    import registAndChallengeBtnComponent from '../registAndChallengeBtnComponent';
    export default {
        props: ['parentStepId', 'firstChildStepId', 'user', 'challengeFlg'],
        components: {
            challengeBtnComponent,
            registAndChallengeBtnComponent
        },
        mixins: [Mixin],
    }
</script>