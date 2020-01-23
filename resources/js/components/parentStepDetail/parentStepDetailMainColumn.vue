<template>
    <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc">
        <!-- 親STEP詳細 -->
        <parentStepDetailItem
            :user="user"
            :parentStep="parentStep"
            :challengeFlg="challengeFlg"
        ></parentStepDetailItem>
        <!-- チャレンジボタン -->
        <challengeBtn
            :parentStepId="parentStep.id"
            :childStepId="parentStep.child_steps[0]['id']"
            :user="user"
            :challengeFlg="challengeFlg"
        ></challengeBtn>
        <!-- 子STEPインデックス -->
        <childStepIndex
            :childSteps="parentStep.child_steps"
        ></childStepIndex>
        <!-- チャレンジボタン -->
        <!-- <challengeBtn
            :parentStepId="parentStep.id"
            :childStepId="parentStep.child_steps[0]['id']"
            :user="user"
            :challengeFlg="challengeFlg"
        ></challengeBtn> -->
    </div>
</template>

<script>
    import parentStepDetailItem from './parentStepDetailItem';
    import childStepIndex from '../childStepIndex/childStepIndex';
    import challengeBtn from './challengeBtn';
    export default {
        components: {
            parentStepDetailItem,
            childStepIndex,
            challengeBtn,
        },
        props: ['parentStep', 'user', 'challengeFlg'],
    }
</script>
