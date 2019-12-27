<template>
<div>
<!-- パンくずリスト -->
    <div class="l-bread-crumbs">
        <div class="p-bread-crumbs l-row  l-row--middle l-row--center">
            <ul class="l-site-width l-row p-bread-crumbs__list">
                <li>ホーム<i class="fas fa-angle-right p-bread-crumbs__icn"></i></li>
                <li>STEP一覧</li>
            </ul>
        </div>
    </div>        
    <!-- メインコンテンツ -->
    <div class="l-container u-bg-light">
        <div class="l-row l-site-width">
            <!-- メインカラム -->
            <stepListMainComponent
            :steps="filteredList"></stepListMainComponent>
            <!-- サブカラム（サイドバー） -->
            <stepListSubComponent
            :categories="categories"></stepListSubComponent>
        </div>
    </div>
</div>
</template>

<script>
    import stepListMainComponent from './stepListMainComponent';
    import stepListSubComponent from './stepListSubComponent';
    //import store from './store/index';
    import { mapState, mapMutations } from 'vuex'
    export default {
        components: {
            stepListMainComponent,
            stepListSubComponent
        },
        props: ['steps', 'categories'],
        computed: {
            ...mapState([
                'searchText', // => `this.count` が `store.state.count` にマッピングされる
                'selectCategory'
            ]),
            filteredList: function() {
                let newList = this.steps;
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