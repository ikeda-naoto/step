<template>
    <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc">
        <!-- 親STEP詳細 -->
        <itemComponent
            :user="user"
            :parentStep="parentStep"
            :challengeFlg="challengeFlg"
        ></itemComponent>
        <!-- チャレンジボタン等 -->
        <btnsComponent
            :parentStepId="parentStep.id"
            :firstChildStepId="parentStep.child_steps[0]['id']"
            :user="user"
            :challengeFlg="challengeFlg"
        ></btnsComponent>
        <!-- 子STEPインデックス -->
        <childStepIndexComponent
            :childSteps="parentStep.child_steps"
        ></childStepIndexComponent>
    </div>
</template>

<script>
    import itemComponent from './itemComponent';
    import childStepIndexComponent from '../childStepIndex/childStepIndexComponent';
    import btnsComponent from './btnsComponent';
    export default {
        components: {
            itemComponent,
            childStepIndexComponent,
            btnsComponent
        },
        props: ['parentStep', 'user', 'challengeFlg'],
    }
</script>
