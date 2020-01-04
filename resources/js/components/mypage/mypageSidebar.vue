<template>
    <!-- サブカラム（サイドバー） -->
    <div class="l-row__col12 l-row__col04-pc">
        <div class=" c-sidebar">
            <registStepBtn></registStepBtn>
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
            <profile
                :user="user"
                title="マイページ"
            ></profile>
            <mypageSidebarMenu
                :user="user"
            ></mypageSidebarMenu>
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