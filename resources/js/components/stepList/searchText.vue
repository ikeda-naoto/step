<template>
<div class="c-sidebar__group">
                            <h2 class="c-sidebar__head"><span class="c-sidebar__title"><i class="fas fa-search c-sidebar__icn"></i>探す</span></h2>
                            <div class="c-sidebar__body">
                                <input type="text" class="c-sidebar__input" :value="searchText" @input="updateSearchText($event.target.value)">
                            </div>
                        </div>
</template>

<script>
    import { mapState, mapMutations } from 'vuex'
    export default {
        computed: {
            ...mapState([
                'searchText'
            ])
        },
        methods: {
            ...mapMutations([
                'updateSearchText'
            ])
        },
    }
</script>