<template>
    <!-- メインコンテンツ -->
    <div class="l-container u-bg--light">
        <div class="l-row l-site-width">
            <template v-if="parentStep.deleted_at===null">
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
            </template>
            <deleteStep
                v-else
            ></deleteStep>
        </div>
    </div>
</template>

<script>
    import parentStepDetailMainColumn from './parentStepDetailMainColumn';
    import parentStepDetailSidebar from './parentStepDetailSidebar';
    import deleteStep from '../deleteStep';
    export default {
        components: {
            parentStepDetailMainColumn,
            parentStepDetailSidebar,
            deleteStep
        },
        props: ['parentStep', 'user', 'createUser', 'challengeFlg'],
    }
</script>
