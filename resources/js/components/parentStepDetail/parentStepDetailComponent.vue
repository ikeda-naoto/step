<template>
    <!-- メインコンテンツ -->
    <div class="l-container u-bg-light">
        <div class="l-row l-site-width">
            <!-- メインカラム -->
            <div class="l-row__col12 l-row__col08-pc">
                <section class="p-parent">
                    <!-- 親STEP詳細 -->
                    <parentStepDetailMainComponent
                    :user="user"
                    :parentStep="parentStep"
                    :challengeFlg="challengeFlg"></parentStepDetailMainComponent>
                </section>
                <!-- チャレンジボタン -->
                <challengeBtnComponent
                            :parentStepId="parentStep.id"
                            :user="user"
                            :challengeFlg="challengeFlg"></challengeBtnComponent>
                <!-- 子STEPインデックス -->
                <childStepIndexComponent
                :childSteps="parentStep.child_steps"></childStepIndexComponent>
                <!-- チャレンジボタン -->
                <challengeBtnComponent
                :parentStepId="parentStep.id"
                :user="user"
                :challengeFlg="challengeFlg"></challengeBtnComponent>
            </div>
            <!-- サブカラム（サイドバー） -->
            <parentStepDetailSidebarComponent
            :createUser="createUser"></parentStepDetailSidebarComponent>
        </div>
    </div>
</template>

<script>
    import parentStepDetailMainComponent from './parentStepDetailMainComponent';
    import childStepIndexComponent from './childStepIndexComponent';
    import challengeBtnComponent from './challengeBtnComponent';
    import parentStepDetailSidebarComponent from './parentStepDetailSidebarComponent';
    export default {
        components: {
            parentStepDetailMainComponent,
            childStepIndexComponent,
            challengeBtnComponent,
            parentStepDetailSidebarComponent
        },
        props: ['parentStep', 'user', 'createUser', 'challengeFlg'],
    }
</script>
