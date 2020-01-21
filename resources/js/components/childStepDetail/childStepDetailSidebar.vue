<template>
    <div class="l-row__col12 l-row__col04-pc">
        <div class="c-sidebar u-mt--0">
            <registStepBtn></registStepBtn>
            <h2 class="c-sidebar__head"><span class="c-sidebar__title">学習手順</span></h2>
            <!-- 子STEPリスト -->
            <childStepIndexList
                :childSteps="childSteps"
            ></childStepIndexList>
        </div>
    </div>
</template>

<script>
    import registStepBtn from '../registStepBtn';
    import childStepIndexList from '../childStepIndex/childStepIndexList';
    export default {
        components: {
            registStepBtn,
            childStepIndexList
        },
        props: ['childSteps'],
    }
</script>

<style>

</style>