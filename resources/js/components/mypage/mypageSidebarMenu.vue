<template>
    <div class="c-sidebar__group">
        <h2 class="c-sidebar__head"><span class="c-sidebar__title"><i class="fas fa-bars c-sidebar__icn"></i>メニュー</span></h2>
        <ul class="c-sidebar__list">
            <a href="/users/edit">
                <li class="c-sidebar__list-item">
                    <label class="c-sidebar__label">
                        プロフィール変更
                    </label>
                </li>
            </a>
            <a href="/password/edit">
                <li class="c-sidebar__list-item">
                    <label class="c-sidebar__label">
                        パスワード変更
                    </label>
                </li>
            </a>
            <li class="c-sidebar__list-item">
                <a href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <label class="c-sidebar__label">
                        ログアウト
                    </label>
                </a>
                <form id="logout-form" method="POST" action="/logout" style="display: none;">
                    <input type="hidden" name="_token" v-model="csrf">
                </form>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: ['user'],
    data: function() {
        return {
            csrf: $('meta[name="csrf-token"]').attr('content')
        }
    }
}
</script>

<style>

</style>