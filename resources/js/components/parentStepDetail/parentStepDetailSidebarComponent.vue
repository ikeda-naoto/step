<template>
    <div class="l-row__col12 l-row__col04-pc">
        <div class=" c-sidebar">
            <registStepBtnComponent></registStepBtnComponent>
            <profileComponent
            :user="createUser"
            title="このステップを作った人"></profileComponent>
        </div>
    </div>
</template>

<script>
    import registStepBtnComponent from '../registStepBtnComponent';
    import profileComponent from '../profileComponent'
    export default {
        components: {
            registStepBtnComponent,
            profileComponent
        },
        props: ['createUser']
    }
</script>