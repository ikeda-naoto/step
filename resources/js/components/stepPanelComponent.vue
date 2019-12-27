<template>
<div class="l-row__col12 l-row__col06-pc p-step-list__panel-container">
    <a :href="/steps/ + step.id" class="c-panel p-step-list__panel">
        <div class="c-panel__category p-step-list__category">{{ step.categoryName }}</div>
        <div class="c-panel__img p-step-list__img">
            <img :src="showImg" alt="">
        </div>
        <div class="l-row l-row--between p-step-list__head">
            <h3 class="c-panel__title p-step-list__title">{{ step.parent_title }}</h3>
        </div>
        <div class="l-row l-row--between l-row--center p-step-list__body">
            <p class="p-step-list__time">終了目安：{{ step.time / 60  }}時間</p>
            <p class="p-step-list__sum">全{{ step.sumChildNum }}STEP</p>
        </div>
    </a>
</div>
</template>

<script>
    export default {
        props: ['step'],
        computed : {
            showImg: function() {
                if(this.step.pic === null) {
                    return '/images/no-img.png'
                }
                return '/storage/img/' + this.step.pic;
            }
        }
    }
    
</script>