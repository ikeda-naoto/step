<template>
    <div class="p-child-index">
        <h2 class="u-fontsize--xl">学習順序</h2>
        <childStepIndexList
            :childSteps="childSteps"
        ></childStepIndexList>
    </div>
</template>

<script>
    import childStepIndexList from './childStepIndexList';
    export default {
        props: ['childSteps'],
        components: {
            childStepIndexList
        }
    }
</script>