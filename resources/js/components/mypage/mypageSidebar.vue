<template>
    <!-- サブカラム（サイドバー） -->
    <div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
        <div class=" c-sidebar">
            <!-- STEP登録ボタン -->
            <registStepBtn></registStepBtn>
            <!-- プロフィール -->
            <profile
                :user="user"
                title="マイページ"
            ></profile>
        </div>
    </div>
</template>

<script>
    import registStepBtn from '../registStepBtn';
    import profile from '../profile';
    export default {
        components: {
            registStepBtn,
            profile,
        },
        props: ['user'],
    }
</script>