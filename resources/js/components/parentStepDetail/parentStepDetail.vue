<template>
    <!-- メインコンテンツ -->
    <div class="l-container u-bg-light">
        <div class="l-row l-site-width">
            <!-- メインカラム -->
            <div class="l-row__col12 l-row__col08-pc">
                <section class="p-parent">
                    <!-- 親STEP詳細 -->
                    <parentStepDetailItem
                        :user="user"
                        :parentStep="parentStep"
                        :challengeFlg="challengeFlg"
                    ></parentStepDetailItem>
                </section>
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
                <challengeBtn
                    :parentStepId="parentStep.id"
                    :childStepId="parentStep.child_steps[0]['id']"
                    :user="user"
                    :challengeFlg="challengeFlg"
                ></challengeBtn>
            </div>
            <!-- サブカラム（サイドバー） -->
            <parentStepDetailSidebar
                :createUser="createUser"
            ></parentStepDetailSidebar>
        </div>
    </div>
</template>

<script>
    import parentStepDetailItem from './parentStepDetailItem';
    import childStepIndex from '../childStepIndex/childStepIndex';
    import challengeBtn from './challengeBtn';
    import parentStepDetailSidebar from './parentStepDetailSidebar';
    export default {
        components: {
            parentStepDetailItem,
            childStepIndex,
            challengeBtn,
            parentStepDetailSidebar
        },
        props: ['parentStep', 'user', 'createUser', 'challengeFlg'],
    }
</script>
