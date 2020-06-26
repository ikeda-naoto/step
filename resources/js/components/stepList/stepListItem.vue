<template>
    <div class="l-row__col12--sm l-row__col08--tab l-row__col08--pc">
        <!-- ページタイトル -->
        <h1 class="c-title--normal u-mb--5l">STEP一覧</h1>
        <p v-if="isShow" class="u-text--center u-fontsize--l">STEPがありません</p>
        <!-- STEP一覧 -->
        <div v-else class="l-row p-step-list">
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
    import VueScrollTo from 'vue-scrollto'
    export default {
        components: {
            stepListPanel,
            pagination
        },
        data: function() {
            return {
                isShow: false
            }
        },
        mounted() {
            // STEP一覧に表示されるSTEPがなかったらその旨を伝えるメッセージを表示する
            this.$store.watch(
                (state, getters) => getters.getParentSteps,
                (newValue) => {
                    this.isShow = newValue.length === 0 ? true : false;
                }
            )
        },
        updated() {
            VueScrollTo.scrollTo('#top', 1000, {
                easing: 'ease-in-out'
            })
        },
        computed: {
            ...mapState([
                'parentSteps'
            ]),
        },

    }
</script>