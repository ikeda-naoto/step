<template>
    <!-- ログインしていなかったら -->
    <a href="/register" v-if="user===null" class="c-btn c-btn--medium c-btn--success c-btn--right">
        無料会員登録をしてチャレンジ
    </a>
    <!-- すでにクリアしていたら -->
    <div v-else-if="clearNum===childStep.num" class="c-btn c-btn--small c-btn--secondary c-btn--right">
        クリア済み
    </div>
    <!-- チャレンジしていないまたは前のSTEPをクリアしていなかったら -->
    <div v-else-if="!challengeFlg || clearNum + 1 < childStep.num" class="c-btn c-btn--small c-btn--warning c-btn--right c-btn--pale u-pt--l u-pb--l">
        クリアで解放
    </div>
    <!-- チャレンジしていて前のSTEPをクリアしていたら -->
    <button v-else class="c-btn c-btn--small c-btn--warning c-btn--right u-pt--l u-pb--l" @click="onClickClearBtn" :disabled="isPush">
        クリア！
    </button>
</template>

<script>
    export default {
        props: ['parentStepId', 'childStep', 'clearNum', 'user', 'challengeFlg'],
        data: function() {
            return {
                isPush: false
            }
        },
        methods: {
            // クリア処理
            onClickClearBtn: function() {
                this.isPush = !this.isPush;
                // csrfトークンを保存
                let data = { _token: $('meta[name="csrf-token"]').attr('content')}
                // axios通信
                axios.post('/challenge/' + this.parentStepId + '/clear', data)
                .then(res => {
                    // 通信成功の場合
                    if(res.data.nextStepId === null) { // 次のSTEPがない場合
                        // マイページへ遷移
                        location.href = '/users/mypage';
                    }else{ // それ以外
                        // 次のSTEPへ遷移
                        location.href = '/steps/' + this.parentStepId + '/' + res.data.nextStepId;
                    }
                })
                .catch(error => {
                    // 通信失敗の場合
                    alert('通信に失敗しました。しばらく時間を置いてからもう一度試してしてください。');
                    this.isPush = !this.isPush
                });
            },

        }
    }
</script>

<style>

</style>