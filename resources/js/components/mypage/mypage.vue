<template>
    <div class="l-container u-bg--light">
        <div class="l-row l-site-width">
            <mypageMain
                :registSteps="registSteps"
                :challengeSteps="challengeSteps"
            ></mypageMain>
            
            <mypageSidebar
                :user="user"
            ></mypageSidebar>
        </div>
    </div>
</template>

<script>
    import mypageMain from './mypageMain';
    import mypageSidebar from './mypageSidebar';
    export default {
        components: {
            mypageMain,
            mypageSidebar
        },
        props: ['registSteps', 'challengeSteps', 'user']
    }
</script>