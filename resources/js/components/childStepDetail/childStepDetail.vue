<template>
    <!-- メインコンテンツ -->
    <div class="l-container u-bg--light">
        <div class="l-row l-site-width">
            <!-- メインカラム -->
            <childStepDetailMainColumn
                :parentStep="parentStep"
                :childStep="showChildStep"
                :clearNum="clearNum"
                :user="user"
                :challengeFlg="challengeFlg"
            ></childStepDetailMainColumn>
            <!-- サブカラム（サイドバー） -->
            <childStepDetailSidebar
                :childSteps="childSteps"
            ></childStepDetailSidebar>
        </div>
    </div>
</template>

<script>
    import childStepDetailMainColumn from './childStepDetailMainColumn';
    import childStepDetailSidebar from './childStepDetailSidebar';
    export default {
        components: {
            childStepDetailMainColumn,
            childStepDetailSidebar
        },
        props: ['parentStep', 'childSteps', 'showChildStep', 'clearNum', 'user', 'challengeFlg']
    }
</script>