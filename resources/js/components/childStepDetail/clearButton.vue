<template>
    <!-- ログインしていなかったら -->
    <div v-if="user===null">ログインして</div>
    <!-- すでにクリアしていたら -->
    <div v-else-if="clearNum >= childStep.num">クリア済み</div>
    <!-- チャレンジしていないまたは前のSTEPをクリアしていなかったら -->
    <div v-else-if="!challengeFlg || clearNum + 1 < childStep.num">クリアで解放</div>
    <!-- チャレンジしていて前のSTEPをクリアしていたら -->
    <button v-else class="c-btn c-btn--warning p-child__btn" @click="onClickChallengeBtn" :disabled="isPush">クリア！</button>
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
            onClickChallengeBtn: function() {
                this.isPush = !this.isPush;
                // axios通信
                axios.post('/challenge/' + this.parentStepId + '/clear')
                .then(res => {
                    // 通信成功の場合
                    // 次のSTEPがない場合
                    if(res.data.nextStepId === null) {
                        // マイページへ遷移
                        location.href = '/users/mypage';
                    }else{
                        // 次のSTEPへ遷移
                        location.href = '/steps/' + this.parentStepId + '/' + res.data.nextStepId;
                    }
                })
                .catch(error => {
                    // 通信失敗の場合
                    // エラーメッセージを変数に格納し、モーダルで表示する
                    // for (let key in error.response.data.errors) {
                    //     this.errMsgs.push(error.response.data.errors[key][0]);
                    // }
                    alert('通信に失敗しました。しばらく時間を置いてからもう一度試してしてください。');
                    this.isPush = !this.isPush
                });
            },

        }
    }
</script>

<style>

</style>