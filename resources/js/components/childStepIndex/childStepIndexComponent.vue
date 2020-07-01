<template>
    <div class="p-child-index">
        <h2 class="u-fontsize--xl">学習順序</h2>
        <ul class="p-child-index__list">
            <listComponent
                v-for="childStep in childSteps"
                :key="childStep.id"
                :childStep="childStep"
            ></listComponent>
        </ul>
    </div>
</template>

<script>
    import listComponent from './listComponent';
    export default {
        props: ['childSteps'],
        components: {
            listComponent
        }
    }
</script>