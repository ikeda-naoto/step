<template>
    <div class="p-child-index">
        <h2 class="u-fontsize--xl">学習順序</h2>
        <ul class="p-child-index__list">
            <template v-for="childStep in childSteps">
                <childStepIndexItemComponent
                :key="childStep.id"
                :childStep="childStep"></childStepIndexItemComponent>
            </template>
        </ul>
    </div>
</template>

<script>
    import childStepIndexItemComponent from '../parentStepDetail/childStepIndex-ItemComponent';
    export default {
        props: ['childSteps'],
        components: {
            childStepIndexItemComponent
        }
    }
</script>