<template>
<div>
    <div class="c-overview"></div>
    <div class="l-row l-row--middle l-row--center c-modal">
        <div class="c-modal__container">
            <div class="c-modal__group">
                <p class="u-text-center" v-for="errMsg in errMsgs">{{ errMsg }}</p>
            </div>
            <div class="c-modal__group">
                <button class="c-btn c-btn--primary c-modal__btn" @click="$emit('flashErrMsgs')">OK</button>
            </div>
        </div>
    </div>
</div>

</template>

<script>
    export default {
        props: ['errMsgs'],
        methods : {
            onSubmit : function() {
                console.log('aaa');
            }
        }
    }
</script>