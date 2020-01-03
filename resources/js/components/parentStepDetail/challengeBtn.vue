<template>
    <button v-if="user && !challengeFlg" class="c-btn c-btn--warning p-parent__btn p-parent__btn u-mt-5l" @click="onClickChallengeBtn">チャレンジする</button>
    <div v-else-if="!user">ログインして</div>
    <div v-else>チャレンジ済み</div>
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
            onClickChallengeBtn: function() {
                this.isPush = !this.isPush
                let data = {
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
                    // バリデーション引っかかった場合
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