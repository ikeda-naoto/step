<template>
    <div class="l-row">
        <button v-if="user && !challengeFlg" class="c-btn c-btn--small c-btn--warning c-btn--right u-pt--l u-pb--l" @click="onClickChallengeBtn">
            チャレンジ！
        </button>
        <a href="/register" v-else-if="!user" class="c-btn c-btn--small c-btn--success c-btn--right">
            無料会員登録をしてチャレンジ
        </a>
        <div v-else class="c-btn c-btn--small c-btn--secondary c-btn--right">チャレンジ中</div>
    </div>

</template>

<script>
    export default {
        props: ['parentStepId', 'childStepId', 'user', 'challengeFlg'],
        data: function() {
            return {
                isPush: false
            }
        },
        methods: {
            // チャレンジ処理
            onClickChallengeBtn: function() {
                this.isPush = !this.isPush
                let data = { 
                    _token: $('meta[name="csrf-token"]').attr('content'),　// csrfトークンを保存
                    parent_step_id : this.parentStepId,
                    clear_num: 0
                }
                // axios通信
                axios.post('/challenge', data)
                .then(res => {
                    // STEP１へ遷移
                    location.href = '/steps/' + this.parentStepId + '/' + this.childStepId;
                 })
                .catch(error => {
                    // 通信失敗の場合
                    // バリデーション引っかかった場合（普通ありえないが念のため）
                    if(error.response.data.errors) { 
                        // エラーメッセージを変数に格納し、モーダルで表示する
                        for (let key in error.response.data.errors) {
                            this.errMsgs.push(error.response.data.errors[key][0]);
                        }
                    }
                    // それ以外のエラーの場合
                    else {
                        alert('しばらく時間をおいてから再度試してください');
                    }
                    this.isPush = !this.isPush
                });
            } 
        }
    }
</script>