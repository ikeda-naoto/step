<template> 
    <!-- メインコンテンツ -->
    <div class="l-container u-bg--light">
        <div class="l-row l-site-width">
            <!-- メインカラム -->
            <stepListItem></stepListItem>
            <!-- サブカラム（サイドバー） -->
            <stepListSidebar></stepListSidebar>
        </div>
    </div>
</template>

<script>
    import stepListItem from './stepListItem';
    import stepListSidebar from './stepListSidebar';
    //import store from './store/index';
    import { mapState, mapActions } from 'vuex'
    export default {
        components: {
            stepListItem,
            stepListSidebar,
        },
        mounted() {
            this.load(1)
        },
        methods: {
            ...mapActions([
                'getPaginationData',
            ]),
            load(page) {
                this.getPaginationData(page);
            }
        }   
    }
</script>