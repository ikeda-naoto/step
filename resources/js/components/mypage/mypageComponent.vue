<template>
    <div class="l-container u-bg-light">
        <div class="l-row l-site-width">
            <mypageMainComponent
            :registSteps="registSteps"
            :challengeSteps="challengeSteps"></mypageMainComponent>
            
            <mypageSidebarComponent
            :user="user"></mypageSidebarComponent>
        </div>
    </div>
</template>

<script>
    import mypageMainComponent from './mypageMainComponent';
    import mypageSidebarComponent from './mypageSidebarComponent';
    export default {
        components: {
            mypageMainComponent,
            mypageSidebarComponent
        },
        props: ['registSteps', 'challengeSteps', 'user']
    }
</script>