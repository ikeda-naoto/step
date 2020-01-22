<template>
    <div class="l-row c-panel p-registed-step__panel">
        <div class="l-row l-row--middle">
            <div class="l-row__col12--sm l-row__col04--tab l-row__col02--pc c-img p-registed-step__img">
                <img class="c-img__item--center" :src="showStepImg(registStep.pic)" alt="">
            </div>
            <div class="l-row__col12--sm l-row__col08--tab l-row__col06--pc">
                <h3 class="c-panel__title p-registed-step__title">{{ registStep.parent_title }}</h3>
            </div>
            <a :href="'/steps/' + registStep.id + '/edit'" class="c-btn c-btn--primary c-btn--right c-btn--small p-registed-step__btn">
                編集する
            </a>
        </div>
    </div>
</template>

<script>
    import Mixin from '../mixins/mixin';
    export default {
        props: ['registStep'],
        mixins: [Mixin],
    }
</script>  