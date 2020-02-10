<template>
    <!-- メインコンテンツ -->
    <div class="l-container u-bg--light">
        <div class="l-row l-site-width">
            <template v-if="parentStep.deleted_at===null">
                <!-- メインカラム -->
                <childStepDetailMainColumn
                    :parentStep="parentStep"
                    :firstChildStepId="childSteps[0]['id']"
                    :showChildStep="showChildStep"
                    :clearNum="clearNum"
                    :user="user"
                    :challengeFlg="challengeFlg"
                ></childStepDetailMainColumn>
                <!-- サブカラム（サイドバー） -->
                <childStepDetailSidebar
                    :childSteps="childSteps"
                ></childStepDetailSidebar>
            </template>
            <deleteStep
                v-else
            ></deleteStep>
        </div>
    </div>
</template>

<script>
    import childStepDetailMainColumn from './childStepDetailMainColumn';
    import childStepDetailSidebar from './childStepDetailSidebar';
    import deleteStep from '../deleteStep';
    export default {
        components: {
            childStepDetailMainColumn,
            childStepDetailSidebar,
            deleteStep
        },
        props: ['parentStep', 'childSteps', 'showChildStep', 'clearNum', 'user', 'challengeFlg']
    }
</script>