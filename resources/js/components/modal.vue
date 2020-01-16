<template>
<div>
    <div class="c-overview"></div>
    <div class="l-row l-row--middle l-row--center c-modal">
        <div class="c-modal__container">
            <div class="c-modal__group">
                <p class="u-text--center" v-for="(errMsg, index) in errMsgs" :key="index">{{ errMsg }}</p>
            </div>
            <div class="c-modal__group">
                <button class="c-btn c-btn--right c-btn--primary c-modal__btn" @click="flashErrMsgs">OK</button>
            </div>
        </div>
    </div>
</div>

</template>

<script>
    export default {
        props: ['errMsgs'],
        methods : {
            // エラーメッセージフラッシュ用メソッド
            flashErrMsgs : function() {
                this.$parent.errMsgs=[];
            },
        }
    }
</script>