<template>
    <!-- サブカラム（サイドバー） -->
    <div class="l-row__col12 l-row__col04-pc">
        <div class=" c-sidebar">
            <registStepBtnComponent></registStepBtnComponent>
            <!-- <div class="c-sidebar__group">
                <h2 class="c-sidebar__head"><span class="c-sidebar__title"><i class="fas fa-user-alt c-sidebar__icn"></i>マイページ</span></h2>
                <div class="c-sidebar__body">
                    <div class="c-sidebar__prof-img">
                        <img class="" src="{{ asset('storage/img/'.$user->pic) }}" alt="">
                    </div>
                    <h3 class="c-sidebar__prof-name">{{ $user->name }}</h3>
                    <div class="c-sidebar__prof-intro">
                        {{ $user->introduction }}
                    </div>
                    
                </div>
            </div> -->
            <profileComponent
            :user="user"
            title="マイページ"></profileComponent>
        </div>
    </div>
</template>

<script>
    import registStepBtnComponent from '../registStepBtnComponent';
    import profileComponent from '../profileComponent';
    export default {
        components: {
            registStepBtnComponent,
            profileComponent
        },
        props: ['user']
    }
</script>