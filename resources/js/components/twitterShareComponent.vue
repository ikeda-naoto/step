<template>
    <div class="p-share">
        <button class="c-btn p-share__btn p-share__btn--twitter" @click="$emit('onClickTwitterShare')">
            <i class="fab fa-twitter p-share__icn"></i>ツイート
        </button>
    </div>
</template>

<script>
import Mixin from './mixins/mixin';
export default {
mixins: [Mixin],
}
</script>

<style>

</style>