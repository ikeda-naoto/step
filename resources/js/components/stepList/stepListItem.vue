<template>
<div class="l-row__col12 l-row__col08-pc">
                    <h1 class="c-title--normal u-mb-5l">STEP一覧</h1>
                    <!-- <div class="l-row  p-step-list"> -->
                        <transition-group tag="div" class="l-row  p-step-list v-move">
                            <template v-for="parentStep in parentSteps">
                                <stepListPanel
                                    :key="parentStep.id"
                                    :parentStep="parentStep"
                                ></stepListPanel>
                            </template>
                        </transition-group>

                        <!-- <div class="l-row__col12 l-row__col06-pc p-step-list__panel-container">
                            <a class="c-panel p-step-list__panel">
                                <div class="c-panel__category p-step-list__category">カテゴリー</div>
                                <div class="c-panel__img p-step-list__img">
                                    <img src="img/trouble_person.jpg" alt="">
                                </div>
                                <div class="l-row l-row--between p-step-list__head">
                                    <h3 class="c-panel__title p-step-list__title">親STEPタイトル</h3>
                                </div>
                                <div class="l-row l-row--between l-row--center p-step-list__body">
                                    <p class="p-step-list__time">終了目安：1時間</p>
                                    <p class="p-step-list__sum">全10STEP</p>
                                </div>
                            </a>
                        </div>
                        <div class="l-row__col12 l-row__col06-pc p-step-list__panel-container">
                            <a class="c-panel p-step-list__panel">
                                <div class="c-panel__category p-step-list__category">カテゴリー</div>
                                <div class="c-panel__img p-step-list__img">
                                    <img src="img/trouble_person.jpg" alt="">
                                </div>
                                <div class="l-row l-row--between p-step-list__head">
                                    <h3 class="c-panel__title p-step-list__title">親STEPタイトル</h3>
                                </div>
                                <div class="l-row l-row--between l-row--center p-step-list__body">
                                    <p class="p-step-list__time">終了目安：1時間</p>
                                    <p class="p-step-list__sum">全10STEP</p>
                                </div>
                            </a>
                        </div>
                        <div class="l-row__col12 l-row__col06-pc p-step-list__panel-container">
                            <a class="c-panel p-step-list__panel">
                                <div class="c-panel__category p-step-list__category">カテゴリー</div>
                                <div class="c-panel__img p-step-list__img">
                                    <img src="img/trouble_person.jpg" alt="">
                                </div>
                                <div class="l-row l-row--between p-step-list__head">
                                    <h3 class="c-panel__title p-step-list__title">親STEPタイトル</h3>
                                </div>
                                <div class="l-row l-row--between l-row--center p-step-list__body">
                                    <p class="p-step-list__time">終了目安：1時間</p>
                                    <p class="p-step-list__sum">全10STEP</p>
                                </div>
                            </a>
                        </div>
                        <div class="l-row__col12 l-row__col06-pc p-step-list__panel-container">
                            <a class="c-panel p-step-list__panel">
                                <div class="c-panel__category p-step-list__category">カテゴリー</div>
                                <div class="c-panel__img p-step-list__img">
                                    <img src="img/trouble_person.jpg" alt="">
                                </div>
                                <div class="l-row l-row--between p-step-list__head">
                                    <h3 class="c-panel__title p-step-list__title">親STEPタイトル</h3>
                                </div>
                                <div class="l-row l-row--between l-row--center p-step-list__body">
                                    <p class="p-step-list__time">終了目安：1時間</p>
                                    <p class="p-step-list__sum">全10STEP</p>
                                </div>
                            </a>
                        </div>
                        <div class="l-row__col12 l-row__col06-pc p-step-list__panel-container">
                            <a class="c-panel p-step-list__panel">
                                <div class="c-panel__category p-step-list__category">カテゴリー</div>
                                <div class="c-panel__img p-step-list__img">
                                    <img src="img/trouble_person.jpg" alt="">
                                </div>
                                <div class="l-row l-row--between p-step-list__head">
                                    <h3 class="c-panel__title p-step-list__title">親STEPタイトル</h3>
                                </div>
                                <div class="l-row l-row--between l-row--center p-step-list__body">
                                    <p class="p-step-list__time">終了目安：1時間</p>
                                    <p class="p-step-list__sum">全10STEP</p>
                                </div>
                            </a>
                        </div>
                        <div class="l-row__col12 l-row__col06-pc p-step-list__panel-container">
                            <div class="c-panel p-step-list__panel">
                                <div class="c-panel__category p-step-list__category">カテゴリー</div>
                                <div class="c-panel__img p-step-list__img">
                                    <img src="img/trouble_person.jpg" alt="">
                                </div>
                                <div class="l-row l-row--between p-step-list__head">
                                    <h3 class="c-panel__title p-step-list__title">親STEPタイトル</h3>
                                </div>
                                <div class="l-row l-row--between l-row--center p-step-list__body">
                                    <p class="p-step-list__time">終了目安：1時間</p>
                                    <p class="p-step-list__sum">全10STEP</p>
                                </div>
                            </div>
                        </div> -->

                <!-- </div> -->
            </div>
</template>

<script>
    import stepListPanel from './stepListPanel';
    export default {
        components: {
            stepListPanel
        },
        props: ['parentSteps']
    }
</script>

<style scoped>
.v-enter-active, .v-leave-active, .v-move {
  transition: opacity 1s, transform 1s;
}
.v-leave-active {
  position: absolute;
}
.v-enter {
  opacity: 0;
  transform: translateY(-20px);
}
.v-leave-to {
  opacity: 0;
  transform: translateY(20px);
}
</style>