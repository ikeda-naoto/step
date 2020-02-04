<template>
    <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc">
        <!-- 親STEP詳細 -->
        <parentStepDetailItem
            :user="user"
            :parentStep="parentStep"
            :challengeFlg="challengeFlg"
        ></parentStepDetailItem>
        <!-- チャレンジボタン等 -->
        <parentStepDetailBtns
            :parentStepId="parentStep.id"
            :firstChildStepId="parentStep.child_steps[0]['id']"
            :user="user"
            :challengeFlg="challengeFlg"
        ></parentStepDetailBtns>
        <!-- 子STEPインデックス -->
        <childStepIndex
            :childSteps="parentStep.child_steps"
        ></childStepIndex>
    </div>
</template>

<script>
    import parentStepDetailItem from './parentStepDetailItem';
    import childStepIndex from '../childStepIndex/childStepIndex';
    import parentStepDetailBtns from './parentStepDetailBtns';
    export default {
        components: {
            parentStepDetailItem,
            childStepIndex,
            parentStepDetailBtns
        },
        props: ['parentStep', 'user', 'challengeFlg'],
    }
</script>
