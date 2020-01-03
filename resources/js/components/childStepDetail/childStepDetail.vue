<template>
    <!-- メインコンテンツ -->
    <div class="l-container u-bg-light">
        <div class="l-row l-site-width">
            <!-- メインカラム -->
            <childStepDetailItem
                :parentStep="parentStep"
                :childStep="showChildStep"
                :clearNum="clearNum"
                :user="user"
                :challengeFlg="challengeFlg"
            ></childStepDetailItem>
            <!-- サブカラム（サイドバー） -->
            <childStepDetailSidebar
                :childSteps="childSteps"
            ></childStepDetailSidebar>
        </div>
    </div>
</template>

<script>
    import childStepDetailItem from './childStepDetailItem';
    import childStepDetailSidebar from './childStepDetailSidebar';
    export default {
        components: {
            childStepDetailItem,
            childStepDetailSidebar
        },
        computed: {
            showChildStep: function() {
                for (let i = 0; i < this.childSteps.length; i++) {
                    if(this.childSteps[i]['id'] === this.childId) {
                        return this.childSteps[i];
                    }
                }
            }
            
        },
        props: ['parentStep', 'childSteps', 'childId', 'clearNum', 'user', 'challengeFlg']
    }
</script>