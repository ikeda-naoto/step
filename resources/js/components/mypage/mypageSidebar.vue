<template>
    <!-- サブカラム（サイドバー） -->
    <div class="l-row__col12--sm l-row__col04--tab l-row__col04--pc">
        <div class=" c-sidebar">
            <!-- STEP登録ボタン -->
            <registStepBtn></registStepBtn>
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
    import mypageSidebarMenu from './mypageSidebarMenu';
    export default {
        components: {
            registStepBtn,
            profile,
            mypageSidebarMenu
        },
        props: ['user'],
    }
</script>