<template>
    <!-- メインコンテンツ -->
    <div class="l-container u-bg--light">
        <div class="l-row l-site-width">
            <!-- メインカラム -->
            <parentStepDetailMainColumn
                :parentStep="parentStep"
                :user="user"
                :challengeFlg="challengeFlg"
            ></parentStepDetailMainColumn>
            <!-- サブカラム（サイドバー） -->
            <parentStepDetailSidebar
                :createUser="createUser"
            ></parentStepDetailSidebar>
        </div>
    </div>
</template>

<script>
    import parentStepDetailMainColumn from './parentStepDetailMainColumn';
    import parentStepDetailSidebar from './parentStepDetailSidebar';
    export default {
        components: {
            parentStepDetailMainColumn,
            parentStepDetailSidebar
        },
        props: ['parentStep', 'user', 'createUser', 'challengeFlg'],
    }
</script>
