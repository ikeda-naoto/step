<template>
    <ul class="p-child-index__list">
        <childStepIndexItem
            v-for="childStep in childSteps"
            :key="childStep.id"
            :childStep="childStep"
        ></childStepIndexItem>
    </ul>
</template>

<script>
import childStepIndexItem from './childStepIndexItem';
    export default {
        components: {
            childStepIndexItem,
        },
        props:['childSteps']
    }
</script>