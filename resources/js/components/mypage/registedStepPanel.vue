<template>
    <div class="l-row c-panel p-registed-step__panel">
        <div class="l-row l-row--middle">
            <div class="l-row__col12--sm l-row__col04--tab l-row__col02--pc c-img p-registed-step__img">
                <img class="c-img__item--center" :src="showStepImg(registStep.pic)" alt="">
            </div>
            <div class="l-row__col12--sm l-row__col08--tab l-row__col06--pc">
                <h3 class="c-panel__title p-registed-step__title">{{ registStep.title }}</h3>
            </div>
            <div class="l-row l-row__col12--sm l-row__col12--tab l-row__col04--pc">
                <div class="l-row__col06--sm l-row__col06--tab l-row__col06--pc">
                    <a :href="'/steps/' + registStep.id + '/edit'" class="c-btn c-btn--center c-btn--primary p-registed-step__btn">
                        編集
                    </a>
                </div>
                <div class="l-row__col06--sm l-row__col06--tab l-row__col06--pc">
                    <form :action="'/steps/' + registStep.id + '/delete'" method="post" @submit="deleteStep">
                        <input type="hidden" name="_token" v-model="csrf">
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="c-btn c-btn--center c-btn--danger p-registed-step__btn" :disabled="isPush">
                             削除
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import Mixin from '../mixins/mixin';
    export default {
        props: ['registStep'],
        data: function() {
            return {
                isPush: false,
                csrf: $('meta[name="csrf-token"]').attr('content')
            }
        },
        mixins: [Mixin],
        methods: {
            deleteStep: function() {
                if(!confirm(this.registStep.title + "を削除してよろしいですか？")) {
                     event.preventDefault();
                     return;
                }
                this.isPush = !this.isPush;
                return;
            }
        }
    }
</script>  