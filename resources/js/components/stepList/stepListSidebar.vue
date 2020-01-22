<template>
    <div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
        <div class="c-sidebar">
            <!-- STEP登録ボタン -->
            <registStepBtn></registStepBtn>
            <!-- キーワード検索欄 -->
            <searchText></searchText>
            <!-- カテゴリー検索欄 -->
            <searchCategory></searchCategory>
        </div>
    </div>
</template>

<script>
    import searchText from './searchText';
    import searchCategory from './searchCategory';
    import registStepBtn from '../registStepBtn'
    export default {
        components: {
            searchText,
            searchCategory,
            registStepBtn
        },
    }
</script>