<template>
    <button v-if="user && !challengeFlg" class="c-btn c-btn--warning p-parent__btn p-parent__btn u-mt-5l" @click="onClickChallengeBtn">チャレンジする</button>
    <div v-else-if="!user">ログインして</div>
    <div v-else>チャレンジ済み</div>
</template>

<script>
    export default {
        props: ['parentStepId', 'user', 'challengeFlg'],
        methods: {
            onClickChallengeBtn: function() {
                let data = {
                    parent_step_id : this.parentStepId,
                    clear_num: 0
                }
                // axios通信
                axios.post('/challenge', data)
                .then(res => {
                    // 通信成功の場合
                    console.log(res.data);
                    // マイページへ遷移
                    location.href = '/users/mypage';
                 })
                .catch(error => {
                    // 通信失敗の場合
                    // エラーメッセージを変数に格納し、モーダルで表示する
                    // for (let key in error.response.data.errors) {
                    //     this.errMsgs.push(error.response.data.errors[key][0]);
                    // }
                    console.log('失敗')
                });
            } 
        }
    }
</script>