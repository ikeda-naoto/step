<template>
<div class="l-row__col12 l-row__col04-pc">
                <div class="c-sidebar">
                        <div class="c-sidebar__group">
                            <a href="/steps/create" class="c-btn c-btn--warning c-sidebar__btn--full">STEPを作る</a>
                        </div>
                        
                        <searchTextComponent></searchTextComponent>
                        <searchCategoryComponent
                        :categories="categories"></searchCategoryComponent>
                </div>
            </div>
</template>

<script>
    import searchTextComponent from './searchTextComponent';
    import searchCategoryComponent from './searchCategoryComponent';
    export default {
        components: {
            searchTextComponent,
            searchCategoryComponent
        },
        props: ['categories'],
    }
</script>