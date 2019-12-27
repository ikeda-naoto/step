<template>
    <div>
        <h2 class="u-fontsize--xl">学習順序</h2>
        <div class="p-child-index">
            <div  v-for="(childStep, index) in childSteps" :key="childStep.id" class="p-child-index__group">
                <div class="l-row l-row--stretch p-child-index__item">
                    <div class="l-row l-row--middle l-row__col02-pc p-child-index__left-container">
                        <p class="p-child-index__num u-mt-l u-mb-l">
                            STEP<br>
                            <span class="u-fontsize--xl">{{ index + 1 }}</span>
                        </p>
                    </div>
                    <div class="l-row l-row--middle l-row__col10-pc p-child-index__right-container">
                        <h3 class="p-child-index__title">{{ childStep.child_title }}</h3>
                    </div>
                </div>
                <div class="p-child-index__triangle" v-if="childSteps.length !== index+1"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['childSteps']
    }
</script>