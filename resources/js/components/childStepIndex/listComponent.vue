<template>
<li class="p-child-index__item">
    <a :href="'/steps/' + childStep.parent_step_id + '/' + childStep.id" class="l-row l-row--stretch">
        <div class="l-row l-row--middle l-row__col02--sm l-row__col02--tab l-row__col02--pc p-child-index__left-container">
            <p class="p-child-index__num u-mt--m u-mb--m">
                STEP<br>
                <span class="u-fontsize--xl">{{ childStep.num }}</span>
            </p>
        </div>
        <div class="l-row l-row--middle l-row__col10--sm l-row__col10--tab l-row__col10--pc p-child-index__right-container">
            <h3 class="p-child-index__title">{{ childStep.title }}</h3>
        </div>
    </a>
</li>
</template>

<script>
    export default {
        props: ['childStep']
    }
</script>