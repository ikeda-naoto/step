<template>
    <div class="c-sidebar__group">
        <h2 class="c-sidebar__head"><span class="c-sidebar__title"><i class="fas fa-user-alt c-sidebar__icn"></i>{{ title }}</span></h2>
        <div class="c-sidebar__body">
            <div class="c-sidebar__prof-img">
                <img class="" :src="showImg" alt="">
            </div>
            <h3 class="c-sidebar__prof-name">{{ isset(user.name) ? user.name : '名無しさん' }}</h3>
            <div class="c-sidebar__prof-intro" v-html="$sanitize(nl2br(user.introduction))">
            </div>
        </div>
    </div>
</template>

<script>
    import Mixin from './mixins/mixin';
    export default {
        props: ['user', 'title'],
        mixins: [Mixin],
        computed: {
            showImg: function() {
                if(!this.user.pic) {
                    return '/images/unknown.png';
                }
                return '/storage/img/' + this.user.pic;
            },
        },
    }
    
</script>
