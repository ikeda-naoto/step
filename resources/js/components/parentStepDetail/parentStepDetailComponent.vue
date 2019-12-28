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
                <!-- 子STEPインデックス -->
                <childStepIndexComponent
                :childSteps="childSteps"></childStepIndexComponent>
                <challengeBtnComponent></challengeBtnComponent>
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
        props: ['parentStep', 'childSteps', 'user', 'createUser', 'challengeFlg'],
    }
</script>
