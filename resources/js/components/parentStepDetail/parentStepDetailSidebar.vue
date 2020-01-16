<template>
    <div class="l-row__col12 l-row__col04-pc">
        <div class=" c-sidebar">
            <!-- STEP登路登録ボタン -->
            <registStepBtn></registStepBtn>
            <!-- プロフィール -->
            <profile
                :user="createUser"
                title="このステップを作った人"
            ></profile>
        </div>
    </div>
</template>

<script>
    import registStepBtn from '../registStepBtn';
    import profile from '../profile'
    export default {
        components: {
            registStepBtn,
            profile
        },
        props: ['createUser']
    }
</script>