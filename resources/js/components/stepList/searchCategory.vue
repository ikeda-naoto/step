<template>
<div class="c-sidebar__group"> 
    <h2 class="c-sidebar__head"><span class="c-sidebar__title"><i class="fas fa-list c-sidebar__icn"></i>カテゴリー</span></h2>
    <div class="c-sidebar__body">
        <ul class="c-sidebar__list">
            <li class="c-sidebar__list-item" :class="[selectCategory === 0 ? 'c-sidebar__list-item--active' : '']">
                <input type="radio" name="category" :id="0"  class="c-sidebar__radio" :value="0" @change="onInputCategory($event.target.value)">
                <label :for="0" class="c-sidebar__label">
                    すべて
                </label>
            </li>
            <li class="c-sidebar__list-item" v-for="category in categories" :key="category.id" :class="[selectCategory === category.id ? 'c-sidebar__list-item--active' : '']">
                <input type="radio" name="category" :id="category.id"  class="c-sidebar__radio" :value="category.id" @change="onInputCategory($event.target.value)">
                <label :for="category.id" class="c-sidebar__label">
                    {{ category.name }}
                </label> 
            </li>
        </ul>
    </div>
</div>
</template>

<script>
    import { mapState, mapActions } from 'vuex'
    import VueScrollTo from 'vue-scrollto'
    export default {
        computed: {
            ...mapState([
                'categories',
                'selectCategory'
            ])
        },
        methods: {
            ...mapActions([
                'inputCategory'
            ]),
            // 選択カテゴリーが変更されたらstoreの情報を書き換える
            onInputCategory: function(newValue) {
                VueScrollTo.scrollTo('#top', 1000, {
                    easing: 'ease'
                })
                this.inputCategory(newValue);
            },
        },
    }
</script>