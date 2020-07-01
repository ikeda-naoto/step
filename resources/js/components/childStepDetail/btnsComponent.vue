<template>
    <!-- ログインしていなかったら -->
    <registAndChallengeBtnComponent
        v-if="!isset(user)"
    ></registAndChallengeBtnComponent>
    <!-- すでにクリアしていたら -->
    <div v-else-if="clearNum >= showChildStep.num" class="c-btn c-btn--small c-btn--secondary c-btn--right u-pt--l u-pb--l">
        クリア済み
    </div>
    <!-- チャレンジしていなかったら -->
    <challengeBtnComponent
        v-else-if="!challengeFlg" 
        :parentStepId="parentStepId"
        :firstChildStepId="firstChildStepId"
    ></challengeBtnComponent>
    <!-- チャレンジしているが前のSTEPをクリアしていなかったら -->
    <div v-else-if="challengeFlg && clearNum + 1 < showChildStep.num" class="c-btn c-btn--small c-btn--warning c-btn--right c-btn--pale u-pt--l u-pb--l">
        クリアで解放
    </div>
    <!-- チャレンジしていて前のSTEPをクリアしていたら -->
    <clearBtnComponent
        v-else
        :parentStepId="parentStepId"
        :showChildStepId="showChildStep.id"
    ></clearBtnComponent>
</template>

<script>
    import Mixin from '../mixins/mixin';
    import challengeBtnComponent from '../challengeBtnComponent';
    import clearBtnComponent from './clearBtnComponent';
    import registAndChallengeBtnComponent from '../registAndChallengeBtnComponent'
    export default {
        props: ['parentStepId', 'firstChildStepId', 'showChildStep', 'clearNum', 'user', 'challengeFlg'],
        components: {
            challengeBtnComponent,
            clearBtnComponent,
            registAndChallengeBtnComponent
        },
        mixins: [Mixin],
    }
</script>

<style>

</style>