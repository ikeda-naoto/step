<template>
    <div class="l-row l-row--center c-pagination" v-if="parentSteps.length !== 0">
        <ul class="l-row c-pagination__list">
            <!-- 現在のページが1の時は表示しない -->
            <li class="" v-if="current_page !== 1"><a class="c-pagination__num" href="" @click.prevent.stop="changePage(1)">&laquo;</a></li>
            <li v-for="page in pages" :key="page" :class="{active: page === current_page}">
                <a href="" class="c-pagination__num" :class="{'c-pagination__num--active': page === current_page}" @click.prevent.stop="changePage(page)">{{page}}</a>
            </li>
            <!-- 現在のページが最後のページの時は表示しない -->
            <li v-if="current_page !== last_page"><a href="" class="c-pagination__num" @click.prevent.stop="changePage(last_page)">&raquo;</a></li>
        </ul>
    </div>
  
</template>

<script>
    import { mapState, mapActions } from 'vuex'
    export default {
        computed: {
            ...mapState([
                'parentSteps',
                'current_page',
                'last_page',
            ]),
            pages() {
                let start = _.max([this.current_page - 2, 1]);
                let end = _.min([start + 5, this.last_page + 1]);
                start = _.max([end - 5, 1]);
                return _.range(start, end);
            },            
        },
        methods: {
            ...mapActions([
                'getPaginationData',
            ]),
            changePage(page) {
                if (page >= 1 && page <= this.last_page) {
                    this.getPaginationData(page);
                } 
            },
        }
    }
</script>

<style>

</style>