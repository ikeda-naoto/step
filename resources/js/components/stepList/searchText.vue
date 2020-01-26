<template>
    <div class="c-sidebar__group">
        <h2 class="c-sidebar__head"><span class="c-sidebar__title"><i class="fas fa-search c-sidebar__icn"></i>探す</span></h2>
        <div class="c-sidebar__body">
            <input type="text" class="c-sidebar__input" :value="decodeURIComponent(searchText)" @keydown.enter="onChangeSearchText  ($event.target.value)">
        </div>
    </div>
</template>

<script>
    import { mapState, mapActions } from 'vuex'
    export default {
        computed: {
            ...mapState([
                'searchText'
            ])
        },
        methods: {
            ...mapActions([
                'inputSearchText'
            ]),
            // キーワードが入力されたらstoreの情報を書き換える
            onChangeSearchText(newValue) {
                // Enter以外のキーボード入力だった場合はリターン
                if (event.keyCode !== 13) return;
                this.inputSearchText(encodeURIComponent(newValue));
            }
        },
    }
</script>