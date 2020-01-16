<template>
    <div class="l-row__col12 l-row__col08-pc">
        <!-- ページタイトル -->
        <h1 class="c-title--normal u-mb--5l">STEP一覧</h1>
        <!-- STEP一覧 -->
        <div class="l-row p-step-list">
            <stepListPanel
                v-for="parentStep in parentSteps"
                :key="parentStep.id"
                :parentStep="parentStep"
            ></stepListPanel>
        </div>
        <!-- ページネーション  -->
        <pagination></pagination>
    </div>
</template>

<script>
    import { mapState } from 'vuex'
    import stepListPanel from './stepListPanel';
    import pagination from './pagination';
    export default {
        components: {
            stepListPanel,
            pagination
        },
        computed: {
            ...mapState([
                'parentSteps'
            ])
        }
    }
</script>