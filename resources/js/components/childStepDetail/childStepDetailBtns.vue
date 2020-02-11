<template>
    <!-- ログインしていなかったら -->
    <registAndChallengeBtn
        v-if="!isset(user)"
    ></registAndChallengeBtn>
    <!-- すでにクリアしていたら -->
    <div v-else-if="clearNum >= showChildStep.num" class="c-btn c-btn--small c-btn--secondary c-btn--right u-pt--l u-pb--l">
        クリア済み
    </div>
    <!-- チャレンジしていなかったら -->
    <challengeBtn
        v-else-if="!challengeFlg" 
        :parentStepId="parentStepId"
        :firstChildStepId="firstChildStepId"
    ></challengeBtn>
    <!-- チャレンジしているが前のSTEPをクリアしていなかったら -->
    <div v-else-if="challengeFlg && clearNum + 1 < showChildStep.num" class="c-btn c-btn--small c-btn--warning c-btn--right c-btn--pale u-pt--l u-pb--l">
        クリアで解放
    </div>
    <!-- チャレンジしていて前のSTEPをクリアしていたら -->
    <clearBtn
        v-else
        :parentStepId="parentStepId"
        :showChildStepId="showChildStep.id"
    ></clearBtn>
</template>

<script>
    import Mixin from '../mixins/mixin';
    import challengeBtn from '../challengeBtn';
    import clearBtn from './clearBtn';
    import registAndChallengeBtn from '../registAndChallengeBtn'
    export default {
        props: ['parentStepId', 'firstChildStepId', 'showChildStep', 'clearNum', 'user', 'challengeFlg'],
        components: {
            challengeBtn,
            clearBtn,
            registAndChallengeBtn
        },
        mixins: [Mixin],
    }
</script>

<style>

</style>