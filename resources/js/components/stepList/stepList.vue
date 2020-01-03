<template> 
    <!-- メインコンテンツ -->
    <div class="l-container u-bg-light">
        <div class="l-row l-site-width">
            <!-- メインカラム -->
            <stepListItem
                :parentSteps="filteredList"
            ></stepListItem>
            <!-- サブカラム（サイドバー） -->
            <stepListSidebar
                :categories="categories"
            ></stepListSidebar>
        </div>
    </div>
</template>

<script>
    import stepListItem from './stepListItem';
    import stepListSidebar from './stepListSidebar';
    //import store from './store/index';
    import { mapState, mapMutations } from 'vuex'
    export default {
        components: {
            stepListItem,
            stepListSidebar
        },
        props: ['parentSteps', 'categories'],
        computed: {
            ...mapState([
                'searchText', // => `this.count` が `store.state.count` にマッピングされる
                'selectCategory'
            ]),
            filteredList: function() {
                let newList = this.parentSteps;
                if(this.searchText) {
                    newList = newList.filter(this.filterText);
                }
                if(this.selectCategory) {
                    newList = newList.filter(this.filterCategory);
                }
                
                return newList;
            },
        },
        methods: {
            filterText: function(elm) {
                const regexp = new RegExp('^' + this.searchText, 'i');
                return (elm.parent_title.match(regexp));
            },
            filterCategory: function(elm) {
                return elm.category_id === this.selectCategory;
            },

        }   
    }
</script>